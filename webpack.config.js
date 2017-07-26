const NODE_ENV = process.env.NODE_ENV || 'development';


module.exports = {
  entry: './borehole/src/script/app.js',
  output: {
    // path: './link/js/audit',
    library: 'Borehole',
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
  },
};

if (NODE_ENV == 'production') {
  module.exports.plugins.push(
  );
}
