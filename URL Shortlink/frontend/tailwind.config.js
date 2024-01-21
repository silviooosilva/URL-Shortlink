/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js,vue}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {},
  plugins: [
    require('flowbite/plugin')
  ]
}

