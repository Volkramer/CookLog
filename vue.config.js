const path = require("path");

module.exports = {
  pluginOptions: {
    "style-resources-loader": {
      preProcessor: "scss",
      patterns: [
        path.resolve(__dirname, "./src/assets/styles/sass/global.scss")
      ]
    }
  },

  css: {
    modules: true
  }
};
