const NODE_ENV = process.env.NODE_ENV || 'development';


module.exports = {
    entry: './borehole/src/script/app.js',
    output: {
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
        rules: [{
            test: /\.scss$/,
            use: [{
                loader: "style-loader" // creates style nodes from JS strings
            }, {
                loader: "css-loader" // translates CSS into CommonJS
            }, {
                loader: "sass-loader" // compiles Sass to CSS
            }]
        }]
    },
};

if (NODE_ENV == 'production') {
    module.exports.plugins.push(
    );
}
