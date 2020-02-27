//Gets all the packages
const { src, dest, watch, series, parallel } = require("gulp");
const htmlmin = require("gulp-htmlmin");
const concat = require("gulp-concat");
const uglify = require("gulp-uglify-es").default;
const imagemin = require("gulp-imagemin");
const sass = require('gulp-sass'); 
sass.compiler = require('node-sass');

const browserSync = require('browser-sync').create()
const sourcemaps = require("gulp-sourcemaps");

//Path to files
const files = {
    htmlPath: "source/**/*.html",
    phpPath: "source/**/*.php",
    jsPath: "source/**/*.js",
    sassPath: "source/sass/*.scss",
    imagePath: "source/images/*"
}

// Task: Copy HTML-files
function copyHTML() {
    return src(files.htmlPath)
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(dest('pub'))
    .pipe(browserSync.stream())
    ;
}
// Task: Copy HTML-files
function copyPHP() {
    return src(files.phpPath)
    .pipe(dest('pub'))
    .pipe(browserSync.stream())
    ;
}

// Task: Concat js and minimize
function jsTask() {
    return src(files.jsPath)
    .pipe(uglify())
    .pipe(dest('pub'))
    .pipe(browserSync.stream())
    ;
}
// Task: Image minimize
function imageTask() {
    return src(files.imagePath)
    .pipe(imagemin())
    .pipe(dest('pub/images'))
    .pipe(browserSync.stream())
    ;
}
// Task: Convert Sass-files to CSS and minimize
function sassTask() {
    return src(files.sassPath)
    .pipe(sourcemaps.write("."))
    .pipe(sass({outputStyle: 'compressed'}).on("error", sass.logError))
    .pipe(sourcemaps.init())
    .pipe(dest("pub/css"))
    .pipe(browserSync.stream())
    ;
}

// Task: watcher
function watchTask() {
    //Starts browser sync
    browserSync.init({
        server: {
            baseDir: 'pub/'
        }
    });
    // Is watching if any files changes.
    watch([files.htmlPath, files.phpPath, files.jsPath, files.imagePath, files.sassPath], 
        parallel(copyHTML, copyPHP, jsTask, imageTask, sassTask)).on("change", browserSync.reload);
}

exports.default = series(
    parallel(copyHTML, copyPHP, jsTask, imageTask, sassTask),
    watchTask
);