/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",

  ],
  theme: {

    colors: {

      'tahiti': {
        /**bleu */
        100: '#112c50',
        /**gris */
        200: '#e8e8e8',
        /**blanc casser */  
        300: '#f6f6f6',
        /**noir */  
        400: '#oooooo',
        /**orange */ 
        500: '#ef6602',
        /**blanc*/  
        600: '#ffffff'   

      },
      // ...
    },
    extend: {},
  },
  plugins: [],
}


