const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./storage/framework/views/*.php", "./resources/**/*.blade.php", "./resources/**/*.{ts,js,vue}"],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Poppins", ...defaultTheme.fontFamily.sans],
      },
      animation: {
        flow: "flow 15s ease infinite",
      },
      keyframes: {
        flow: {
          "0%, 100%": { "background-position": "0% 50%" },
          "50%": { "background-position": "100% 50%" },
        },
      },
    },
  },

  plugins: [require("@tailwindcss/forms")],
};
