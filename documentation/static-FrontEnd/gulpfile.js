const gulp = require('gulp');

const browserSync = require('browser-sync').create();
const reload = browserSync.reload;
const less = require('gulp-less');
// const $ = require('gulp-load-plugins')();
const autoprefixer = require('gulp-autoprefixer');

gulp.task('hello', function () {
  console.log('hello');
  return gulp.src('source-files')
    .pipe(aGulpPlugin())
    .pipe(gulp.dest('destination'))
})

// Start browserSync server
gulp.task('browser', function() {
  browserSync.init({
    server: "app"
  });
  gulp.watch("app/less/style.less", gulp.series('styleLess')).on('change', reload);
  gulp.watch("app/*.html").on('change', reload);
});

gulp.task('styleLess', function() {
  return gulp.src('app/less/style.less') // Gets all files ending with .scss in app/scss and children dirs
    .pipe(less()) // Passes it through a gulp-sass, log errors to console
    // .pipe(autoprefixer({
    //   cascade: false
    // }))
    .pipe(gulp.dest('app/css/').on("change", reload)) // Outputs it in the css folder
    .pipe(browserSync.stream())
    .pipe(autoprefixer({
      overrideBrowserslist: ['since 2013'],
      cascade: false
    }));
    gulp.watch("app/css/", gulp.series('prefix'));
})
// gulp.task('prefix', () =>
//     gulp.src('app/css/styles.css')
//         .pipe(autoprefixer({
//             browsers: ['since 2013'],
//             cascade: true
//     }))
//     .pipe(gulp.dest('style'))
// );

gulp.task('default', gulp.series('browser'));
