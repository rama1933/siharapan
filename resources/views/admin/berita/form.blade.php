<div class="modal fade" role="dialog" id="modal-create">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form-create" action="{{ route('berita.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <label for="judul">Judul <small class="text-danger">*</small></label>
                            <input type="text" name="judul" id="judul" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="berita">Berita <small class="text-danger">*</small></label>
                            <textarea id="summernote" name="berita" class="form-control"></textarea>
                        </div>
                        <div class="col-12">
                            <label for="path">Foto <small class="text-danger">*</small></label>
                            <input type="file" name="path" id="path" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                        <button type="submit" id="tombol" class="btn btn-primary">SIMPAN</button>
                        <button type="submit" id="loading" class="btn btn-warning" style="display: none;" disabled>
                            LOADING......
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" role="dialog" id="modal-edit">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form-edit" action="{{ route('berita.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" id="idEdit" name="id">
                        <div class="col-12">
                            <div class="col-12">
                                <label for="judul">Judul <small class="text-danger">*</small></label>
                                <input type="text" name="judul" id="judulEdit" class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="berita">Berita <small class="text-danger">*</small></label>
                                <textarea id="summernoteEdit" name="berita" class="form-control"></textarea>
                            </div>
                            <div class="col-12">
                                <label for="path">Foto <small class="text-danger">*</small></label>
                                <input type="file" name="path" id="pathEdit" class="form-control">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="submit" id="tombol" class="btn btn-primary">SIMPAN</button>
                <button type="submit" id="loading" class="btn btn-warning" style="display: none;" disabled>
                    LOADING......
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
