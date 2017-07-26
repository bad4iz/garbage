'use strict';

const NODE_ENV = process.env.NODE_ENV || 'development';
const webpack = require('webpack');

module.exports = {
    entry: "./link/js/audit/app.js",
    output: {
        // path: './link/js/audit',
        library: "auditFJV",
        filename: "./link/js/audit/build.js"
    },

    watch: true,

    watchOptions: {
        aggregateTimeout: 100
    },
    plugins: [ ],
    devtool: 'source-map',

    module: {
        loaders: [
            {
                test: /\.js$/,
                exclude: /(node_modules|bower_components)/,
                loader: 'babel-loader',
                query: {
                    presets: ['es2015']
                },
            }
        ]
    },
};

if (NODE_ENV == 'production') {
    module.exports.plugins.push(

    );
}
