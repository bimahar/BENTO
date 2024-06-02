/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources//*.blade.php",
    "./resources//*.js",
    "./resources//*.vue",
    "./node_modules/flowbite//*.js"
  ],
  theme: {

    extend: {
        colors: {

      'midnight': '#222831',
      'lightGrey' : '#31363F',
      'shotlanceTosca' : '#76ABAE',
      'shotlanceWhite' : '#EEEEEE',
      'hoverTosca' : '#90D6DA',
      'linkOn' : '#48F5FF',
    },},
  },
  plugins: [require('flowbite/plugin')],
}