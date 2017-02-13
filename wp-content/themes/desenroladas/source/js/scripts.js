function isRetina(){
	var mediaQuery = "(-webkit-min-device-pixel-ratio: 1.5),(min--moz-device-pixel-ratio: 1.5),(-o-min-device-pixel-ratio: 3/2),(min-resolution: 1.5dppx)";
	if (window.devicePixelRatio > 1)
		return true;
	if (window.matchMedia && window.matchMedia(mediaQuery).matches)
		return true;
	return false;
}
(function($){
	// Carousel
	$("#hero").tinycarousel({ bullets: true, buttons: false, interval: true, intervalTime: 6000 });
	// Retina
	if (isRetina()) $('img.2x').each(function(){
		var src = $(this).attr('src').split('.');
		src[src.length - 2] += '@2x';
		$(this).attr('src', src.join('.'));
	});
	// Fix what DN do wrong
	var $body = $('body'), interval = 0;
	interval = setInterval(function(){
		if (!$body.attr('style')) return false;
		$body.removeAttr('style');
		$('#BarraParceirosDN').css('position','relative');
		clearInterval(interval);
	}, 10);

}(jQuery));