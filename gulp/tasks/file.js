module.exports = function () {
	const path = 'public';

	$.gulp.task('file', function () {

		// return 	$.gulp.src(['sourse/libs/**']).pipe($.gulp.dest('public/libs')).on('end',$.browserSync.reload);
		return $.gulp.src('public/thanks.html')
			// .pipe($.gp.rename("public/thanks.php"))
			.pipe($.gp.rename(function (path) { path.extname = path.extname.replace('html', 'php') }))
			.pipe($.gulp.dest(path))
		//  .on('end',$.browserSync.reload);
	});
}