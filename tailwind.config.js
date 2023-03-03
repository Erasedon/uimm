/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",

  ],
  theme: {

    colors: {

      'tahiti': {
        100: '#112c50',
        200: '#e8e8e8',
        300: '#f6f6f6',
        400: '#oooooo',
        500: '#ef6602',
        600: '#ffffff'

      },
      // ...
    },
    extend: {},
  },
  plugins: [],
}


