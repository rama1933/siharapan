<div class="bg-white rounded-2xl shadow-lg overflow-hidden" x-transition>
    {{-- PERBAIKAN: Menambahkan header dengan tombol ekspor --}}
    <div class="p-6 border-b flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Hasil Analisis Fluktuasi Harga</h2>
            <p class="text-sm text-gray-500">Periode: {{ $periode_analisis }}</p>
        </div>
        <div class="flex space-x-2">
            <a href="{{ url('/harga/koefisien/pdf') }}?start_date={{ $startDate }}&end_date={{ $endDate }}"
                target="_blank"
                class="inline-flex items-center px-4 py-2 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 font-semibold text-sm transition-colors">
                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Cetak PDF
            </a>
            <a href="{{ url('/harga/koefisien/excel') }}?start_date={{ $startDate }}&end_date={{ $endDate }}"
                class="inline-flex items-center px-4 py-2 bg-green-50 text-green-700 rounded-lg hover:bg-green-100 font-semibold text-sm transition-colors">
                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Cetak Excel
            </a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Komoditas
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Harga
                        Rata-rata</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Koefisien
                        Variasi</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Level
                        Fluktuasi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($results as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $item['komoditas'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item['rata_rata'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                            {{ $item['koefisien_variasi'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span
                                class="px-3 py-1 text-xs font-semibold rounded-full {{ $item['level_fluktuasi']['color'] }}">{{ $item['level_fluktuasi']['text'] }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-8 text-gray-500">Tidak ada hasil yang dapat
                            ditampilkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
