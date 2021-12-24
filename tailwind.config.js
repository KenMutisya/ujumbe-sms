module.exports = {
  content: [
      "./resources/**/*.{html,js}",
      "./resources/**/*.blade.php",
      "./resources/**/*.vue"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
