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
            email: $("#register_email").val(),
            password: $("#register_password").val(),
            password_confirmation: $("#register_password_confirmation").val()
        };

        $.post('/register', data).then(function(a,b,c) {
            window.location.href = '/profile';
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


    $("#form-login").on('submit', function(e) {
        var data = {
        };

        if($('#user-password').val() !== '') {
            data.password = $("#user-password").val();
            data.password_confirmation = $("#user-password-confirmation").val();
        }

        if($("#user-email").val() !== $("#user-email").data('original')) {
            data.email = $("#user-email").val();
        }

        if(data.email || data.password) {
            $.post('/profile/login', data).then(function (a, b, c) {
                window.location.href = '/profile?area=login&_=' + Math.random().toString(36).substr(2, 9);
            }).fail(function (response) {
                $.each(data, function (field, value) {
                    $("#user-error-" + field.replace('_', '-')).hide();
                });

                var json = $.parseJSON(response.responseText);
                $.each(json.errors, function (field, messages) {
                    $("#user-error-" + field.replace('_', '-')).show().html(messages[0]);
                });
            });
        }

        e.preventDefault();
        return false;
    });

    var userAvatar = null;
    $('input#user-avatar').on('change', function(event) {
        userAvatar = event.target.files[0];
    });

    $("#form-profile").on('submit', function(e) {
        var data = new FormData();

        data.append('bio', $("#user-bio").val());
        data.append('first_name', $("#user-first-name").val());
        data.append('last_name', $("#user-last-name").val());
        data.append('organization_name', $("#user-organization-name").val());
        data.append('street', $("#user-street").val());
        data.append('postal_code', $("#user-postal-code").val());
        data.append('city', $("#user-city").val());
        data.append('address_line_1', $("#user-address-line-1").val());
        data.append('address_line_2', $("#user-address-line-2").val());
        data.append('address_line_3', $("#user-address-line-3").val());
        data.append('country', $("#user-country").val());

        if(userAvatar !== null) {
            data.append('avatar', userAvatar);
        }

        $.ajax({
            url: '/profile/contact',
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function()
            {
                window.location.href = '/profile?area=contact&_=' + Math.random().toString(36).substr(2, 9);
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

    var kycFile = null;
    $('input[type=file]').on('change', function(event) {
        kycFile = event.target.files[0];
    });
    $("#form-documents").on('submit', function(e) {
        var data = new FormData();
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
                window.location.href = '/profile?area=kyc&_=' + Math.random().toString(36).substr(2, 9);;
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
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

    var kycFormOpen = false;
    $("#show-kyc-form").on('click', function() {
        var alternate = $("#show-kyc-form").data('alternate-text');
        var current = $("#show-kyc-form").text();
        $("#show-kyc-form").text(alternate);
        $("#show-kyc-form").data('alternate-text', current);
        if(kycFormOpen) {
            $("#form-documents").slideUp();
        } else {
            $("#form-documents").slideDown();
        }
        kycFormOpen = !kycFormOpen;
    });

    var projFormOpen = false;
    $("#show-project-form").on('click', function() {
        var alternate = $("#show-project-form").data('alternate-text');
        var current = $("#show-project-form").text();
        $("#show-project-form").text(alternate);
        $("#show-project-form").data('alternate-text', current);
        if(kycFormOpen) {
            $("#form-project").slideUp();
        } else {
            $("#form-project").slideDown();
        }
        kycFormOpen = !kycFormOpen;
    });

    var commentFormOpen = false;
    $("#show-comment-form").on('click', function() {
        var alternate = $("#show-comment-form").data('alternate-text');
        var current = $("#show-comment-form").text();
        $("#show-comment-form").text(alternate);
        $("#show-comment-form").data('alternate-text', current);
        if(kycFormOpen) {
            $("#form-comment").slideUp();
        } else {
            $("#form-comment").slideDown();
        }
        commentFormOpen = !commentFormOpen;
    });


    var projectLogoFile = null;
    $('input#project-logo').on('change', function(event) {
        projectLogoFile = event.target.files[0];
    });
    $("#form-project").on('submit', function(e) {
        var data = new FormData();
        data.append('title', $("#project-title").val());
        data.append('description', $("#project-description").val());
        data.append('costs', $("#project-costs").val());
        data.append('pasa', $("#project-pasa").val());
        data.append('website', $("#project-website").val());
        data.append('source_code', $("#project-source-code").val());
        data.append('logo', projectLogoFile);

        var url = '/profile/project';
        if($('#project-id').length > 0) {
            url = '/profile/project/' + $('#project-id').val();
        }

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
                window.location.href = '/profile?area=project&_=' + Math.random().toString(36).substr(2, 9);;
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

        var projectId = $("#comment-project-id").val();

        $.post('/projects/comment/' + projectId, data).then(function(a,b,c) {
            window.location.href = '/projects/' + projectId + '?area=comments';
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