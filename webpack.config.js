const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

const THEME_PATH = './themes/';
const ASSETS_PATH = './themes/cbtw/assets';
module.exports = {
  mode: 'development',
  entry: [
    ASSETS_PATH + '/sass/main.scss'
  ],
  output: {
    path: path.resolve(__dirname, ASSETS_PATH + '/build/'),
  },
  module: {
    rules: [
      {
        test: /\.s[ac]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          {
            loader: "postcss-loader",
            options: {
              postcssOptions: {
                plugins: [require('autoprefixer')({
                  overrideBrowserslist: ['> 0%'],
                })],
              },
            },
          },
          'sass-loader',
        ],
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
        filename: 'main.css',
    }),
    new BrowserSyncPlugin(
      {
        open : false,
        proxy: {
          target: "http://localhost:8000",
        },
        files: [
          {
            match: [
              ASSETS_PATH + '/build/main.css',
              ASSETS_PATH + '/js/main.js',
              THEME_PATH + '/**/*.php'
            ],
            fn: (event, file) => {
              if (event == 'change') {
                const bs = require("browser-sync").get("bs-webpack-plugin");
                bs.reload(file);
              }
            }
          }
        ],
      },
      {
        reload: false,
      }
    )
  ],
};