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
                <form method="post" id="form-create" action="{{ route('bapo.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <label for="nama">Nama <small class="text-danger">*</small></label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>


                        <div class="col-12">
                            <label for="satuan">Satuan <small class="text-danger">*</small></label>
                            <select name="satuan_id" id="satuan_id" class="form-control select2" style="width:100%"
                                required>
                                <option value="">Pilih satuan</option>
                                @foreach ($satuan as $satuan)
                                    <option value="{{ $satuan->id }}">{{ $satuan->nama }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="col-12">
                            <label for="bidang">Komoditi <small class="text-danger">*</small></label>
                            <select name="komoditi_id" id="komoditi_id" class="form-control select2" style="width:100%"
                                required>
                                <option value="">Pilih komoditi</option>
                                @foreach ($komoditi as $komoditi)
                                    <option value="{{ $komoditi->id }}">{{ $komoditi->nama }}</option>
                                @endforeach

                            </select>
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
                <form method="post" id="form-edit" action="{{ route('bapo.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" id="idEdit" name="id">
                        <div class="col-12">
                            <label for="nama">Nama <small class="text-danger">*</small></label>
                            <input type="text" name="nama" id="namaEdit" class="form-control">
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
