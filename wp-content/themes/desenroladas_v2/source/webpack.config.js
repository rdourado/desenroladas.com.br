module.exports = function (env = {}) {
	const prod = !!env.production;

	return {
		devtool: prod ? '' : 'inline-source-map',
		module: {
      rules: [{
				test: /\.jsx?$/,
				use: [{
					loader: 'babel-loader',
					options: {
						presets: ['latest']
					}
				}]
			}]
		},
		plugins: []
	};
};
