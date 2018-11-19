const axios = require('axios');
const serialize = require('dom-form-serializer').serialize;

const MediumEditor = require('medium-editor');
window.MediumEditor = MediumEditor;
const MeMarkdown = require('medium-editor-markdown/dist/me-markdown.standalone').MeMarkdown;

/**
 * A class containing ajax form logic that can be used for multiple forms.
 */
class Form
{
    /**
     * Constructor.
     *
     * @param {Element} $form
     */
    constructor($form)
    {
        // local form variable
        this.$form = $form;

        this.editors = {};
        [...document.getElementsByClassName('editable')].forEach(($el) => {
            const id = $el.getAttribute('id');
            const editor = new MediumEditor(`#${$el.getAttribute('id')}`, {
                extensions: {
                    markdown: new MeMarkdown((md) => {
                        this.editors[id] = md;
                    })
                },
                placeholder: {
                    /* This example includes the default options for placeholder,
                       if nothing is passed this is what it used */
                    text: $el.getAttribute('data-placeholder')
                }
            });
            editor.subscribe('editableInput', (eventObj, editable) => {
                this.editors[`${id}-html`] = editable.innerHTML;
            });
        });

        this.files = {};
        [...this.$form.querySelectorAll('input[type="file"]')].forEach(($el) => {
            $el.addEventListener('change', (e) => {
                this.files[e.target.getAttribute('id')] = e.target.files[0];
                console.log(serialize(this.$form));
            });
        });


        // now listen to a form submit
        $form.addEventListener('submit', (e) => {

            const formData = new FormData(this.$form);

            Object.keys(this.files).forEach((k) => {
                formData.set(k, this.files[k]);
            });

            Object.keys(this.editors).forEach((k) => {
                formData.set(k, this.editors[k]);
            });

            this.action = this.$form.getAttribute('action').toLowerCase();
            this.redirect = this.$form.getAttribute('data-redirect');

            // execute the ajax request
            axios.post(this.action, formData,{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(() => {
                    window.location.href = this.redirect;
                })
                .catch(function (xhr) {
                    if (xhr === undefined || xhr.response === undefined) {
                        window.alert('You are probably offline, please try again.');
                        return false;
                    }

                    if (xhr.response.status === 401)
                    {
                        window.alert('You are logged not logged in! Maybe open another window and log yourself in and try again to not loose your changes.');
                        return false;
                    }

                    if (xhr.response.status === 500) {
                        window.alert('A severe error occured on the server side. Please contact an administrator.');
                        return false;
                    }

                    if (xhr.response.status === 422) {
                        return this.handleErrors(xhr.response.data.errors);
                    }

                    alert('Something unexpected happened..');
                }.bind(this));

            // cancel form submission
            e.preventDefault();
            return false;
        });

    }

    handleErrors(errors) {

        [...this.$form.querySelectorAll('.invalid-feedback')].forEach(($el) => {
            $el.innerHTML = '';
        });
        [...this.$form.querySelectorAll('.is-invalid')].forEach(($el) => {
            $el.classList.remove('is-invalid');
        });

        let $allTopEl = null;
        let allTopElTop = 0;
        for (let [field, messages] of Object.entries(errors)) {
            const id = field.replace(/\./g, '').replace(/_/g, '-');
            const $el = document.getElementById(id);
            const $elContainer = $el.parentElement;
            const $elError = $elContainer.querySelector('.invalid-feedback');

            $elError.innerHTML = messages.join('<br />');
            $el.classList.add('is-invalid');

            var top = $el.getBoundingClientRect().top + document.body.scrollTop;
            if(allTopElTop > top)  {
                allTopElTop = top;
                $allTopEl = $el.parentElement;
            }
        }

        $allTopEl.scrollIntoView({
            behavior: "smooth",
            block:    "start",
        });
    }
}

module.exports = Form;
