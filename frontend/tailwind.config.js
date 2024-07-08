/** @type {import('tailwindcss').Config} */
export default {
<<<<<<< HEAD
  content: [],
  theme: {
    extend: {},
  },
  plugins: [],
}

=======
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('daisyui'),
  ],
}
>>>>>>> system_panel
