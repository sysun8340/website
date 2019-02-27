const path = require('path')
const MiniCssExtractPlugin = require("mini-css-extract-plugin")
module.exports = {
  entry: './index.js',
  output: {
    filename: 'index.js',
    path: path.resolve(__dirname, 'www')
  }
  mode: 'development',
  plugins: [
    new MiniCssExtractPlugin({
      filename: "[name].css",
      chunkFilename: "[id].css"
    })
  ]
  module: {
    rules: [
      {
        test: /\.css$/, 
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              publicPath: './www'
            }
          },
          {loader: 'css-loader'}
      ]}
    ]
  }
}