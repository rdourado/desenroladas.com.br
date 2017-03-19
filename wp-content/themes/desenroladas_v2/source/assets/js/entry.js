(() => {

	const Masonry = require('masonry-layout');
	const imagesLoaded = require('imagesloaded');
	const $ = (sel, doc = document) => doc.querySelector(sel);
	const $_ = (sel, doc = document) => doc.querySelectorAll(sel);

	const entries      = $('.entries');
	const menu         = $('#menu');
	const menuClose    = $('#close-menu');
	const menuToggle   = $('#toggle-menu');
	const news         = $('.news');
	const newsClose    = $('.news__close');
	const search       = $('#search');
	const searchInput  = $('#s');
	const searchToggle = $('#toggle-search');
	const usersNav     = $('.others__nav');
	const usersView    = $('.others__body');

	let nextPage = $('.next.page-numbers');
	let msnry, nextUri, userIndex = 0;

	function init() {
		if (usersNav) {
			trigger($('.others__bio', usersNav));
		}
		if (entries) {
			setMasonry(entries, '.entries__item');
		}
		if (nextPage) {
			setNav(nextPage);
		}
		setEvents();
	}

	function setEvents() {
		menuToggle.addEventListener('click', toggleMenu);
		menuClose.addEventListener('click', closeMenu);
		searchToggle.addEventListener('click', toggleSearch);
		news.addEventListener('click', showNews);
		newsClose.addEventListener('click', hideNews);
		if (usersNav) usersNav.addEventListener('click', showUser);

		document.addEventListener('click', (event) => {
			if (!menu.contains(event.target)) closeMenu();
			if (!news.contains(event.target)) hideNews();
			if (!search.contains(event.target)) closeSearch();
		});
	}

	function setMasonry(container, itemSelector) {
		const opts = {
			itemSelector: itemSelector,
			percentPosition: true
		};
		imagesLoaded(container, () => msnry = new Masonry(container, opts));
	}

	function setNav(el) {
		nextUri = el.getAttribute('href');
		const container = el.parentNode;
		container.innerHTML = `
			<a href="${nextUri}" class="nav-links__more">Mostrar mais</a>
			<i class="wait"></i>`;
		nextPage = $('a', container);
		nextPage.addEventListener('click', loadMore);
	}

	function loadMore(event) {
		if (event) {
			event.preventDefault();
		}
		nextPage.parentNode.classList.add('nav-links--wait');
		get(nextUri, (html) => {
			const div = document.createElement('div');
			div.innerHTML = html;

			const newEntries = $_('.entries__item', div);
			const newNext = $('.next.page-numbers', div);
			nextUri = newNext.getAttribute('href');
			nextPage.setAttribute('href', nextUri);
			nextPage.parentNode.classList.remove('nav-links--wait');

			[].forEach.call(newEntries, (el) => {
				entries.appendChild(el);
				msnry.appended(el);
				msnry.layout();
			});
		});
	}

	function toggleMenu(event) {
		event.preventDefault();
		menu.classList.toggle('nav-head--toggled');
	}

	function closeMenu(event) {
		if (event) event.preventDefault();
		menu.classList.remove('nav-head--toggled');
	}

	function toggleSearch(event) {
		event.preventDefault();
		search.classList.toggle('find--toggled');
		searchInput.focus();
	}

	function closeSearch(event) {
		if (event) event.preventDefault();
		search.classList.remove('find--toggled');
	}

	function showNews(event) {
		event.preventDefault();
		news.classList.remove('news--closed');
	}

	function hideNews(event) {
		if (event) {
			event.preventDefault();
			event.stopPropagation();
		}
		news.classList.add('news--closed');
	}

	function showUser(event) {
		const target = event.target || event.srcTarget;
		const wrapper = closest(target, '.others__bio');
		if (!wrapper) {
			return;
		}
		userIndex = [].indexOf.call(usersNav.children, wrapper);

		const current = $('.others__bio', usersView);
		const newItem = wrapper.parentNode.removeChild(wrapper);
		if (current) {
			const moving = current.parentNode.removeChild(current);
			insertAt(usersNav, moving, userIndex);
		}
		usersView.appendChild(newItem);
	}

	init();

})();

function trigger(el) {
	const event = new MouseEvent('click', {
		'view': window,
		'bubbles': true,
		'cancelable': true
	});
	el.dispatchEvent(event);
}

function closest(el, selector) {
	const match = el.matches || el.webkitMatchesSelector || el.mozMatchesSelector || el.msMatchesSelector;
	if (!match) {
		return el;
	}
	while (el) {
		if (match.call(el, selector)) {
			break;
		}
		el = el.parentElement;
	}
	return el;
}

function insertAt(parent, child, index = 0) {
	const children = parent.children;
	if (index >= children.length) {
		return parent.appendChild(child);
	} else {
		return parent.insertBefore(child, children[index]);
	}
}

function get(url, cb) {
	const request = new XMLHttpRequest();
	request.open('GET', url, true);
	request.onload = function() {
		if (request.status >= 200 && request.status < 400) {
			const regex = /<body.*?>([\s\S]*?)<\/body/;
      const match = regex.exec(request.responseText);
			cb(match[1]);
		}
	};
	request.send();
}
