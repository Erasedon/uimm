/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",

  ],
  theme: {

    colors: {

      'tahiti': {
        100: '#112c50',  /**bleu */
        200: '#e8e8e8',  /**gris */
        300: '#f6f6f6',  /**blanc casser */
        400: '#oooooo',  /**noir */
        500: '#ef6602',  /**orange */
        600: '#ffffff'   /**blanc*/

      },
      // ...
    },
    extend: {},
  },
  plugins: [],
}


