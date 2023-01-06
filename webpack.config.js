const path = require('path')

module.exports = {
    mode: 'production',
    entry: './assets/index.js',
    output: {
        path: path.resolve(__dirname, 'assets'),
        filename: 'index.bundle.js'
    }
}