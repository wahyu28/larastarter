$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    table = $('.posisi_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'posisi', name: 'posisi'},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    function resetValidationText() {
        $('.posisi_err').hide();
        $('.keterangan_err').hide();
    }

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            console.log(key);
            $('.' + key + '_err').text(value);
            $('.' + key + '_err').show();
        });
    }

    $("#modal-posisi").on('hidden.bs.modal', function () {
        resetValidationText();
    });

    $('#tambahPosisiBaru').click(function () {
        $('#btnSimpan').val("Simpan");
        $('#Posisi_id').val('');
        $('#PosisiForm').trigger("reset");
        $('.modal-title').html("Buat Posisi Baru");
        $('#modal-posisi').modal('show');
    });

    $('#btnSimpan').click(function (e) {
        e.preventDefault();
        // var id = $("#id").val('id');

        $(this).html('Mengirim data..');
        $("#btnSimpan"). attr("disabled", true);

        $.ajax({
            data: $('#PosisiForm').serialize(),
            url: "/posisi",
            type: "POST",
            dataType: 'JSON',
            success: function (data) {
                if ($.isEmptyObject(data.errors)) {
                    $('#PosisiForm').trigger("reset");
                    $('#modal-posisi').modal('hide');
                    table.draw();

                    if (data.msg == 'success') {
                        Swal.fire({
                            // position: 'top-end',
                            icon: 'success',
                            title: 'Posisi berhasil disimpan!',
                            showConfirmButton: false,
                            timer: 1500
                        })  
                        $('#btnSimpan').html('Simpan');
                        $("#btnSimpan"). attr("disabled", false);
                    }
                } else {                        
                    console.log(data.errors);
                    resetValidationText();
                    printErrorMsg(data.errors);
                    $('#btnSimpan').html('Simpan');
                    $("#btnSimpan"). attr("disabled", false);
                }
            },
            error: function (data) {
                console.log('Error:', data);
                $("#btnSimpan"). attr("disabled", false);
            }
        });
    });

    $('body').on('click', '.deletePosisi', function () {
        var Posisi_id = $(this).data("id");
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
                        url: '/posisi/'+Posisi_id,
                        data: {
                            "id": Posisi_id
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

    $('body').on('click', '.editPosisi', function () {
        var Posisi_id = $(this).data('id');
        save_method = 'edit';
        $('#modal-posisi form')[0].reset();

        $.ajax({
            url: "posisi/" + Posisi_id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#modal-posisi').modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
                $('.modal-title').text('Edit Posisi');

                $('#posisi_id').val(data.id);
                $('#posisi').val(data.posisi);
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