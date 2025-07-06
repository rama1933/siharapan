@extends('layouts.app')

@section('title', 'Manajemen Harga Pasar Kandangan')

@push('page-styles')
    {{-- CSS untuk DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <style>
        /* Kustomisasi untuk DataTables agar cocok dengan tema */
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

        #harga-table {
            border-collapse: collapse;
        }

        #harga-table thead {
            background-color: #f9fafb;
        }

        #harga-table th,
        #harga-table td {
            border: 1px solid #e5e7eb;
        }

        #harga-table tbody tr:hover {
            background-color: #f3f4f6;
        }
    </style>
@endpush

@section('content')
    <div x-data="{ importModalOpen: false, deleteModalOpen: false }" @close-modals.window="importModalOpen = false; deleteModalOpen = false">
        <!-- Judul Halaman dan Tombol Aksi -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4 sm:mb-0">Tabel Harga </h1>
            <div class="flex space-x-2">
                <button @click="importModalOpen = true"
                    class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition-colors shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Import Data
                </button>
                <button @click="deleteModalOpen = true"
                    class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition-colors shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus Data
                </button>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full" id="harga-table">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">No
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Jenis</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Satuan</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Harga</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Persediaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Data akan dimuat oleh DataTables --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Import Data -->
        <div x-show="importModalOpen" @keydown.escape.window="importModalOpen = false"
            class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="importModalOpen" x-transition
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" @click="importModalOpen = false">
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                <div @click.away="importModalOpen = false" x-show="importModalOpen" x-transition
                    class="inline-block w-full max-w-lg p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Import Data Harga</h3>
                    <form id="form-create" action="{{ route('harga.kandangan.store') }}" method="POST"
                        enctype="multipart/form-data" class="mt-4 space-y-4">
                        @csrf
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                            <div class="flex">
                                <div class="py-1"><svg class="w-6 h-6 text-yellow-500 mr-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg></div>
                                <div>
                                    <p class="font-bold">Sebelum Upload, Harap Dibaca!</p>
                                    <ul class="list-disc list-inside text-sm mt-2 space-y-1">
                                        <li>Pastikan file yang akan di-upload berjenis <strong>.xlsx</strong> atau
                                            <strong>.xls</strong>.
                                        </li>
                                        <li>Pastikan format pengisian sudah sesuai dengan template.</li>
                                        <li>Pastikan semua kolom harga sudah terisi.</li>
                                        <li><a href="{{ asset('doc/format siharapan.xlsx') }}"
                                                class="text-blue-600 hover:underline font-medium">Download Template Format
                                                di Sini</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Laporan</label>
                            <input type="date" name="tanggal" id="tanggal"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-brand-green-700 focus:border-brand-green-700 sm:text-sm"
                                required>
                        </div>
                        <div>
                            <label for="file" class="block text-sm font-medium text-gray-700">File Excel</label>
                            <input type="file" name="file" id="file"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-100 file:text-green-700 hover:file:bg-green-200"
                                required>
                        </div>
                        <div class="pt-4 flex justify-end space-x-2">
                            <button type="button" @click="importModalOpen = false"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Batal</button>
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-brand-green-700 border border-transparent rounded-md shadow-sm hover:bg-brand-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-green-500">Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Hapus Data -->
        <div x-show="deleteModalOpen" @keydown.escape.window="deleteModalOpen = false"
            class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="deleteModalOpen" x-transition
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" @click="deleteModalOpen = false">
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                <div @click.away="deleteModalOpen = false" x-show="deleteModalOpen" x-transition
                    class="inline-block w-full max-w-lg p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Hapus Data Berdasarkan Tanggal</h3>
                    <form id="form-delete" action="{{ route('harga.delete') }}" method="POST" class="mt-4 space-y-4">
                        @csrf
                        <input type="hidden" name="type" value="kandangan">
                        <div>
                            <label for="tanggalHapus" class="block text-sm font-medium text-gray-700">Pilih Tanggal Data
                                yang Akan Dihapus</label>
                            <input type="date" name="tanggal" id="tanggalHapus"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-brand-green-700 focus:border-brand-green-700 sm:text-sm"
                                required>
                        </div>
                        <div class="pt-4 flex justify-end space-x-2">
                            <button type="button" @click="deleteModalOpen = false"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Batal</button>
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Hapus
                                Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    {{-- Memuat JS untuk DataTables dan SweetAlert --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-form@4.3.0/dist/jquery.form.min.js"></script>

    <script>
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
            $('#harga-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('harga.data', ['type' => 'kandangan']) }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'satuan',
                        name: 'satuan'
                    },
                    {
                        data: 'harga_terendah',
                        name: 'harga_terendah'
                    },
                    {
                        data: 'persedian',
                        name: 'persedian'
                    }
                ]
            });

            $('#form-create').on('submit', function(e) {
                e.preventDefault();
                $(this).ajaxSubmit({
                    success: function(res) {
                        if (res.status === "success") {
                            $('#harga-table').DataTable().ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil diimpor.'
                            });
                            window.dispatchEvent(new CustomEvent('close-modals'));
                            $('#form-create')[0].reset();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Gagal: ' + (res.message || 'Terjadi kesalahan.')
                            });
                        }
                    }
                });
            });

            $('#form-delete').on('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Anda Yakin?',
                    text: "Data pada tanggal yang dipilih akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).ajaxSubmit({
                            success: function(res) {
                                if (res.status === "success") {
                                    $('#harga-table').DataTable().ajax.reload();
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Data berhasil dihapus.'
                                    });
                                    window.dispatchEvent(new CustomEvent(
                                        'close-modals'));
                                    $('#form-delete')[0].reset();
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'Gagal: ' + (res.message ||
                                            'Tidak ada data untuk dihapus.')
                                    });
                                }
                            }
                        });
                    }
                })
            });
        });
    </script>
@endpush
