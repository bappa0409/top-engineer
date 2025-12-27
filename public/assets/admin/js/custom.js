("use strict");
$(document).on("click", ".delete-confirm", function () {
    let url = $(this).data("route");
    let csrf = $(this).data("csrf");

    Swal.fire({
        title: "Are you sure?",
        text: "You want to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: url,
                data: {
                    _token: csrf,
                    _method: "DELETE",
                },
                success: function (data) {
                    location.reload();
                },
            });
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }
    });
});

function selectAll() {
    $('.checkbox').prop('checked', $('#check_all').is(':checked'));
}

function singleProjectSelect() {
    $('#check_all').prop(
        'checked',
        $('.checkbox:checked').length === $('.checkbox').length
    );
}

// Select all checkbox
$(document).on('change', '#check_all', function () {
    selectAll();
});

// Single checkbox
$(document).on('change', '.checkbox', function () {
    singleProjectSelect();
});

$(document).on('click', '.delete-all', function () {

    let url = $(this).data('route');
    let csrf_token = $('meta[name="csrf-token"]').attr('content');

    let idsArr = [];

    $('.checkbox:checked').each(function () {
        idsArr.push($(this).data('id'));
    });

    if (idsArr.length === 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please select at least one project',
        });
        return;
    }

    Swal.fire({
        title: 'Are you sure?',
        text: "Selected projects will be permanently deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Yes, delete them!',
    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'json',
                data: {
                    ids: idsArr.join(','),
                    _token: csrf_token,
                },
                success: function (response) {
                    if (response.status) {
                        Swal.fire('Deleted!', response.message, 'success');
                        $('#project-table').DataTable().ajax.reload(null, false);
                        $('#check_all').prop('checked', false);
                    } else {
                        Swal.fire('Error!', response.message, 'error');
                    }
                },
                error: function () {
                    Swal.fire('Error!', 'Something went wrong.', 'error');
                }
            });
        }
    });
});

$(document).on('click', '.show-contact', function () {
    var url = $(this).data('route');

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (res) {
            if (res.status) {
                $('#contact-name').text(res.data.name);
                $('#contact-email').text(res.data.email);
                $('#contact-mobile').text(res.data.mobile || 'N/A');
                $('#contact-message').text(res.data.message);
                $('#contact-created').text(res.data.created_at);

                $('#contactModal').modal('show');
            } else {
                Swal.fire('Error', 'Contact not found', 'error');
            }
        },
        error: function () {
            Swal.fire('Error', 'Something went wrong', 'error');
        }
    });
});

$(document).ready(function () {
    var storedLength = sessionStorage.getItem('dt_length') || 20;
    var table = $('#dataTable').DataTable({
        responsive: true,
        pageLength: parseInt(storedLength),
        lengthMenu: [10, 20, 50, 100]
    });
    table.on('length.dt', function (e, settings, len) {
        sessionStorage.setItem('dt_length', len);
    });
});

$(document).ready(function() {
    $('.basic-select2').select2({
        width: '100%',
    });
});

$(document).ready(function() {
    var start = moment();
    var end = moment();

    function cb(start, end) {
        $('.date-range').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
    }

    $('.date-range').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);
});

$(document).ready(function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    $('.needs-validation').each(function() {
        var form = this;
        $(form).on('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            $(form).addClass('was-validated');
        });
    });
});

$("#basic-image").change(function() {
    var input = this;

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image-preview').css('background-image', 'url(' + e.target.result + ')');
            $('#image-preview').hide();
            $('#image-preview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
});

$(document).on('change', '.visibility-change', function () {
    var id = $(this).data('id');
    var checked = this.checked;
    var url = $(this).data("route");
    var csrf_token = $('[name="csrf-token"]').attr("content");

    $.ajax({
        url: url,
        method: "GET",
        data: {
            id: id,
            visibility: checked,
            _token: csrf_token,
        },
        success: function (response) {
            var Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
            });

            Toast.fire({
                icon: "success",
                title: response.message,
            });

            // 🔄 Reload yajra datatable
            $('#project-table').DataTable().ajax.reload(null, false);
        },
        error: function () {
            var Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
            });

            Toast.fire({
                icon: "error",
                title: "Something Went Wrong..!!",
            });
        },
    });
});
