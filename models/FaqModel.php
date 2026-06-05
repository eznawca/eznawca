<?php
/**
 * Model FAQ — pytania i odpowiedzi dla AEO oraz widoku.
 */
class FaqModel
{
	/** @return array<int,array{q:string,a:string}> */
	public function all(): array
	{
		return array_values(SiteData::items('faq', 'questions'));
	}
}
