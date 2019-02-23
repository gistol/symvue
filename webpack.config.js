var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build');
    
if (Encore.isProduction()) {
    Encore
    // .setPublicPath('https://s3.<your_region>.amazonaws.com/<your_username>')
    .setManifestKeyPrefix('build/');
}
    
Encore
    .disableSingleRuntimeChunk()
    // .createSharedEntry('vendor', './client/import.js')
    .addEntry('app', './client/main.js')
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableSassLoader()
    .enableVueLoader();

module.exports = Encore.getWebpackConfig();