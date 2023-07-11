/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        workSans: "Work Sans, sans-serif",
    },
    },
  },  
  plugins: [
    require("@tailwindcss/typography"),
    require("daisyui")
  ],
  daisyui: {
    themes: [
      {
        mytheme: {
          "primary": "#1937a3",
          "secondary": "#e3e0fa",
          "accent": "#1c1f4f",
          "base-100": "#F6F6F8",
        },
      },
    ],
  },
}

