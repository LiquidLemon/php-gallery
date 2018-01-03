const path = require('path')

module.exports = {
    entry: './ts/index.tsx',
    module: {
        rules: [
            {
                test: /\.tsx?/,
                use: 'awesome-typescript-loader',
                exclude: /node_modules/
            },
            {
                enforce: 'pre',
                test: /\.js$/,
                loader: 'source-map-loader'
            }
        ]
    },
    resolve: {
        extensions: ['.ts', '.js', '.tsx', '.jsx']
    },
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'web/assets')
    }
}
