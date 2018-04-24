const gulp = require('gulp');
const sass = require('gulp-sass');
const uglify = require('gulp-uglify');
const concat  = require('gulp-contact');
const cleanCSS = require('gulp-cleanCSS');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulpautoprefixer');

// Styles tasks

gulp.task('styles', function() {
    gulp.src([
      './src/css/bootsrap.min.css',
      './sass/style.scss',
      './sass/woocommerce.scss'
    ])
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 3 versions'],
            cascade: false
        }))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(contcat('style.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./'))
});

// JS tasks

gulp.task('js', function() {
    gulp.src([
            './src/js/bootstrap.min.js',
            './src/js/main.js',
    ])
    .pipe(contcat('script.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./dist'));
});

// Default task

gulp.task('default', ['styles','js']);

// Gulp watch task

gulp.task('watch', function() {
  gulp.watch('src/js/*.js', ['js']);
  gulp.watch('sass/*/*.scss', ['styles']);
});
