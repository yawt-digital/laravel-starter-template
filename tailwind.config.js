const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./storage/framework/views/*.php", "./resources/**/*.blade.php", "./resources/**/*.{ts,js,vue}"],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Nunito", ...defaultTheme.fontFamily.sans],
      },
      animation: {
        wiggle: "wiggle 0.5s ease forwards",
        flow: "flow 15s ease infinite",
      },
      keyframes: {
        wiggle: {
          "0%, 40%": { transform: "rotate(-3deg)" },
          "20%, 80%": { transform: "rotate(3deg)" },
          "100%": { transform: "rotate(0deg)" },
        },
        flow: {
          "0%, 100%": { "background-position": "0% 50%" },
          "50%": { "background-position": "100% 50%" },
        },
      },
    },
  },

  plugins: [require("@tailwindcss/forms")],
};
