@extends('layouts.app')

@section('title', 'Manajemen Bahan Pokok')

@push('page-styles')
    {{-- CSS untuk DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <style>
        /* Kustomisasi untuk DataTables */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 1.5rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5em 1em;
            margin-left: 2px;
            border-radius: 0.5rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: #4A6F3A !important;
            color: white !important;
            border-color: #4A6F3A !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #f3f4f6 !important;
            border-color: #d1d5db !important;
            color: black !important;
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 0.5rem;
            border: 1px solid #d1d5db;
            padding: 0.5rem;
        }

        #bapo-table {
            border-collapse: collapse;
        }

        #bapo-table thead {
            background-color: #f9fafb;
        }

        #bapo-table th,
        #bapo-table td {
            border: 1px solid #e5e7eb;
        }

        #bapo-table tbody tr:hover {
            background-color: #f3f4f6;
        }
    </style>
@endpush

@section('content')
    <div x-data="{ createModalOpen: false, editModalOpen: false, editData: {} }" @close-modals.window="createModalOpen = false; editModalOpen = false">
        <!-- Judul Halaman dan Tombol Tambah -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Manajemen Bahan Pokok</h1>
            <button @click="createModalOpen = true"
                class="inline-flex items-center px-4 py-2 bg-brand-green-700 text-white rounded-lg font-semibold hover:bg-brand-green-800 transition-colors shadow-md">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Bahan Pokok
            </button>
        </div>

        <!-- Tabel Data -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full" id="bapo-table">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">No
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Satuan</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Komoditi</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Data akan dimuat oleh DataTables --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Bahan Pokok -->
        <div x-show="createModalOpen" @keydown.escape.window="createModalOpen = false"
            class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="createModalOpen" x-transition
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" @click="createModalOpen = false">
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                <div @click.away="createModalOpen = false" x-show="createModalOpen" x-transition
                    class="inline-block w-full max-w-lg p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Tambah Bahan Pokok Baru</h3>
                    <form id="form-create" class="mt-4 space-y-4">
                        @csrf
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Bahan Pokok</label>
                            <input type="text" name="nama" id="nama"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-brand-green-700 focus:border-brand-green-700 sm:text-sm"
                                required>
                        </div>
                        <div>
                            <label for="satuan_id" class="block text-sm font-medium text-gray-700">Satuan</label>
                            {{-- PERBAIKAN: Menggunakan select HTML standar dengan styling Tailwind --}}
                            <select name="satuan_id" id="satuan_id"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-brand-green-700 focus:border-brand-green-700 sm:text-sm"
                                required>
                                <option value="">Pilih satuan</option>
                                @foreach ($satuan as $s)
                                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="komoditi_id" class="block text-sm font-medium text-gray-700">Komoditi</label>
                            <select name="komoditi_id" id="komoditi_id"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-brand-green-700 focus:border-brand-green-700 sm:text-sm"
                                required>
                                <option value="">Pilih komoditi</option>
                                @foreach ($komoditi as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="pt-4 flex justify-end space-x-2">
                            <button type="button" @click="createModalOpen = false"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Batal</button>
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-brand-green-700 border border-transparent rounded-md shadow-sm hover:bg-brand-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-green-500">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit Bahan Pokok -->
        <div x-show="editModalOpen" @keydown.escape.window="editModalOpen = false"
            class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="editModalOpen" x-transition class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
                    @click="editModalOpen = false"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                <div @click.away="editModalOpen = false" x-show="editModalOpen" x-transition
                    class="inline-block w-full max-w-lg p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Bahan Pokok</h3>
                    <form id="form-edit" class="mt-4 space-y-4">
                        @csrf
                        <input type="hidden" name="id" x-model="editData.id">
                        <div>
                            <label for="namaEdit" class="block text-sm font-medium text-gray-700">Nama Bahan Pokok</label>
                            <input type="text" name="nama" id="namaEdit" x-model="editData.nama"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-brand-green-700 focus:border-brand-green-700 sm:text-sm"
                                required>
                        </div>
                        <div>
                            <label for="satuan_id_edit" class="block text-sm font-medium text-gray-700">Satuan</label>
                            <select name="satuan_id" id="satuan_id_edit"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-brand-green-700 focus:border-brand-green-700 sm:text-sm"
                                required>
                                @foreach ($satuan as $s)
                                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="komoditi_id_edit" class="block text-sm font-medium text-gray-700">Komoditi</label>
                            <select name="komoditi_id" id="komoditi_id_edit"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-brand-green-700 focus:border-brand-green-700 sm:text-sm"
                                required>
                                @foreach ($komoditi as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="pt-4 flex justify-end space-x-2">
                            <button type="button" @click="editModalOpen = false"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Batal</button>
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-brand-green-700 border border-transparent rounded-md shadow-sm hover:bg-brand-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-green-500">Simpan
                                Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    {{-- Memuat JS untuk DataTables, SweetAlert --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-form@4.3.0/dist/jquery.form.min.js"></script>

    <script>
        function editBapo(id) {
            $.ajax({
                url: `/master/data/show?type=bapo&id=${id}`,
                success: function(res) {
                    const alpineComponent = document.querySelector('[x-data]').__x;
                    alpineComponent.editData = res;
                    // PERBAIKAN: Set nilai untuk select standar
                    $('#satuan_id_edit').val(res.satuan_id);
                    $('#komoditi_id_edit').val(res.komoditi_id);
                    alpineComponent.editModalOpen = true;
                }
            });
        }

        function deleteBapo(id) {
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4A6F3A',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/master/data/delete`,
                        method: 'POST',
                        data: {
                            id: id,
                            type: 'bapo',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            $('#bapo-table').DataTable().ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus.'
                            });
                        }
                    });
                }
            })
        }


        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        $(document).ready(function() {
            $('#bapo-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('master.data', ['type' => 'bapo']) }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'satuan.nama',
                        name: 'satuan.nama'
                    },
                    {
                        data: 'komoditi.nama',
                        name: 'komoditi.nama'
                    },
                    {
                        data: 'buttonbapo',
                        name: 'buttonbapo',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#form-create').on('submit', function(e) {
                e.preventDefault();
                $(this).ajaxSubmit({
                    url: "{{ route('bapo.store') }}",
                    type: 'POST',
                    success: function(res) {
                        if (res.status === "success") {
                            $('#bapo-table').DataTable().ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil ditambahkan.'
                            });
                            window.dispatchEvent(new CustomEvent('close-modals'));
                            $('#form-create')[0].reset();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Gagal: Nama bahan pokok sudah ada.'
                            });
                        }
                    }
                });
            });

            $('#form-edit').on('submit', function(e) {
                e.preventDefault();
                $(this).ajaxSubmit({
                    url: "{{ route('bapo.update') }}",
                    type: 'POST',
                    success: function(res) {
                        if (res.status === "success") {
                            $('#bapo-table').DataTable().ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil diperbarui.'
                            });
                            window.dispatchEvent(new CustomEvent('close-modals'));
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Gagal memperbarui data.'
                            });
                        }
                    }
                });
            });
        });
    </script>
@endpush
