
// console.log(`http://${process.env.VUE_APP_LOCAL_PORT||'127.0.0.1'}:8080`);

module.exports = {

	publicPath: process.env.NODE_ENV === 'production'
    ? '/marko'
	: '/',


	css: {
		extract: {
			filename: '[name].css',
			chunkFilename: '[id].css'
		}
	},
	configureWebpack: {
		output: {
			filename: '[name].js',
			chunkFilename: '[name].js'
		}
	}
}
