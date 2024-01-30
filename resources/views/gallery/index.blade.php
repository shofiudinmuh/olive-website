@extends('layouts.master')

@section('title')
Daftar Gallery
@endsection

@section('breadcrumb')
@parent
<li class="active">Daftar Gallery</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="addForm('{{ route('gallery.store') }}')" class="btn btn-success btn-xs btn-flat"><i
                        class="fa fa-plus-circle"></i> Tambah</button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama Gallery</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('gallery.form')
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
                url: '{{ route('gallery.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'nama_gallery'},
                {data: 'foto',
                    render: function(data, type, row) {
                        if (type === 'display') {
                            return '<img src="' + data + '" alt="Foto Event" width="100">';
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
        $('#modal-form .modal-title').text('Tambah Gallery');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('enctype', 'multipart/form-data');
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_gallery]').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Gallery');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('enctype', 'multipart/form-data');
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama_gallery]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama_gallery]').val(response.nama_gallery);
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