/**
 * Portfolio — lightbox powiększeń miniatur osi czasu.
 * Wykorzystuje współdzielony modal Bootstrapa (#shotModal); klik w miniaturę
 * (.tl-shot) wczytuje do niego pełny obraz i podpis z atrybutów data-*.
 */
(() => {
	'use strict';

	const modalEl = document.getElementById('shotModal');
	if (!modalEl || !window.bootstrap) return;

	const modal = new bootstrap.Modal(modalEl);
	const img = modalEl.querySelector('[data-shot-img]');
	const caption = modalEl.querySelector('[data-shot-caption]');

	document.querySelectorAll('.tl-shot[data-shot-src]').forEach((btn) => {
		btn.addEventListener('click', () => {
			img.src = btn.dataset.shotSrc;
			img.alt = btn.dataset.shotAlt || '';
			if (caption) caption.textContent = btn.dataset.shotCaption || '';
			modal.show();
		});
	});

	// Zwolnij pamięć po zamknięciu (duże obrazy).
	modalEl.addEventListener('hidden.bs.modal', () => {
		img.removeAttribute('src');
	});
})();
