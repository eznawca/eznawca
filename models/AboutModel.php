<?php
/**
 * Model strony "O mnie".
 */
class AboutModel
{
	/** @return array<string,mixed> */
	public function page(): array
	{
		return SiteData::page('about') ?? [];
	}

	/** @return array<int,array<string,mixed>> */
	public function blocks(): array
	{
		return SiteData::blocks('about');
	}
}
