$(function () {
    const language = $('#language').val(),
        app_url = $('#app_url').val(),
        submit_button = document.getElementById("kt_ecommerce_edit_submit"),
        cancel_button = document.getElementById("kt_ecommerce_edit_product_cancel"),
        facebook_input = $("#facebook"),
        add_form = $("#kt_ecommerce_edit_form");

    $(document).ready(function () {
        submit();
        date_picker();
        cancel();
    });

    function date_picker(){
        $(".from_date").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format("YYYY"),10)
            }, function(start, end, label) {
                var years = moment().diff(start, "years");
                alert("You are " + years + " years old!");
            }
        );
    }

    function submit() {
        submit_button.addEventListener('click', function () {
            let facebook = facebook_input.val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: app_url + "/admin/forms/store",
                data: {
                    facebook: facebook,
                },
                success: function (response) {
                    if ($.isEmptyObject(response.error)) {
                        success_submit(response.success);
                    } else {
                        failed_submit(response.error);
                    }
                }
            });
        });
    }

    function print_error(errors) {
        $.each(errors, function (index, val) {
            $("#" + index + "_error").html(val);
            $("#" + index).focus();
        });
    }

    function cancel(){
        cancel_button.addEventListener("click", (t => {
            add_form.attr("data-kt-redirect", app_url + "/admin");
            t.preventDefault(), Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light"}
            }).then((function (t) {
                t.value ? window.location = add_form.attr("data-kt-redirect") : "cancel" === t.dismiss && Swal.fire({
                    text: "Your form has not been cancelled!.",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {confirmButton: "btn btn-primary"}
                })
            }))
        }))
    }

    function success_submit(id) {
        //Success Submit
        $(".errors").html("");
        add_form.attr("data-kt-redirect", app_url + "/admin");
        (submit_button.setAttribute("data-kt-indicator", "on"), submit_button.disabled = !0, setTimeout((function () {
            submit_button.removeAttribute("data-kt-indicator"), Swal.fire({
                text: "Form has been successfully submitted!",
                icon: "success",
                buttonsStyling: !1,
                confirmButtonText: "Ok, got it!",
                customClass: {confirmButton: "btn btn-primary"}
            }).then((function (e) {
                e.isConfirmed && (submit_button.disabled = !1, window.location = add_form.attr("data-kt-redirect"))
            }))
            submit_button.disabled = !1
        }), 1000));//2e3 == 1000
    }

    function failed_submit(errors) {
        //Failed Submit
        $(".errors").html("");
        (submit_button.setAttribute("data-kt-indicator", "on"), submit_button.disabled = !0, setTimeout((function () {
            submit_button.removeAttribute("data-kt-indicator"), Swal.fire({
                text: "Sorry, looks like there are some errors detected, please try again.",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "Ok, got it!",
                customClass: {confirmButton: "btn btn-primary"}
            })
            submit_button.disabled = !1
            print_error(errors);
        }), 1000));
    }
});
