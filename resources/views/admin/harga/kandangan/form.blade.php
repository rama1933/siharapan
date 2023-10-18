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
                <form method="post" id="form-create" action="{{ route('harga.kandangan.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <ul>
                                <p>Sebelum Upload Silahkan Dibaca !</p>
                            </ul>
                            <ul>
                                <li>
                                    Perhatikan jenis file yang akan anda upload !
                                </li>
                                <li>
                                    Pastikan pengisian sesuai dengan format yang ditentukan !
                                </li>
                                <li>
                                    Pastikan semua kolom harga sudah diisi !
                                </li>
                                <li>
                                    Silahkan Download Format yang tersedia !
                                </li>
                                <li>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ asset('') }}doc/format siharapan.xlsx">Download Format</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <label for="tanggal">tanggal <small class="text-danger">*</small></label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="nama">File <small class="text-danger">*</small></label>
                            <input type="file" name="file" id="file" class="form-control" required>
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
                <h5 class="modal-title mb-2">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form-edit" action="{{ route('harga.delete') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="type" value="kandangan">
                        <div class="col-12">
                            <label for="tanggal">Pilih Tanggal Untuk Data Yang Dihapus <small
                                    class="text-danger">*</small></label>
                            <input type="date" name="tanggal" id="tanggalHapus" class="form-control" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="submit" id="tombol" class="btn btn-danger">HAPUS</button>
                <button type="submit" id="loading" class="btn btn-warning" style="display: none;" disabled>
                    LOADING......
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
