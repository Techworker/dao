/*------------------------------------------------------------------------
# KickStars - June 03, 2013
# ------------------------------------------------------------------------
# Designed by BestWebSoft & HTML by MegaDrupal
# Websites:  http://www.megadrupal.com -  Email: info@megadrupal.com
--------------------------------------------------------------------------*/

$(function(){

    if($('#flash').length) {
        setTimeout(function() {
            $('#flash').slideUp();
        }, 5000);
    }

    // fetch crsf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#register-form").on('submit', function(e) {
        var data = {
            name: $("#register_name").val(),
            email: $("#register_email").val(),
            password: $("#register_password").val(),
            password_confirmation: $("#register_password_confirmation").val()
        };

        $.post('/register', data).then(function(a,b,c) {
            window.location.href = '/profile/dashboard';
        }).fail(function(response) {
            var json = $.parseJSON(response.responseText);
            $("#register_error_email, #register_error_password").hide();
            $.each(json.errors, function(field, messages) {
                $("#register_error_" + field).show().html(messages[0]);
            });
        });

        e.preventDefault();
        return false;
    });

    $("#login-form").on('submit', function(e) {
        var data = {
            email: $("#login_email").val(),
            password: $("#login_password").val(),
        };

        if($('#login_remember').is('checked')) {
            data.remember = true;
        }

        $.post('/login', data).then(function(a,b,c) {
            window.location.href = '/profile';
        }).fail(function(response) {
            var json = $.parseJSON(response.responseText);
            $("#login_error_email, #login_error_password").hide();
            $.each(json.errors, function(field, messages) {
                $("#login_error_" + field).show().html(messages[0]);
            });
        });

        e.preventDefault();
        return false;
    });

    $("#logout_btn").on('click', function(e) {
        $.post('/logout').then(function() {
            window.location.href = '/';
        })
    })

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

    var contractorLogo = null;
    $('input#contractor-logo').on('change', function(event) {
        contractorLogo = event.target.files[0];
    });

    $("#form-contractor").on('submit', function(e) {
        var data = new FormData();

        data.append('id', $("#contractor-id").val());
        data.append('bio', $("#contractor-bio").val());
        data.append('public_name', $("#contractor-public-name").val());
        data.append('first_name', $("#contractor-first-name").val());
        data.append('last_name', $("#contractor-last-name").val());
        data.append('company_name', $("#contractor-company-name").val());
        data.append('street', $("#contractor-street").val());
        data.append('house_number', $("#contractor-house-number").val());
        data.append('postal_code', $("#contractor-postal-code").val());
        data.append('city', $("#contractor-city").val());
        data.append('address_line_1', $("#contractor-address-line-1").val());
        data.append('address_line_2', $("#contractor-address-line-2").val());
        data.append('address_line_3', $("#contractor-address-line-3").val());
        data.append('contact_email', $("#contractor-contact-email").val());
        data.append('contact_phone', $("#contractor-contact-phone").val());
        data.append('contact_fax', $("#contractor-contact-fax").val());
        data.append('country', $("#contractor-country").val());

        if(contractorLogo !== null) {
            data.append('logo', contractorLogo);
        }

        $.ajax({
            url: '/profile/contractor',
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function()
            {
                window.location.href = '/profile/contractor'
            },
            error: function(response)
            {
                $.each(data, function(field, value) {
                    $("#contractor-error-" + field.replace('_', '-')).hide();
                });

                var json = $.parseJSON(response.responseText);
                $.each(json.errors, function(field, messages) {
                    $("#contractor-error-" + field.replace('_', '-')).show().html(messages[0]);
                });
            }
        });

        e.preventDefault();
        return false;
    });

    var kycFile = null;
    $('input#kyc-file').on('change', function(event) {
        kycFile = event.target.files[0];
    });

    $("#form-kyc").on('submit', function(e) {
        var data = new FormData();
        data.append('id', $("#kyc-id").val());
        data.append('contractor_id', $("#kyc-contractor-id").val());
        data.append('title', $("#kyc-title").val());
        data.append('description', $("#kyc-description").val());
        data.append('file', kycFile);

        $.ajax({
            url: '/profile/kyc',
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                window.location.href = '/profile/kyc'
            },
            error: function(response)
            {
                $.each(data, function(field, value) {
                    $("#kyc-error-" + field.replace('_', '-')).hide();
                });

                var json = $.parseJSON(response.responseText);
                $.each(json.errors, function(field, messages) {
                    $("#kyc-error-" + field.replace('_', '-')).show().html(messages[0]);
                });
            }
        });

        e.preventDefault();
        return false;
    });

    var proposalFile = null;
    $('input#proposal-file').on('change', function(event) {
        proposalFile = event.target.files[0];
    });

    $("#form-proposal-doc").on('submit', function(e) {
        var data = new FormData();
        data.append('id', $("#proposal-document-id").val());
        data.append('title', $("#proposal-title").val());
        data.append('description', $("#proposal-description").val());
        data.append('file', proposalFile);

        $.ajax({
            url: '/profile/proposals/' + $("#proposal-id").val() + '/documents',
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                window.location.href = '/profile/proposals'
            },
            error: function(response)
            {
                $.each(data, function(field, value) {
                    $("#proposal-error-" + field.replace('_', '-')).hide();
                });

                var json = $.parseJSON(response.responseText);
                $.each(json.errors, function(field, messages) {
                    $("#proposal-error-" + field.replace('_', '-')).show().html(messages[0]);
                });
            }
        });

        e.preventDefault();
        return false;
    });

    $(".remove-kyc").on('click', function(e) {
        var r = confirm("Do you really want to delete this file?");
        if (r == true) {
            $.get('/profile/kyc/remove/' + $(this).data('id')).then(function() {
                window.location.reload();
            });
        }
    });

    var commentFormOpen = false;
    $("#show-comment-form").on('click', function() {
        var alternate = $("#show-comment-form").data('alternate-text');
        var current = $("#show-comment-form").text();
        $("#show-comment-form").text(alternate);
        $("#show-comment-form").data('alternate-text', current);
        if(commentFormOpen) {
            $("#form-comment").slideUp();
        } else {
            $("#form-comment").slideDown();
        }
        commentFormOpen = !commentFormOpen;
    });


    var proposalLogoFile = null;
    $('input#proposal-logo').on('change', function(event) {
        proposalLogoFile = event.target.files[0];
    });
    $("#form-proposal").on('submit', function(e) {
        var data = new FormData();
        data.append('id', $("#proposal-id").val());
        data.append('contractor_id', $("#proposal-contractor-id").val());
        data.append('title', $("#proposal-title").val());
        data.append('status', $("#proposal-status").val());
        data.append('description', $("#proposal-description").val());
        data.append('proposed_value', $("#proposal-proposed-value").val());
        data.append('proposed_currency', $("#proposal-proposed-currency").val());
        data.append('website', $("#proposal-website").val());
        data.append('source_code', $("#proposal-source-code").val());
        data.append('payment_proposal', $("#proposal-payment-proposal").val());
        data.append('tags', $("#proposal-tags").val());
        data.append('logo', proposalLogoFile);


        var url = '/profile/proposals';

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function()
            {
                window.location.href = '/profile/proposals';
            },
            error: function(response)
            {
                $.each(data, function(field, value) {
                    $("#project-error-" + field.replace('_', '-')).hide();
                });

                var json = $.parseJSON(response.responseText);
                $.each(json.errors, function(field, messages) {
                    $("#project-error-" + field.replace('_', '-')).show().html(messages[0]);
                });
            }
        });

        e.preventDefault();
        return false;
    });

    $("#form-comment").on('submit', function(e) {
        var data = {
            description: $("#comment-description").val()
        };

        var proposalId = $("#comment-proposal-id").val();
        $.post('/proposals/' + proposalId + '/comment', data).then(function(a,b,c) {
            window.location.reload();
        }).fail(function(response) {
            $.each(data, function(field, value) {
                $("#comment-error-" + field.replace('_', '-')).hide();
            });

            var json = $.parseJSON(response.responseText);
            $.each(json.errors, function(field, messages) {
                $("#comment-error-" + field.replace('_', '-')).show().html(messages[0]);
            });
        });

        e.preventDefault();
        return false;
    });
});