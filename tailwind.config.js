/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./templates/**/*.html.twig',
  './node_modules/tw-elements/dist/js/**/*.js'], 
  theme: {
    extend: {
      height: {
        '128': '45rem',
      }
    },
    colors: {
    
      'white': '#ffffff',
      'tahiti': {
        100: '#112c50',
        200: '#e8e8e8',
        300: '#f6f6f6',
        400: '#oooooo',
        500: '#ef6602',
        600: '#000000'
        
      },
      // ...
    },
  },
  plugins: [require("tw-elements/dist/plugin")],
}
