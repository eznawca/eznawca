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
}
