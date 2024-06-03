/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
  ],
  theme: {
    screens: {
      ms: "320px",
      xs: "480px",
      ss: "620px",
      sm: "768px",
      md: "1060px",
      lg: "1200px",
      xl: "1700px",
    },
    extend: {
      colors: {
        nav_color: "#1ca3e4",
        nav_brand_color: "#e6e6e6",
        nav_text_color: "white",
      },
    },
  },
  plugins: [],
}

