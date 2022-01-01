$(function () {

    var table, save_method;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    table = $('.role_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'role', name: 'role'},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    function resetValidationText() {
        $('.role_err').hide();
        $('.keterangan_err').hide();
    }

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            console.log(key);
            $('.' + key + '_err').text(value);
            $('.' + key + '_err').show();
        });
    }

    $("#modal-role").on('hidden.bs.modal', function () {
        resetValidationText();
    });

    $('#tambahRoleBaru').click(function () {
        $('#btnSimpan').val("Simpan");
        $('#Role_id').val('');
        $('#RoleForm').trigger("reset");
        $('.modal-title').html("Buat Role Baru");
        $('#modal-role').modal('show');
    });

    $('#btnSimpan').click(function (e) {
        e.preventDefault();
        var id = $("#id").val('id');

        $(this).html('Mengirim data..');

        $.ajax({
            data: $('#RoleForm').serialize(),
            url: "/role",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                if ($.isEmptyObject(data.errors)) {
                    $('#RoleForm').trigger("reset");
                    $('#modal-role').modal('hide');
                    table.draw();

                    if (data.msg == 'success') {
                        Swal.fire({
                            // position: 'top-end',
                            icon: 'success',
                            title: 'Role berhasil disimpan!',
                            showConfirmButton: false,
                            timer: 1500
                        })  
                        $('#btnSimpan').html('Simpan');
                    }
                } else {                        
                    console.log(data.errors);
                    resetValidationText();
                    printErrorMsg(data.errors);
                    $('#btnSimpan').html('Simpan');
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $('body').on('click', '.deleteRole', function () {
        var Role_id = $(this).data("id");  
        Swal.fire({
            title: 'Apa kamu yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: '/role/'+Role_id,
                        data: {
                            "id": Role_id
                        },
                        success: function (data) {
                            table.draw();
                            Swal.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus!',
                                showConfirmButton: false,
                                timer: 1500
                            })  
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            })            
    });

    $('body').on('click', '.editRole', function () {
        var Role_id = $(this).data('id');
        $('#modal-role form')[0].reset();

        $.ajax({
            url: "role/" + Role_id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#modal-role').modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
                $('.modal-title').text('Edit Role');

                $('#Role_id').val(data.id);
                $('#role').val(data.role);
                $('#keterangan').val(data.keterangan);
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Tidak dapat menampilkan data',
                    showConfirmButton: true,
                });
            }
        });
    });

});