var Encore = require('@symfony/webpack-encore');

const publicPath = Encore.isProduction() ? '/build' : '/build';

Encore
    .setOutputPath('public/build/')
    .setPublicPath(publicPath)
    .cleanupOutputBeforeBuild()
    .setManifestKeyPrefix('build')
    .autoProvidejQuery()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .addEntry('js/login', [
        './assets/js/login.js'
    ])
    .addStyleEntry('css/login', [
        './assets/css/login.css',
    ])
;

module.exports = Encore.getWebpackConfig();
