@extends('layouts.master')

@section('title')
Konten About
@endsection

@section('breadcrumb')
@parent
<li class="active">Konten About
</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="addForm('{{ route('about.store') }}')" class="btn btn-success btn-xs btn-flat"><i
                        class="fa fa-plus-circle"></i> Tambah</button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Judul</th>
                        <th>Foto</th>
                        <th>Desc</th>
                        <th>Status</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('about.form')
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
                url: '{{ route('about.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'judul'},
                {data: 'foto',
                        render: function(data, type, row) {
                            if (type === 'display') {
                            return '<img src="' + data + '" alt="Foto Menu" width="150">';
                        }
                        return data;
                    }
                },
                {data: 'desc'},
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
        $('#modal-form .modal-title').text('Tambah About');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('enctype', 'multipart/form-data');
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=judul]').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit About');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('enctype', 'multipart/form-data');
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=judul]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=judul]').val(response.judul);
                $('#modal-form [name=desc]').val(response.desc);
                $('#modal-form [name=list1]').val(response.list1);
                $('#modal-form [name=list2]').val(response.list2);
                $('#modal-form [name=list3]').val(response.list3);
                $('#modal-form [name=status]').val(response.status);
                if (response.foto) {
                    $('#preview_foto').attr('src', response.foto);
                }
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