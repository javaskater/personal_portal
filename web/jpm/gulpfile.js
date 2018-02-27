'use strict';

const process = require('process');
const path = require('path');
const fs = require('fs');
const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass');

const srcSass = 'scss';
const bootstrapSass = 'node_modules/bootstrap/scss';
const awesomeSass = 'node_modules/font-awesome/scss';
const distCss = 'dist/css';

const awesomeFonts = 'node_modules/font-awesome/fonts';
const octiconsFonts = 'node_modules/octicons/build/svg';
const distFonts = 'dist/fonts';

const srcJs = 'js';
const jqueryJs = 'node_modules/jquery/dist';
const bootstrapJs = 'node_modules/bootstrap/dist/js';
const distJs = 'dist/js';

/*
 * La compilation SASS vers CSS
 */
gulp.task('css', function () {
  return gulp.src(`${srcSass}/styles.scss`)
      .pipe(sourcemaps.init())
      .pipe(sass({
        errLogToConsole: true,
        includePaths: [`${bootstrapSass}/`, `${awesomeSass}/`],
        precision: 8
      }))
      .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest(distCss));
});


gulp.task('fonts', function () {
    return gulp.src([`${awesomeFonts}/**/*`, `${octiconsFonts}/**/*`])
  .pipe(gulp.dest(distFonts));
});

gulp.task('js', function () {
    return gulp.src([`${srcJs}/**/*`,`${jqueryJs}/**/*`,`${bootstrapJs}/**/*`])
    .pipe(gulp.dest(distJs));
});

gulp.task('dist', ['css','js','fonts']);

const sourcesToWatch = [
  `${srcSass}/styles.scss`
];

gulp.task('watch_sass', function(){
  gulp.watch(sourcesToWatch, ['dist']);
    }
);

gulp.task('default',['watch_sass']);