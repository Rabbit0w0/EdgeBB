const path = require("path");
const TerserPlugin = require("terser-webpack-plugin");
module.exports = {
    mode: "production",
    entry: {
        "./dashboard":"./dashboard/style/login_index.js"/*,
        "./usr/themes/default":"./usr/themes/default/skriptz/X.js"*/
    },
    output: {
        path: path.resolve(__dirname, "./dashboard/_bundles"),
        filename: "bundle.[chunkhash:8].js" 
    },
    optimization: {
        minimize: true,
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