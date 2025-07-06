/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        // Tambahkan warna kustom Anda di sini jika ada
        colors: {
            'brand-green': {
                '700': '#4A6F3A',
                '800': '#3A592E',
                '900': '#2E4724'
            },
            'brand-gold': '#d1a943',
            'brand-cyan': '#4AD1E5'
        }
    },
  },
  plugins: [],
}