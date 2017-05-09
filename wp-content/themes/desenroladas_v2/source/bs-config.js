const { config } = require('./package.json');

module.exports = {
	'files': [`${config.dist}/**/*.php`, `${config.dist}/assets/**`],
	'port': 8000,
	'proxy': 'http://localhost:8888',
	'open': 'local',
	'browser': 'default',
	'notify': false,
	'watchOptions': {awaitWriteFinish: true}
};
