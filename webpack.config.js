/*global __dirname*/
var config = require('./package.json'),
  webpack = require('webpack'),
  path = require('path'),
  extract = require('mini-css-extract-plugin'),
  isDev = process.env.NODE_ENV != 'production',
  TerserPlugin = require('terser-webpack-plugin'),
  devPort = process.env.PORT || 3010;

// Set up the entry points
var entry = [];
if (isDev) {
  entry.push('webpack-dev-server/client?http://0.0.0.0:' + devPort); // WebpackDevServer host and port)
  entry.push('webpack/hot/only-dev-server'); // WebpackDevServer host and port)
}

entry.push('./wp-content/themes/' + config.name + '/src/js/main.js');

// Setup output
var output = {
  path: path.join(__dirname, 'wp-content', 'themes', config.name, 'public'),
  filename: 'js/app.min.js',
  publicPath: '/wp-content/themes/' + config.name + '/public/'
};

if (isDev) {
  output.pathinfo = true;
  output.publicPath = 'http://localhost:' + devPort + '/';
}

// Setup plugins
var plugins = [];

if (isDev) plugins.push(new webpack.HotModuleReplacementPlugin());
else {
  plugins.push(new webpack.optimize.OccurrenceOrderPlugin());
}

plugins.push(new webpack.NoEmitOnErrorsPlugin());
plugins.push(
  new extract({
    filename: 'css/app.css'
  })
);

// Main webpack config
module.exports = {
  entry: entry,
  output: output,
  devServer: {
    historyApiFallback: true,
    contentBase: path.join(__dirname, 'public'),
    port: devPort
  },
  resolve: {
    extensions: ['.js']
  },
  module: {
    rules: [
      {
        test: /packery/,
        loader: 'imports-loader?define=>false&this=>window'
      },
      {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        include: path.join(__dirname, 'wp-content'),
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['es2015', 'stage-2', 'react']
          }
        }
      },
      {
        test: /\.(sa|sc)ss$/,
        use: [
          {
            loader: extract.loader,
            options: {
              hmr: process.env.NODE_ENV === 'development'
            }
          },

          // 'style-loader',
          'css-loader',
          'resolve-url-loader',
          'postcss-loader',
          'sass-loader'
        ]
      },
      {
        test: /\.css$/,
        use: [
          {
            loader: extract.loader,
            options: {
              hmr: process.env.NODE_ENV === 'development'
            }
          },
          'css-loader',
          'style-loader',
          'postcss-loader'
        ]
      },
      {
        test: /\.(otf|eot|svg|ttf|woff|woff2)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
        loader: 'url-loader?limit=100000'
      },
      {
        test: /\.(jpe?g|png|gif)/,
        loader: 'file-loader',
        options: {
          name: 'img/[name].[ext]',
        }
      }
    ]
  },
  optimization: {
    minimize: true,
    minimizer: [new TerserPlugin()],
  },
  plugins: plugins
};
