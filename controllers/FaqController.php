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

		$meta = SiteData::meta('faq');
		$meta['jsonld'] = [$faqPage];

		$this->view('faq', [
			'faq' => $faq,
		], $meta);
	}
}
