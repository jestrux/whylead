/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "selector",
    content: ["./resources/**/*.blade.php"],
    theme: {
        extend: {
            colors: {
                primary: "#F26B21",
                "primary-light": "#f4fff3",
                accent: "#19124B",
                "primary-dark": "#d55612",
                accent: "rgb(var(--accent-color) / <alpha-value>)",
                canvas: "rgb(var(--canvas-color) / <alpha-value>)",
                card: "rgb(var(--card-color) / <alpha-value>)",
                content: "rgb(var(--content-color) / <alpha-value>)",
                stroke: "rgb(var(--stroke-color) / <alpha-value>)",
            },
        },
    },
    plugins: [],
};
