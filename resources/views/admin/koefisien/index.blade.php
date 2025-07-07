@extends('layouts.app')

@section('title', 'Analisis Koefisien Harga')

@push('page-styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@section('content')
    <div x-data="{
        loading: false,
        resultsHtml: '',
        error: '',
        startDate: '',
        endDate: '',
        fetchKoefisien() {
            this.loading = true;
            this.resultsHtml = ''; // Kosongkan hasil lama
            this.error = '';
    
            const formData = new FormData(this.$refs.filterForm);
            this.startDate = formData.get('start_date');
            this.endDate = formData.get('end_date');
    
            fetch('{{ route('koefisien.calculate') }}', {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => { throw err; });
                    }
                    return response.json();
                })
                .then(data => {
                    this.resultsHtml = data.html;
                })
                .catch(error => {
                    this.error = error.error || 'Terjadi kesalahan. Pastikan rentang tanggal memiliki data.';
                })
                .finally(() => this.loading = false);
        }
    }">

        <!-- Judul Halaman -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Analisis Koefisien Harga</h1>
        </div>

        <!-- Card Filter -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <form x-ref="filterForm" @submit.prevent="fetchKoefisien">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">
                    <!-- Filter Tanggal -->
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Awal</label>
                        <input type="text" name="start_date" id="start_date" placeholder="Pilih tanggal..."
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-brand-green-700 focus:border-brand-green-700 sm:text-sm"
                            required>
                    </div>
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Akhir</label>
                        <input type="text" name="end_date" id="end_date" placeholder="Pilih tanggal..."
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-brand-green-700 focus:border-brand-green-700 sm:text-sm"
                            required>
                    </div>
                    <!-- Tombol Aksi -->
                    <div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center px-6 py-2 bg-brand-green-700 text-white rounded-lg font-semibold hover:bg-brand-green-800 transition-colors shadow-md h-[42px]">
                            <svg x-show="loading" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span x-text="loading ? 'Memproses...' : 'Hitung Koefisien'"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- PERBAIKAN: Menggabungkan hasil dan tombol ekspor ke dalam satu kontainer -->
        <div id="results-wrapper">
            <div x-show="resultsHtml" x-html="resultsHtml"></div>
        </div>

        <!-- Pesan Error -->
        <template x-if="error">
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mt-8" role="alert">
                <p class="font-bold">Gagal!</p>
                <p x-text="error"></p>
            </div>
        </template>
    </div>
@endsection

@push('page-scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#start_date", {
                dateFormat: "Y-m-d"
            });
            flatpickr("#end_date", {
                dateFormat: "Y-m-d"
            });
        });
    </script>
@endpush
