const NODE_ENV = process.env.NODE_ENV || 'development';
const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
  entry: ['./borehole/src/script/app.js', './borehole/src/sass/main.sass'],
  output: {
    // path: './link/js/audit',
    library: 'borehole',
    filename: './borehole/build/script/build.js',
  },

  watch: true,

  watchOptions: {
    aggregateTimeout: 100,
  },
  plugins: [],
  devtool: 'source-map',

  module: {
    loaders: [
      {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        loader: 'babel-loader',
        query: {
          presets: ['es2015'],
        },
      },
    ],
    rules: [
      /*
            your other rules for JavaScript transpiling go in here
            */
      { // regular css files
        test: /\.css$/,
        loader: ExtractTextPlugin.extract({
          loader: 'css-loader?importLoaders=1',
        }),
      },
      { // sass / scss loader for webpack
        test: /\.(sass|scss)$/,
        loader: ExtractTextPlugin.extract(['css-loader', 'sass-loader']),
      },
    ],
  },
  plugins: [
    new ExtractTextPlugin({ // define where to save the file
      filename: 'dist/[name].bundle.css',
      allChunks: true,
    }),
  ],
};

if (NODE_ENV == 'production') {
  module.exports.plugins.push(

  );
}
