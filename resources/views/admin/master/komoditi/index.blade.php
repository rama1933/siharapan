@extends('layouts.app')

@section('custom_css')
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-title"> TABEL KOMODITI</h4>
                </div>
                <div class="col-6">
                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-create"> <i
                            class="fa fa-plus"> Tambah</i>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table">
                    <thead class="bg-primary text-white">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.master.komoditi.form')
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
    <script src="{{ asset('js/master/komoditi/main.js') }}"></script>
@endsection
