@extends('layouts.master')

@section('title')
Tambah Menu
@endsection

@section('breadcrumb')
@parent
<li class="active">Tambah Menu</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-10">
        <div class="box">
            <form action="{{ route('menu.store') }}" method="post" class="form-biodata" data-toggle="validator"
                enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    </br>
                    <div class="alert alert-info alert-dismissible" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-check"></i> Perubahan berhasil disimpan
                    </div>
                    <div class="form-group row mt-2">
                        <label for="nama_menu" class="col-lg-2 col-lg-offset-1 control-label">Nama Menu</label>
                        <div class="col-lg-6">
                            <input type="text" name="nama_menu" id="nama_menu" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-lg-2 col-lg-offset-1 control-label">Harga</label>
                        <div class="col-lg-6">
                            <input type="number" name="harga" id="harga" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_kategori" class="col-lg-2 col-lg-offset-1 control-label">Kategori</label>
                        <div class="col-lg-6">
                            <select name="id_kategori" id="id_kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_knowladge" class="col-lg-2 col-lg-offset-1 control-label">Produk
                            Knowladge</label>
                        <div class="col-lg-6">
                            <textarea type="text" name="product_knowladge" id="product_knowladge" class="form-control"
                                required autofocus></textarea>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="desc" class="col-lg-2 col-lg-offset-1 control-label">Deskripsi</label>
                        <div class="col-lg-6">
                            <textarea name="desc" id="desc" class="form-control" required autofocus></textarea>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="path_foto" class="col-lg-2 col-lg-offset-1 control-label">Foto</label>
                        <div class="col-lg-4">
                            <input type="file" name="path_foto" class="form-control" id="path_foto"
                                onchange="preview('.tampil_foto', this.files[0])">
                            <span class="help-block with-errors"></span>
                            <br>
                            <div class="tampil_foto"></div>
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan </button>
                    <a href="{{ route('menu.index') }}" class="btn btn-sm btn-flat btn-warning"><i
                            class="fa fa-arrow-circle-left"></i> Batal </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- <script>
    $(function () {
        showData();

        $('.form-biodata').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.ajax({
                    url: $('.form-biodata').attr('action'),
                    type: $('.form-biodata').attr('method'),
                    data: new FormData($('.form-biodata')[0]),
                    async: false,
                    processData: false,
                    contentType: false
                })
                .done(response => {
                    showData();
                    $('.alert').fadeIn();

                    setTimeout(() => {
                        $('.alert').fadeOut();
                    }, 3000);
                })
                .fail(errors => {
                    alert('Tidak dapat menyimpan data');
                    return;
                });
            }
        });
    });

    function showData(url) {
        $.get('{{ route('biodata.show', '$biodata->id_biodata') }}')
            .done(response => {
                $('[name=nik]').val(response.nik);
                $('[name=nama_kader]').val(response.nama_kader);
                $('[name=tempat_lahir]').val(response.tempat_lahir);
                $('[name=tgl_lahir]').val(response.tgl_lahir);
                $('[name=nohp]').val(response.nohp);
                $('[name=alamat]').val(response.alamat);
                $('[name=email]').val(response.email);
                $('[name=bank]').val(response.bank);
                $('[name=norek]').val(response.norek);
                $('[name=kelurahan]').val(response.kelurahan);
                $('[name=kecamatan]').val(response.kecamatan);
                $('[name=kota]').val(response.kota);
                $('.tampil-foto').html(`<img src="{{ url('/') }}${response.path_foto}" width="200">`);
                // $('.tampil-kartu-member').html(`<img src="{{ url('/') }}${response.path_kartu_member}" width="300">`);
                // $('[rel=icon]').attr('href', `{{ url('/') }}/${response.path_logo}`);
            })
            .fail(errors => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }
</script> --}}
@endpush