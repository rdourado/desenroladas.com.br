const fs = require('fs');
const { config } = require('./package.json');
const webfontsGenerator = require('webfonts-generator');
const folder = `${config.src}/assets/icons/`;

fs.readdir(folder, (err, files) => {
	const paths = files.map(file => folder + file);

	webfontsGenerator({
		files: paths,
		dest: `${config.dist}/assets/fonts`,
		cssDest: `${config.src}/assets/css/_icons.scss`,
		cssTemplate: './webfonts.hbs',
		cssFontsUrl: '../fonts',
		types: ['eot', 'woff2', 'woff', 'ttf', 'svg'],
		normalize: true,
		fontHeight: 1001,
		templateOptions: {
			classPrefix: 'icon',
			baseSelector: '.icon'
		}
	}, function(error) {
		error ? console.log('Fail!', error) : console.log('Done!');
	});
});
