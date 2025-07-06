@extends('layouts.app')

@section('title', 'Manajemen Komoditi')

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

        #komoditi-table {
            border-collapse: collapse;
        }

        #komoditi-table thead {
            background-color: #f9fafb;
        }

        #komoditi-table th,
        #komoditi-table td {
            border: 1px solid #e5e7eb;
        }

        #komoditi-table tbody tr:hover {
            background-color: #f3f4f6;
        }
    </style>
@endpush

@section('content')
    <div x-data="{ createModalOpen: false, editModalOpen: false, editData: {} }" @close-modals.window="createModalOpen = false; editModalOpen = false">
        <!-- Judul Halaman dan Tombol Tambah -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Manajemen Komoditi</h1>
            <button @click="createModalOpen = true"
                class="inline-flex items-center px-4 py-2 bg-brand-green-700 text-white rounded-lg font-semibold hover:bg-brand-green-800 transition-colors shadow-md">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Komoditi
            </button>
        </div>

        <!-- Tabel Data -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full" id="komoditi-table">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">No
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            {{-- Data akan dimuat oleh DataTables --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Komoditi -->
        <div x-show="createModalOpen" @keydown.escape.window="createModalOpen = false"
            class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true"
            style="display: none;">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="createModalOpen" @click="createModalOpen = false" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
                    aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div @click.away="createModalOpen = false" x-show="createModalOpen"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block w-full max-w-lg p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Tambah Komoditi Baru</h3>
                    <form id="form-create" class="mt-4 space-y-6">
                        @csrf
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Komoditi</label>
                            <input type="text" name="nama" id="nama"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-brand-green-700 focus:border-brand-green-700 sm:text-sm"
                                required>
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

        <!-- Modal Edit Komoditi -->
        <div x-show="editModalOpen" @keydown.escape.window="editModalOpen = false"
            class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true"
            style="display: none;">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="editModalOpen" @click="editModalOpen = false" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
                    aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div @click.away="editModalOpen = false" x-show="editModalOpen" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block w-full max-w-lg p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Komoditi</h3>
                    <form id="form-edit" class="mt-4 space-y-6">
                        @csrf
                        <input type="hidden" name="id" x-model="editData.id">
                        <div>
                            <label for="namaEdit" class="block text-sm font-medium text-gray-700">Nama Komoditi</label>
                            <input type="text" name="nama" id="namaEdit" x-model="editData.nama"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-brand-green-700 focus:border-brand-green-700 sm:text-sm"
                                required>
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
    {{-- Memuat JS untuk DataTables dan SweetAlert --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-form@4.3.0/dist/jquery.form.min.js"></script>

    <script>
        // PERBAIKAN: Mengganti nama fungsi agar sesuai untuk Komoditi
        function editKomoditi(id) {
            $.ajax({
                url: `/master/data/show?type=komoditi&id=${id}`,
                success: function(res) {
                    const alpineComponent = document.querySelector('[x-data]').__x;
                    alpineComponent.editData = res;
                    alpineComponent.editModalOpen = true;
                }
            });
        }

        function deleteKomoditi(id) {
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
                            type: 'komoditi',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            $('#komoditi-table').DataTable().ajax.reload();
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
            $('#komoditi-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('master.data', ['type' => 'komoditi']) }}",
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
                        data: 'buttonkomoditi',
                        name: 'buttonkomoditi',
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [{
                        "width": "10%",
                        "targets": 0
                    },
                    {
                        "width": "65%",
                        "targets": 1
                    },
                    {
                        "width": "25%",
                        "targets": 2
                    }
                ]
            });

            $('#form-create').on('submit', function(e) {
                e.preventDefault();
                $(this).ajaxSubmit({
                    url: "{{ route('komoditi.store') }}",
                    type: 'POST',
                    success: function(res) {
                        if (res.status === "success") {
                            $('#komoditi-table').DataTable().ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil ditambahkan.'
                            });
                            window.dispatchEvent(new CustomEvent('close-modals'));
                            $('#form-create')[0].reset();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Gagal: Nama komoditi sudah ada.'
                            });
                        }
                    }
                });
            });

            $('#form-edit').on('submit', function(e) {
                e.preventDefault();
                $(this).ajaxSubmit({
                    url: "{{ route('komoditi.update') }}",
                    type: 'POST',
                    success: function(res) {
                        if (res.status === "success") {
                            $('#komoditi-table').DataTable().ajax.reload();
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
