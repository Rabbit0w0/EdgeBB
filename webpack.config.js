
const path = require("path");
const TerserPlugin = require("terser-webpack-plugin");
module.exports = {
    entry: "./dashboard/style/sky.js",
    output: {
        path: path.resolve(__dirname, "./dashboard/_bundles"),
        filename: "bundle.[hash:8].js" 
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