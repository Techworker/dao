/**
 * First we will load all of this proposal's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


const FormHandler = require('./components/form');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(() => {
var userAvatar = null;
$('input#user-avatar').on('change', function(event) {
    userAvatar = event.target.files[0];
});


$("#form-login").on('submit', function(e) {
    var data = new FormData();
    data.append('name', $('#user-name').val());
    if(userAvatar !== null) {
        data.append('avatar', userAvatar);
    }

    if($('#user-password').val() !== '') {
        data.append('password', $("#user-password").val());
        data.append('password_confirmation', $("#user-password-confirmation").val());
    }

    if($("#user-email").val() !== $("#user-email").data('original')) {
        data.append('email', $("#user-email").val());
    }

    $.ajax({
        url: '/profile/login-data',
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function()
        {
            window.location.href = '/profile/login-data'
        },
        error: function(response)
        {
            $.each(data, function(field, value) {
                $("#user-error-" + field.replace('_', '-')).hide();
            });

            var json = $.parseJSON(response.responseText);
            $.each(json.errors, function(field, messages) {
                $("#user-error-" + field.replace('_', '-')).show().html(messages[0]);
            });
        }
    });

    e.preventDefault();
    return false;
});

if(document.getElementById('form-contractor')) {
    new FormHandler(document.getElementById('form-contractor'));
}

if(document.getElementById('form-proposal')) {
    new FormHandler(document.getElementById('form-proposal'));
}

    $(".submit-kyc").on('click', (e) => {
        var r = confirm('This will submit your contractor record for KYC verification. You will only be able to update the record again if you cancel the process.');
        if(r === true) {
            $.post($(e.currentTarget).attr('href')).then(() => {
                window.location.reload();
            });
        }

        e.preventDefault();
        return false;
    });
    $(".submit-kyc-revoke").on('click', (e) => {
        var r = confirm('This will remove your submission. Are you sure?');
        if(r === true) {
            $.post($(e.currentTarget).attr('href')).then(() => {
                window.location.reload();
            });
        }

        e.preventDefault();
        return false;
    });

    $(".submit-proposal").on('click', (e) => {
        var r = confirm('This will submit your proposal. You will only be able to update the record again if you cancel the process.');
        if(r === true) {
            $.post($(e.currentTarget).attr('href')).then(() => {
                window.location.reload();
            });
        }

        e.preventDefault();
        return false;
    });

    $(".submit-proposal-revoke").on('click', (e) => {
        var r = confirm('This will remove your submission. Are you sure?');
        if(r === true) {
            $.post($(e.currentTarget).attr('href')).then(() => {
                window.location.reload();
            });
        }

        e.preventDefault();
        return false;
    });

    $('.upload_tax').on('click', function(e) {
        var $taxFile = $(e.currentTarget).closest('td').find('.tax_file');
        $taxFile.on('change', function(e) {
            $(e.currentTarget).closest('form').find('input[type=submit]').show();
        });
        $taxFile.trigger('click');
        return false;
    });
});