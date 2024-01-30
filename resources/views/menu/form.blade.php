<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
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
                    <div class="form-group row">
                        <label for="status" class="col-lg-2 col-lg-offset-1 control-label">Status</label>
                        <div class="col-lg-6">
                            <select name="status" id="status" class="form-control" required>
                                <option value="">Pilih Status</option>
                                <option value="tampil">Tampil</option>
                                <option value="tidak tampil">Tidak Tampil</option>
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i
                            class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>