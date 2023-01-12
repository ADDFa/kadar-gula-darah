const path = require('path')

module.exports = {
    mode: 'production',
    entry: './js/partials/navbar.js',
    output: {
        path: path.resolve(__dirname, 'js'),
        filename: 'template.js'
    },
    watch: true
}