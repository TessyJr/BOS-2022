const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.{html,js,blade.php,php}",
        "./public/**/*.{html,js,blade.php,php}",
    ],
    theme: {
        screens: {
            mobile: "320px",
            // => @media (min-width: 320px) { ... }

            tablet: "768px",
            // => @media (min-width: 768px) { ... }

            laptop: "1024px",
            // => @media (min-width: 1040px) { ... }

            desktop: "1280px",
            // => @media (min-width: 1280px) { ... }
        },
        extend: {
            keyframes: {
                floatBig: {
                    "0%, 100%": { transform: "translatey(0px)" },
                    "50%": { transform: "translatey(-20px)" },
                },
                floatSmall: {
                    "0%, 100%": { transform: "translatey(0px)" },
                    "50%": { transform: "translatey(-15px)" },
                },
                fade: {
                    "0%, 100%": { opacity: "0" },
                    "50%": { opacity: "1" },
                },
                fadeOut: {
                    "0%, 50%": { opacity: "1" },
                    "100%": { opacity: "0" },
                },
                scaleRotate: {
                    "0%, 100%": { transform: "scale(1) rotate(0)" },
                    "50%": { transform: "scale(1.2) rotate(20deg)" },
                },
                slideInTop: {
                    "0%": { transform: "translateY(-25%)", opacity: 0 },
                    "100%": { transform: "translateY(0)", opacity: 1 },
                },
                slideInRight: {
                    "0%": { transform: "translateX(10%)", opacity: 0 },
                    "100%": { transform: "translateX(0)", opacity: 1 },
                },
                slideInLeft: {
                    "0%": { transform: "translateX(-10%)", opacity: 0 },
                    "100%": { transform: "translateX(0)", opacity: 1 },
                },
                slideOutTop: {
                    "0%": { transform: "translateY(0)", opacity: 1 },
                    "100%": { transform: "translateY(-25%)", opacity: 0 },
                },
                slideOutLeft: {
                    "0%": { transform: "translateX(0)", opacity: 1 },
                    "100%": { transform: "translateX(-10%)", opacity: 0 },
                },
                slideOutRight: {
                    "0%": { transform: "translateX(0)", opacity: 1 },
                    "100%": { transform: "translateX(10%)", opacity: 0 },
                },
                fadeIn: {
                    "0%": { opacity: "0" },
                    "100%": { opacity: "1" },
                },
                fadeOut: {
                    "0%": { opacity: "1" },
                    "100%": { opacity: "0" },
                },
                leftToRight: {
                    "0%, 60%, 100%": {
                        transform: "translateX(0px)",
                        opacity: "1",
                    },
                    "75%": { transform: "translateX(100px)", opacity: 0 },
                    "85%": { transform: "translateX(-100px)", opacity: 0 },
                },
                rotate45: {
                    "0%": { transform: "rotate(0)" },
                    "100%": { transform: "rotate(45deg)" },
                },
            },
            animation: {
                "float-big-slow": "floatBig 4s ease-in-out infinite",
                "float-small-slow": "floatSmall 4s ease-in-out infinite",
                "scale-rotate": "scaleRotate 0.5s ease-in-out",
                "slide-in-top": "slideInTop 0.5s ease-in-out",
                "slide-in-right": "slideInRight 0.15s ease-in-out",
                "slide-in-left": "slideInLeft 0.15s ease-in-out",
                "slide-out-top": "slideOutTop 0.25s ease-in-out",
                "slide-out-left": "slideOutLeft 0.15s ease-in-out",
                "slide-out-right": "slideOutRight 0.15s ease-in-out",
                "fade-in": "fadeIn 0.25s ease-in-out",
                "fade-out": "fadeOut 0.25s ease-in-out",
                "left-to-right": "leftToRight 4s ease-in-out infinite",
            },
            fontFamily: {
                digital: "letsGoDigital, Georgia",
                montserrat: "Montserrat, sans-serif",
                poppins: "Poppins, sans-serif",
            },
        },
    },
    plugins: [],
};
