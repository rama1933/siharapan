@extends('layouts.app')

@section('title', 'Manajemen Berita')

@push('page-styles')
    {{-- CSS untuk DataTables & Summernote --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
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

        #berita-table {
            border-collapse: collapse;
        }

        #berita-table thead {
            background-color: #f9fafb;
        }

        #berita-table th,
        #berita-table td {
            border: 1px solid #e5e7eb;
        }

        #berita-table tbody tr:hover {
            background-color: #f3f4f6;
        }

        /* Kustomisasi untuk Summernote di dalam Modal */
        .note-editor.note-frame {
            border-radius: 0.5rem;
            border: 1px solid #d1d5db;
        }
    </style>
@endpush

@section('content')
    <div x-data="{ createModalOpen: false, editModalOpen: false, editData: {} }" @close-modals.window="createModalOpen = false; editModalOpen = false">
        <!-- Judul Halaman dan Tombol Tambah -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Manajemen Berita</h1>
            <button @click="createModalOpen = true"
                class="inline-flex items-center px-4 py-2 bg-brand-green-700 text-white rounded-lg font-semibold hover:bg-brand-green-800 transition-colors shadow-md">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Berita
            </button>
        </div>

        <!-- Tabel Data -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full" id="berita-table">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">No
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Judul</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Berita</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Foto</th>
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

        <!-- Modal Tambah Berita -->
        <div x-show="createModalOpen" @keydown.escape.window="createModalOpen = false"
            class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="createModalOpen" x-transition
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" @click="createModalOpen = false">
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                <div @click.away="createModalOpen = false" x-show="createModalOpen" x-transition
                    class="inline-block w-full max-w-3xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Tambah Berita Baru</h3>
                    <form id="form-create" class="mt-4 space-y-4">
                        @csrf
                        <div>
                            <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                            <input type="text" name="judul" id="judul"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-brand-green-700 focus:border-brand-green-700 sm:text-sm"
                                required>
                        </div>
                        <div>
                            <label for="berita" class="block text-sm font-medium text-gray-700">Berita</label>
                            <textarea id="summernote" name="berita" class="form-control"></textarea>
                        </div>
                        <div>
                            <label for="path" class="block text-sm font-medium text-gray-700">Foto</label>
                            <input type="file" name="path" id="path"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-100 file:text-green-700 hover:file:bg-green-200"
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

        <!-- Modal Edit Berita -->
        <div x-show="editModalOpen" @keydown.escape.window="editModalOpen = false"
            class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="editModalOpen" x-transition class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
                    @click="editModalOpen = false"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                <div @click.away="editModalOpen = false" x-show="editModalOpen" x-transition
                    class="inline-block w-full max-w-3xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Berita</h3>
                    <form id="form-edit" class="mt-4 space-y-4">
                        @csrf
                        <input type="hidden" name="id" x-model="editData.id">
                        <div>
                            <label for="judulEdit" class="block text-sm font-medium text-gray-700">Judul</label>
                            <input type="text" name="judul" id="judulEdit" x-model="editData.judul"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-brand-green-700 focus:border-brand-green-700 sm:text-sm"
                                required>
                        </div>
                        <div>
                            <label for="summernoteEdit" class="block text-sm font-medium text-gray-700">Berita</label>
                            <textarea id="summernoteEdit" name="berita" class="form-control"></textarea>
                        </div>
                        <div>
                            <label for="pathEdit" class="block text-sm font-medium text-gray-700">Ganti Foto
                                (Opsional)</label>
                            <input type="file" name="path" id="pathEdit"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-100 file:text-green-700 hover:file:bg-green-200">
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
    {{-- Memuat JS untuk DataTables, SweetAlert, dan Summernote --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-form@4.3.0/dist/jquery.form.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        function editBerita(id) {
            $.ajax({
                url: `/berita/show?id=${id}`,
                success: function(res) {
                    const alpineComponent = document.querySelector('[x-data]').__x;
                    alpineComponent.editData = res;
                    $('#summernoteEdit').summernote('code', res.berita);
                    alpineComponent.editModalOpen = true;
                }
            });
        }

        function deleteBerita(id) {
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
                        url: `/berita/delete`,
                        method: 'POST',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            $('#berita-table').DataTable().ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Berita berhasil dihapus.'
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
            // Inisialisasi Summernote
            $('#summernote').summernote({
                height: 200
            });
            $('#summernoteEdit').summernote({
                height: 200
            });

            // Inisialisasi DataTables
            $('#berita-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('berita.data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'berita',
                        name: 'berita'
                    },
                    {
                        data: 'foto',
                        name: 'foto',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'button',
                        name: 'button',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Submit form tambah
            $('#form-create').on('submit', function(e) {
                e.preventDefault();
                $(this).ajaxSubmit({
                    url: "{{ route('berita.store') }}",
                    type: 'POST',
                    success: function(res) {
                        if (res.status === "success") {
                            $('#berita-table').DataTable().ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Berita berhasil ditambahkan.'
                            });
                            window.dispatchEvent(new CustomEvent('close-modals'));
                            $('#form-create')[0].reset();
                            $('#summernote').summernote('code', '');
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Gagal: ' + (res.message || 'Terjadi kesalahan.')
                            });
                        }
                    }
                });
            });

            // Submit form edit
            $('#form-edit').on('submit', function(e) {
                e.preventDefault();
                $(this).ajaxSubmit({
                    url: "{{ route('berita.update') }}",
                    type: 'POST',
                    success: function(res) {
                        if (res.status === "success") {
                            $('#berita-table').DataTable().ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Berita berhasil diperbarui.'
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
