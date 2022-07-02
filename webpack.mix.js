const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");

mix.sass("resources/css/style.scss", "./public/absensi.css").options({
    processCssUrls: false,
    postCss: [
        tailwindcss("./tailwind.config.js")
    ],
});