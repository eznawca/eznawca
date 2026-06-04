/**
 * Inteligentne ukrywanie górnego menu:
 * chowa pasek przy przewijaniu w dół, pokazuje przy przewijaniu w górę.
 */
(function () {
	var nav = document.getElementById('mainNavbar');
	if (!nav) return;

	var prev = window.pageYOffset;
	var status = 'show';

	nav.style.transition = 'transform .25s ease';

	window.addEventListener('scroll', function () {
		var current = window.pageYOffset;
		var scrolledDown = (prev < current && current > 80);

		// nie chowaj, gdy menu mobilne jest rozwinięte
		var expanded = nav.querySelector('.navbar-collapse.show');

		if (scrolledDown && status !== 'hide' && !expanded) {
			nav.style.transform = 'translateY(-100%)';
			status = 'hide';
		} else if (!scrolledDown && status !== 'show') {
			nav.style.transform = 'translateY(0)';
			status = 'show';
		}
		prev = current;
	}, { passive: true });
})();
