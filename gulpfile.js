const { src, dest, watch } = require('gulp');
const sass = require('gulp-sass');
const uglify = require('gulp-uglify');
const browserSync = require('browser-sync').create();
const notify = require("gulp-notify");
const autoprefixer = require('gulp-autoprefixer');

function sass_cimpiler() {
  return src('asset/scss/*.scss')
    .pipe(sass(
        {
            outputStyle : 'uglify'
        }
    ).on('error', sass.logError))
    .pipe(browserSync.stream())
    .pipe(autoprefixer(
        {
            cascade: true
        }
    ))
    .pipe(notify("Found file: <%= file.relative %>!"))
    .pipe(dest('asset/src/min-css'))
    
}


exports.watch = function() {
watch('asset/scss/*.scss', sass_cimpiler );
watch('asset/scss/**/_*.scss', sass_cimpiler);

};
