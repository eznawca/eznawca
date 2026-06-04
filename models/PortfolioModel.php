<?php
/**
 * Model portfolio — projekty autora.
 */
class PortfolioModel
{
	/** @return array<string,array<string,mixed>> slug => projekt */
	private function projects(): array
	{
		return SiteData::items('portfolio', 'projects');
	}

	/** @return array<int,array<string,mixed>> lista projektów */
	public function all(): array
	{
		return array_values($this->projects());
	}

	/** @return array<string,mixed>|null pojedynczy projekt po slug */
	public function find(string $slug): ?array
	{
		return $this->projects()[$slug] ?? null;
	}
}
