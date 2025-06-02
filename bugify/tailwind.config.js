/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        'background-main': '#0a0a0a',
        'background-surface': '#171717',
        'text-primary': '#fafafa',
        'spotify-green': '#1db954',
      },
      fontFamily: {
        sans: [
          'Instrument Sans',
          'ui-sans-serif',
          'system-ui',
          'sans-serif',
          'Apple Color Emoji',
          'Segoe UI Emoji',
          'Segoe UI Symbol',
          'Noto Color Emoji',
        ],
      },
    },
  },
  plugins: [],
}
