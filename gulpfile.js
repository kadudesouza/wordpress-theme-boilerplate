const { src, dest, watch, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postCSS = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const minifyCSS = require('gulp-csso')
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const babel = require('gulp-babel');
const browserSync = require('browser-sync').create();
const imagemin = require('gulp-imagemin');

function css () {
	return src(['./src/scss/**/*.scss'])
		.pipe(sass())
		.pipe(postCSS([ autoprefixer() ]))
		.pipe(minifyCSS())
		.pipe(concat('app.min.css'))
		.pipe(dest('dist/css'))
		.pipe(browserSync.stream())
}

function js () {
	return src([
		'./src/js/app.js'
	])
		.pipe(babel({
			presets: ['@babel/preset-env'],
		}))
		.pipe(concat('app.min.js'))
		.pipe(uglify())
		.pipe(dest('dist/js'))
		.pipe(browserSync.stream())
}

function img () {
	return src(['./src/images/**'])
		.pipe(imagemin())
		.pipe(dest('dist/images'))
}

function server () {
	browserSync.init({
		proxy: 'wpboilerplate.localhost'
	})

	watch([
		'./*.html',
		'./*.php',
	]).on('change', browserSync.reload);

	watch([
		'./src/scss/**/*.scss',
		'./src/js/**/*.js',
	], parallel(css, js));

	watch([
		'./src/images/**'
	], parallel(img))
}

exports.default = server;