$(function () {
    const add_cart_button = $("#add_cart_button"),
        app_url = $("#app_url").val(),
        action_permission_selected_input = $(".action_permission_selected");
    let permissions = [], actions = [];
    $(document).ready(function () {
        roles();
        permissions_selected();
        delete_role();
    });

    function delete_role() {
        $(document).on('click', '.delete_role', function () {
            let id = $(this).data('id');
            confirm_delete(id);
        });
    }

    function confirm_delete(id) {
        Swal.fire({
            text: "Are you sure you want to delete this item?",
            icon: "warning",
            showCancelButton: !0,
            buttonsStyling: !1,
            confirmButtonText: "Yes, delete!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        });
        var confirm_delete = document.getElementsByClassName("swal2-confirm");
        confirm_delete[0].addEventListener('click', function () {
            delete_now(id);
        });
    }

    function delete_now(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "DELETE",
            url: app_url + "/admin/users-roles/delete/" + id,
            success: function (response) {
                if (response['error']) {
                    Swal.fire({
                        text: "The item was not deleted.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {confirmButton: "btn fw-bold btn-primary"}
                    });
                } else {
                    Swal.fire({
                        text: "You have deleted the item!.",
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {confirmButton: "btn fw-bold btn-primary"}
                    });
                    console.log(response)
                    $("#roles_content").html(response);
                }
            }
        });
    }


    function Action(id, permission_id, key) {
        this.id = id;
        this.permission_id = permission_id;
        this.key = key;
    }

    function Permission(id, actions) {
        this.id = id;
        this.actions = actions;
    }

    function permissions_selected() {
        action_permission_selected_input.click(function () {
            let permission_id = $(this).data("id"),
                action_id = $(this).val().trim(),
                key = action_id + "" + permission_id,
                action = new Action(action_id, permission_id, key),
                old_action = permissions.filter(x => x.key === key);
            if (action_id)
                if (old_action.length === 0)
                    permissions.push(action);
                else {
                    permissions = permissions.filter(x => x.key !== key);
                }
            console.log(action_id)
        });
    }

    function Per(id) {
        this.id = id
    }

    function roles() {
        "use strict";
        var KTUsersAddRole = function () {
            const t = document.getElementById("kt_modal_add_role"), e = t.querySelector("#kt_modal_add_role_form"),
                n = new bootstrap.Modal(t);
            return {
                init: function () {
                    (() => {
                        var o = FormValidation.formValidation(e, {
                            fields: {role_name: {validators: {notEmpty: {message: "Role name is required"}}}},
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger,
                                bootstrap: new FormValidation.plugins.Bootstrap5({
                                    rowSelector: ".fv-row",
                                    eleInvalidClass: "",
                                    eleValidClass: ""
                                })
                            }
                        });
                        t.querySelector('[data-kt-roles-modal-action="close"]').addEventListener("click", (t => {
                            t.preventDefault(), Swal.fire({
                                text: "Are you sure you would like to close?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Yes, close it!",
                                cancelButtonText: "No, return",
                                customClass: {confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light"}
                            }).then((function (t) {
                                t.value && n.hide()
                            }))
                        })), t.querySelector('[data-kt-roles-modal-action="cancel"]').addEventListener("click", (t => {
                            t.preventDefault(), Swal.fire({
                                text: "Are you sure you would like to cancel?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Yes, cancel it!",
                                cancelButtonText: "No, return",
                                customClass: {confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light"}
                            }).then((function (t) {
                                t.value ? (e.reset(), n.hide()) : "cancel" === t.dismiss && Swal.fire({
                                    text: "Your form has not been cancelled!.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {confirmButton: "btn btn-primary"}
                                })
                            }))
                        }));
                        const r = t.querySelector('[data-kt-roles-modal-action="submit"]');
                        r.addEventListener("click", (function (t) {
                            let permis = [];
                            let per_id = [];
                            $.each(permissions, function (i) {
                                let old_per_id = per_id.filter(x => x.id === permissions[i].permission_id);
                                console.log(old_per_id)
                                if (old_per_id.length === 0) {
                                    let pp = new Per(permissions[i].permission_id);
                                    per_id.push(pp)
                                    let op_pe = permissions.filter(x => x.permission_id === permissions[i].permission_id);
                                    let actions = [];
                                    $.each(op_pe, function (j) {
                                        actions.push(op_pe[j].id);
                                    });
                                    let perm = new Permission(permissions[i].permission_id, actions);
                                    permis.push(perm);
                                }
                            });
                            t.preventDefault(), o && o.validate().then((function (t) {
                                "Valid" == t ?
                                    $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        type: "POST",
                                        url: app_url + "/admin/users-roles/store",
                                        data: {
                                            name: $("#permission_name_create").val(),
                                            permissions: permis,
                                        },
                                        success: function (response) {
                                            if ($.isEmptyObject(response.error)) {
                                                (r.setAttribute("data-kt-indicator", "on"), r.disabled = !0, setTimeout((function () {
                                                    r.removeAttribute("data-kt-indicator"), r.disabled = !1,
                                                        Swal.fire({
                                                            text: "Form has been successfully submitted!",
                                                            icon: "success",
                                                            buttonsStyling: !1,
                                                            confirmButtonText: "Ok, got it!",
                                                            customClass: {confirmButton: "btn btn-primary"}
                                                        }).then((function (t) {
                                                            t.isConfirmed && n.hide()
                                                        }))
                                                }), 2e3));
                                                $("input").val("");
                                                $(".permission_selected").prop("checked", "");
                                                $("#roles_content").html(response);
                                            } else {
                                                Swal.fire({
                                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                                    icon: "error",
                                                    buttonsStyling: !1,
                                                    confirmButtonText: "Ok, got it!",
                                                    customClass: {confirmButton: "btn btn-primary"}
                                                })
                                                print_error(response.error);
                                            }
                                        }
                                    }) : Swal.fire({
                                        text: "Sorry, looks like there are some errors detected, please try again.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {confirmButton: "btn btn-primary"}
                                    })
                            }))
                        }))
                    })(), (() => {
                        const t = e.querySelector("#kt_roles_select_all"), n = e.querySelectorAll('[type="checkbox"]');
                        t.addEventListener("change", (t => {
                            if (t.target.checked) {
                                permissions = [];
                                n.forEach((e => {
                                    e.checked = t.target.checked
                                    let permission_id = e.getAttribute("data-id"),
                                        action_id = e.value.trim(),
                                        key = action_id + "" + permission_id,
                                        action = new Action(action_id, permission_id, key),
                                        old_action = permissions.filter(x => x.key === key);
                                    if (action_id)
                                        if (old_action.length === 0)
                                            permissions.push(action);
                                        else {
                                            permissions = permissions.filter(x => x.key !== key);
                                        }
                                }))
                            } else {
                                permissions = [];
                                n.forEach((e => {
                                    e.checked = t.target.checked
                                }))
                            }
                            console.log(permissions)
                        }))
                    })()
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function () {
            KTUsersAddRole.init()
        }));
    }

    function print_error(errors) {
        $.each(errors, function (index, val) {
            $("#" + index + "_error").html(val);
            $("#" + index).focus();
        });
    }
});
