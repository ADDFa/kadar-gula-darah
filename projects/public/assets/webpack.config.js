const path = require('path')

module.exports = {
    mode: 'production',
    // entry: './js/partials/navbar.js',
    entry: './js/pages/src/messages.mjs',
    output: {
        path: path.resolve(__dirname, 'js/pages'),
        filename: 'messages.js'
    },
    watch: true
}