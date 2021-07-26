module.exports = {
  devServer: {
    host: "localhost",
  },
  chainWebpack: (config) => {
    config.module.rule("eslint").use("eslint-loader").options({
      fix: true,
    });
  },
};
