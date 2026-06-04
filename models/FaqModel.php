<?php
/**
 * Model FAQ — pytania i odpowiedzi dla AEO oraz widoku.
 */
class FaqModel
{
	/** @return array<int,array{q:string,a:string}> */
	public function all(): array
	{
		$questions = [];
		foreach (SiteData::blocks('faq') as $block) {
			if (($block['type'] ?? '') !== 'faq') {
				continue;
			}
			foreach ((array)($block['items'] ?? []) as $item) {
				$questions[] = [
					'q' => (string)($item['title'] ?? ''),
					'a' => (string)($item['text'] ?? ''),
				];
			}
		}

		return $questions;
	}
}
