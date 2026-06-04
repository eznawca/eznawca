<?php
/**
 * FAQ — najczęstsze pytania. Generuje FAQPage JSON-LD (AEO).
 */
class FaqController extends Controller
{
	public function index(): void
	{
		$faq = (new FaqModel())->all();

		// FAQPage — dane strukturalne dla wyszukiwarek i modeli językowych.
		$mainEntity = [];
		foreach ($faq as $item) {
			$mainEntity[] = [
				'@type'          => 'Question',
				'name'           => $item['q'],
				'acceptedAnswer' => [
					'@type' => 'Answer',
					'text'  => $item['a'],
				],
			];
		}
		$faqPage = [
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => $mainEntity,
		];

		$this->view('faq', [
			'faq' => $faq,
		], [
			'title'       => 'FAQ — Andrzej Mazur EZNAWCA',
			'description' => 'Najczęściej zadawane pytania o Andrzeju Mazurze (EZNAWCA), technologiach i projektach.',
			'canonical'   => '/faq',
			'breadcrumb'  => [
				['label' => 'Główna', 'url' => '/'],
				['label' => 'FAQ', 'url' => '/faq'],
			],
			'jsonld'      => [$faqPage],
		]);
	}
}
