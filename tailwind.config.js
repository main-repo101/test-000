/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,htmx,js,jsx,ts,tsx,php}",
    "./controller/**/*.{html,htmx,js,jsx,ts,tsx,php}",
    "./view/**/*.{html,htmx,js,jsx,ts,tsx,php}",
    "./index.{html,htmx,js,jsx,ts,tsx,php}"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}

