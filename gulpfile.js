var gulp = require('gulp');
var sass = require('gulp-sass');

// Compile SASS
gulp.task('sass', function() {
	return gulp.src('public/scss/styles.scss')
		   .pipe(sass())
		   .pipe(gulp.dest('public/css'));
});

// Watch changes
gulp.task('watch', function() {
	// SASS watch
	gulp.watch('public/scss/*.scss', ['sass']);
});