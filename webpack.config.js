const path = require("path");
const TerserPlugin = require("terser-webpack-plugin");
module.exports = {
    mode: "production",
    entry: {
        "./dashboard":"./dashboard/style/login_index.js"
    },
    output: {
        path: path.resolve(__dirname, "./dashboard/_bundles"),
        filename: "bundle.[fullhash:8].js" 
    },
    optimization: {
        minimize: false,
        minimizer: [
          new TerserPlugin({
            extractComments: {
                condition: /^\**!|@preserve|@license|@cc_on/i,
                filename: (fileData) => {
                    return `./LICENSES/${fileData.filename}.LICENSE.txt${fileData.query}`;
                },
                banner: (licenseFile) => {
                    return `License information can be found in ./LICENSES/${licenseFile}`;
                    },
                },
            }),
        ],
    }
}