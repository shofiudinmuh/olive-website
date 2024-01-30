@extends('layouts.master')

@section('title')
Daftar Staff
@endsection

@section('breadcrumb')
@parent
<li class="active">Daftar Staff
</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="addForm('{{ route('staff.store') }}')" class="btn btn-success btn-xs btn-flat"><i
                        class="fa fa-plus-circle"></i> Tambah</button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama Staff</th>
                        <th>Jabatan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('staff.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('staff.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'nama_staff'},
                {data: 'nama_jabatan'},
                {data: 'foto',
                render: function(data, type, row) {
                    if (type === 'display') {
                        return '<img src="' + data + '" alt="Foto Staff" width="50">';
                        }
                        return data;
                    }
                },
                {data: 'status'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });

        $('#modal-form').validator().on('submit', function (e) {
            e.preventDefault();

            let formData = new FormData($('#modal-form form')[0]);

            $.ajax({
                url: $('#modal-form form').attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {

                    $('#modal-form').modal('hide');
                    table.ajax.reload();
                    Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan',
                    showConfirmButton: false,
                    timer: 1500
                    });
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseJSON.errors);
                    alert('Tidak dapat menyimpan data');
                }
            });
        });
    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Staff');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('enctype', 'multipart/form-data');
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_staff]').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Staff');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('enctype', 'multipart/form-data');
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama_staff]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama_staff]').val(response.nama_staff);
                $('#modal-form [name=id_jabatan]').val(response.id_jabatan);
                if (response.foto) {
                    $('#preview_foto').attr('src', response.foto);
                }
                $('#modal-form [name=status]').val(response.status);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }

    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data terpilih?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }
</script>
@endpush