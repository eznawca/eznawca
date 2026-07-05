/**
 * Kontakt — ujawnianie telefonu dopiero po akcji użytkownika.
 */
(() => {
	'use strict';

	document.querySelectorAll('[data-phone-code][data-phone-key]').forEach((button) => {
		button.addEventListener('click', () => {
			const key = Number(button.dataset.phoneKey);
			const raw = (button.dataset.phoneCode || '')
				.split(',')
				.map((part) => String.fromCharCode(Number(part) ^ key))
				.join('');

			if (!raw) return;

			const link = document.createElement('a');
			link.className = 'contact-value-link';
			link.href = 'tel:' + raw;
			link.textContent = raw.replace(/^(\+\d{2})(\d{3})(\d{3})(\d{3})$/, '$1 $2 $3 $4');
			button.replaceWith(link);
		});
	});
})();
