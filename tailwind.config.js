/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./templates/**/*.html.twig',
  './node_modules/tw-elements/dist/js/**/*.js'], 
  theme: {
    extend: {
      backgroundImage: {
        'test': "url('/build/images/nosformations.jpg')",
      },
      height: {
        '128': '45rem',
        '350px': '350px',        
        '349px': '349px',
        '354px': '354px',
        '500px': '500px',
      },
      minHeight: {
        '300px': '300px',
        '450px': '450px',
      },
      width: {
        '10%': '10%',
        '20%': '20%',
        '25%': '25%',
        '30%': '30%',
        '40%': '40%',
        '50%': '50%',
        '60%': '60%',
        '70%': '70%',
        '80%': '80%',
        '90%': '90%',
        '100%': '100%',
        '536px': '536px',
        '200px': '200px',
      }
    },
    colors: {
    
      'white': '#ffffff',
      'tahiti': {
        100: '#112c50', // bleu
        200: '#e8e8e8', // gris
        300: '#f6f6f6', //gris clair
        400: '#oooooo',
        500: '#ef6602',
        600: '#000000'
      },
      'noir' : 'black',
      '#EF6517' : 'orange',
      '#fcb48b' : '#fcb48b',      
      '#EBECF0' : '#EBECF0', 
      '#e8e8e8' : '#e8e8e8',
      '#112C50' : '#112C50' // bleu uimm
      // ...
    },
    borderWidth: {
      DEFAULT: '1px',
      '0': '0',
      '2': '2px',
      '3': '3px',
      '4': '4px',
      '6': '6px',
      '8': '8px',
    }
  },
  plugins: [require("tw-elements/dist/plugin")],
}
