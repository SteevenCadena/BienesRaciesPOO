const { src, dest, watch, parallel } = require('gulp');

//css
const sass = require('gulp-sass')(require('sass'));//ubica el archivo de sass para compilar
const plumber = require('gulp-plumber');

//imagenes
const cache = require('gulp-cache');
const imagemin = require('gulp-imagemin');
const webp = require('gulp-webp');

const css = ( done ) => {
    src('src/scss/**/*.scss') //identificar el archivo .SCSS a compilar
        .pipe( plumber() )
        .pipe( sass() ) //compilar
        .pipe( dest('build/css') ); //almacenar
    done();
}

const versionWebp = ( done ) => {
    const opciones = {
        quality: 50,
    };
    src('src/img/**/*.{png,jpg}')
    .pipe( webp(opciones) )
    .pipe( dest('build/img') );
    done();
}

const imagenes = ( done ) => {
    const opciones = {
        optimizationLevel: 3,
    };
    src('src/img/**/*.{png,jpg}')
        .pipe( cache( imagemin( opciones ) ) )
        .pipe( dest('build/img') );
    done();
}

const javascript = ( done ) => {
    src('src/js/**/*.js')
        .pipe(dest('build/js'));

    done();
}


const dev = ( done ) => {
    watch('src/scss/**/*.scss', css);//escucha cambios
    watch('src/js/**/*.js', javascript);//escucha cambios
    done();
}

exports.css = css;
exports.js = javascript;
exports.imagenes = imagenes;
exports.versionWebp = versionWebp;
exports.dev = parallel(javascript, dev, imagenes, versionWebp);

