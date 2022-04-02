/*{{--//TODO:: MOOM*EN S. ALDAHDOU*H 1/24/2022--}}*/
//Admin Auth
$(function () {
    //Sing in
    //inputs
    var sign_in_faild_tag = $('#sign_in_faild');
    var email_signin_tag = $('#email_signin');
    var password_signin_tag = $('#password_signin');
    //errors
    var email_signin_error_tag = $('#email_signin_error');
    var password_signin_error_tag = $('#password_signin_error');
    //Register
    //inputs
    var name_tag = $('#name');
    var last_name_tag = $('#last_name');
    var email_tag = $('#email');
    var mobile_tag = $('#mobile');
    var password_tag = $('#password');
    var password_confirm_tag = $('#password_confirm');
    //errors
    var email_error_tag = $('#email_error');
    var password_error_tag = $('#password_error');
    var password_confirm_error_tag = $('#password_confirm_error');
    var name_error_tag = $('#name_error');
    var last_name_error_tag = $('#last_name_error');
    var mobile_error_tag = $('#mobile_error');
    var app_url = $('#app_url').val();
    let previous_url = $("#previous_url").val();
    $(document).ready(function () {
        //preper_tags(0);
        click_button();
    });

    function login() {
        var email = email_signin_tag.val();
        var password = password_signin_tag.val();
        $.ajax({
            type: "POST",
            url: app_url + "/admin/login",
            data: {
                _token: $("input[name=_token]").val(),
                email: email,
                password: password
            },
            success: function (response) {
                if (response['success']) {
                    //document.location.href = app_url + "/admin/dashboard";
                    if (previous_url.indexOf("admin") !== -1)
                        window.location.href = previous_url;
                    else
                        window.location.href = app_url + "/admin/dashboard";
                } else {
                    if (response['error']) {
                        print_error(response.error);
                    } else if (response['error_sing_in']) {
                        var error = {"password": response['error_sing_in']};
                        print_error(error);
                    }
                }
            }
        });

        function user_not_exist(msg) {
            email_signin_error_tag.html(msg);
            email_signin_error_tag.removeClass("d-none");
            email_signin_tag.addClass("is-invalid");
        }

        function error_in_login(msg) {
            password_signin_error_tag.html(msg);
            password_signin_error_tag.removeClass("d-none");
            password_signin_tag.addClass("is-invalid");
        }

        /*{{--//TODO:: -- MOOMEN S. ALDAH/DOUH -- 12/19/2021--}}*/

        function print_error(errors) {
            $('.errors').html("");
            $.each(errors, function (index, val) {
                console.log(val);
                $("#" + index + "_signin_error").html(val);
            });
        }

        function printErrorMsg(msg) {
            console.log(msg);
            if (msg['email']) {
                email_signin_error_tag.html(msg['email']);
                email_signin_error_tag.removeClass("d-none");
                email_signin_tag.addClass("is-invalid");
            } else {
                email_signin_error_tag.addClass("d-none");
                email_signin_tag.removeClass("is-invalid");
            }
            if (msg['password']) {
                password_signin_error_tag.html(msg['password']);
                password_signin_error_tag.removeClass("d-none");
                password_signin_tag.addClass("is-invalid");
            } else {
                password_signin_error_tag.addClass("d-none");
                password_signin_tag.removeClass("is-invalid");
            }
        }
    }

    function register() {
        var name = name_tag.val();
        var last_name = last_name_tag.val();
        var email = email_tag.val();
        var mobile = mobile_tag.val();
        var password = password_tag.val();
        var password_confirm = password_confirm_tag.val();
        $.ajax({
            type: "POST",
            url: app_url + "/user/register",
            data: {
                _token: $("input[name=_token]").val(),
                name: name,
                last_name: last_name,
                email: email,
                mobile: mobile,
                password: password,
                password_confirmation: password_confirm
            },
            success: function (response) {
                if (response['success']) {
                    //document.location.href = app_url + "/admin/dashboard";
                    if (previous_url.indexOf("admin") !== -1)
                        window.location.href = previous_url;
                    else
                        window.location.href = app_url + "/admin/dashboard";
                } else if (response['error']) {
                    printErrorMsg(response.error);
                }
            }
        });

        function printErrorMsg(msg) {
            if (msg['name']) {
                name_error_tag.html(msg['name']);
                name_error_tag.removeClass("d-none");
                name_tag.addClass("is-invalid");
            } else {
                name_error_tag.addClass("d-none");
                name_tag.removeClass("is-invalid");
            }
            if (msg['last_name']) {
                last_name_error_tag.html(msg['last_name']);
                last_name_error_tag.removeClass("d-none");
                last_name_tag.addClass("is-invalid");
            } else {
                last_name_error_tag.addClass("d-none");
                last_name_tag.removeClass("is-invalid");
            }
            if (msg['email']) {
                email_error_tag.html(msg['email']);
                email_error_tag.removeClass("d-none");
                email_tag.addClass("is-invalid");
            } else {
                email_error_tag.addClass("d-none");
                email_tag.removeClass("is-invalid");
            }
            if (msg['password']) {
                password_error_tag.html(msg['password']);
                password_error_tag.removeClass("d-none");
                password_tag.addClass("is-invalid");
                password_tag.val("");
                password_confirm_error_tag.html(msg['password']);
                password_confirm_error_tag.removeClass("d-none");
                password_confirm_tag.addClass("is-invalid");
                password_confirm_tag.val("");
            } else {
                password_error_tag.addClass("d-none");
                password_tag.removeClass("is-invalid");
                password_confirm_error_tag.addClass("d-none");
                password_confirm_tag.removeClass("is-invalid");
            }
            if (msg['mobile']) {
                mobile_error_tag.html(msg['mobile']);
                mobile_error_tag.removeClass("d-none");
                mobile_tag.addClass("is-invalid");
            } else {
                mobile_error_tag.addClass("d-none");
                mobile_tag.removeClass("is-invalid");
            }
        }
    }

    function preper_tags(display) {
        switch (display) {
            case 0:
                //inputs
                email_signin_tag.removeClass("is-invalid");
                password_signin_tag.removeClass("is-invalid");
                name_tag.removeClass("is-invalid");
                email_tag.removeClass("is-invalid");
                last_name_tag.removeClass("is-invalid");
                mobile_tag.removeClass("is-invalid");
                password_tag.removeClass("is-invalid");
                password_confirm_tag.removeClass("is-invalid");
                //errors
                sign_in_faild_tag.addClass("d-none");
                email_signin_error_tag.addClass("d-none");
                password_signin_error_tag.addClass("d-none");
                name_error_tag.addClass("d-none");
                last_name_error_tag.addClass("d-none");
                email_error_tag.addClass("d-none");
                mobile_error_tag.addClass("d-none");
                password_error_tag.addClass("d-none");
                password_confirm_error_tag.addClass("d-none");
                break;
            case 1:
                email_signin_tag.addClass("is-invalid");
                password_signin_tag.addClass("is-invalid");

                email_tag.removeClass("is-invalid");
                last_name_tag.removeClass("is-invalid");
                mobile_tag.removeClass("is-invalid");
                password_tag.removeClass("is-invalid");
                password_confirm_tag.removeClass("is-invalid");

                email_signin_error_tag.removeClass("d-none");
                password_signin_error_tag.removeClass("d-none");

                name_error_tag.addClass("d-none");
                last_name_error_tag.addClass("d-none");
                email_error_tag.addClass("d-none");
                mobile_error_tag.addClass("d-none");
                password_error_tag.addClass("d-none");
                password_confirm_error_tag.addClass("d-none");
                break;
            case 2:
                email_signin_tag.removeClass("is-invalid");
                password_signin_tag.removeClass("is-invalid");

                email_tag.addClass("is-invalid");
                last_name_tag.addClass("is-invalid");
                mobile_tag.addClass("is-invalid");
                password_tag.addClass("is-invalid");
                password_confirm_tag.addClass("is-invalid");

                email_signin_error_tag.addClass("d-none");
                password_signin_error_tag.addClass("d-none");

                name_error_tag.removeClass("d-none");
                last_name_error_tag.removeClass("d-none");
                email_error_tag.removeClass("d-none");
                mobile_error_tag.removeClass("d-none");
                password_error_tag.removeClass("d-none");
                password_confirm_error_tag.removeClass("d-none");
                break;

        }
    }

    function click_button() {
        $(document).on('click', 'button', function () {
            const button_id = $(this).attr('id');
            switch (button_id) {
                case 'sign_in':
                    login();
                    break;
                case 'sign_up':
                    register();
                    break;
            }
        });
        $(document).bind('keypress', function (e) {
            switch (e.keyCode) {
                case 13:
                    login();
            }
        });
    }
});
