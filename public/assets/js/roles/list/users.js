var table = $('#kt_roles_view_table');
$(function () {
    const language = $('#language').val(),
        app_url = $('#app_url').val(),
        role_id = $("#role_id").val();
    $(document).ready(function () {
        "use strict";
        get_users();
        //users();
        /*Table Actions*/
        $(document).on('click', '#delete', function () {
            let id = $(this).data('id');
            confirm_delete(id);
        });

    });

    function users() {
        "use strict";
        var KTProjectUsers = {
            init: function () {
                !function () {
                    const t = document.getElementById("kt_project_users_table");
                    if (!t) return;
                    t.querySelectorAll("tbody tr").forEach((t => {
                        const e = t.querySelectorAll("td"), r = moment(e[1].innerHTML, "MMM D, YYYY").format();
                        e[1].setAttribute("data-order", r)
                    }));
                    const e = $(t).DataTable({info: !1, order: [], columnDefs: [{targets: 4, orderable: !1}]});
                    var r = document.getElementById("kt_filter_search");
                    r && r.addEventListener("keyup", (function (t) {
                        e.search(t.target.value).draw()
                    }))
                }()
            }
        };
        KTUtil.onDOMContentLoaded((function () {
            KTProjectUsers.init()
        }));

    }

    function confirm_delete(id) {
        const o = "sads";
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
            delete_user(id);
        });
    }

    function delete_user(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "DELETE",
            url: app_url + "/admin/users-roles/delete/" + role_id + "/user/" + id,
            success: function (response) {
                if (response['success']) {
                    Swal.fire({
                        text: "You have deleted the item!.",
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {confirmButton: "btn fw-bold btn-primary"}
                    });
                    table.DataTable().ajax.reload();
                } else if (response['error']) {
                    Swal.fire({
                        text: "The item was not deleted.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {confirmButton: "btn fw-bold btn-primary"}
                    });
                }
            }
        });
    }

    function get_users() {
        var KTUsersList = function () {
            var t, e, n = () => {
                t.querySelectorAll('[data-kt-roles-table-filter="delete_row"]').forEach((t => {
                    t.addEventListener("click", (function (t) {
                        t.preventDefault();
                        const n = t.target.closest("tr"),
                            o = n.querySelector('[data-kt-roles-table-filter="user_name"]').innerText;
                        Swal.fire({
                            text: "Are you sure you want to delete " + o + "?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Yes, delete!",
                            cancelButtonText: "No, cancel",
                            customClass: {
                                confirmButton: "btn fw-bold btn-danger",
                                cancelButton: "btn fw-bold btn-active-light-primary"
                            }
                        }).then((function (t) {
                            t.value ? Swal.fire({
                                text: "You have deleted " + o + "!.",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {confirmButton: "btn fw-bold btn-primary"}
                            }).then((function () {
                                e.row($(n)).remove().draw()
                            })) : "cancel" === t.dismiss && Swal.fire({
                                text: o + " was not deleted.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {confirmButton: "btn fw-bold btn-primary"}
                            })
                        }))
                    }))
                }))
            };
            return {
                init: function () {
                    (t = document.querySelector("#kt_roles_view_table")) && ((e = $(t).DataTable({
                        searchable: true,
                        ajax: {
                            "url": app_url + "/admin/users-roles/show/" + role_id,
                            "type": 'GET',
                        },
                        columns: [
                            {
                                data: 'id',
                                name: 'id',
                            },
                            {
                                data: 'name',
                                name: 'name',
                            },
                            {
                                data: 'created_at',
                                name: 'created_at',
                            }, {
                                data: 'action',
                                name: 'action',
                                orderable: false,
                                searchable: false
                            },
                        ],
                    })).on("draw", (function () {
                        n()
                    })), document.querySelector('[data-kt-roles-table-filter="search"]').addEventListener("keyup", (function (t) {
                        e.search(t.target.value).draw()
                    })), n())
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function () {
            KTUsersList.init()
        }));
    }
});
