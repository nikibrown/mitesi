const gulp = require('gulp');
const { series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));

function style() {
	return gulp.src("./scss/style.scss").pipe(sass()).on("error", sass.logError).pipe(gulp.dest("./css"))
}

exports.default = function () {
	gulp.watch("./scss/**/*").on("change", series(style))
}
