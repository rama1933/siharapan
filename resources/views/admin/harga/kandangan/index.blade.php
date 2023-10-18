@extends('layouts.app')

@section('custom_css')
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-title"> TABEL HARGA PASAR KANDANGAN</h4>
                </div>
                <div class="col-6">
                    <button class="btn btn-danger float-right  mr-1 ml-1" data-toggle="modal" data-target="#modal-edit">
                        <i class='fa fa-trash'></i> HAPUS DATA </button>
                    <button class="btn btn-success float-right mr-1 ml-1" data-toggle="modal" data-target="#modal-create">
                        <i class='fa fa-plus'></i> IMPORT DATA </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table">
                    <thead class="bg-primary text-white">
                        <th>No</th>
                        <th style="padding-left:50px;padding-right:50px;border-spacing: 0px;white-space: nowrap;">Tanggal
                        </th>
                        <th style="padding-left:50px;padding-right:50px;border-spacing: 0px;white-space: nowrap;">Jenis</th>
                        <th style="padding-left:50px;padding-right:50px;border-spacing: 0px;white-space: nowrap;">Komoditi
                        </th>
                        <th style="padding-left:50px;padding-right:50px;border-spacing: 0px;white-space: nowrap;">Satuan
                        </th>
                        <th style="padding-left:50px;padding-right:50px;border-spacing: 0px;white-space: nowrap;">Harga
                            Terendah</th>
                        <th style="padding-left:50px;padding-right:50px;border-spacing: 0px;white-space: nowrap;">Persediaan
                        </th>
                        {{--  <th>Aksi</th>  --}}
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.harga.kandangan.form')
@endsection

@section('custom_js')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({});
        });

        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>
    <script src="{{ asset('js/admin/harga/kandangan/main.js') }}"></script>
@endsection
