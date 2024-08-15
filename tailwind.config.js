/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors : {
        blue: {
          100: '#144EE3'
        },
        pink: {
          100: '#EB568E'
        },
        borderdark: {
          100: '#353C4A'
        },
      }
    },
  },
  plugins: [],
}

