<?php
/**
 * Renderowanie bloków danych strony.
 */
class BlockRenderer
{
	/** @param array<string,mixed> $block */
	public static function render(array $block): void
	{
		$type = (string)($block['type'] ?? '');
		if ($type === '' || !preg_match('/^[a-z0-9_]+$/', $type)) {
			return;
		}

		$template = VIEW_PATH . '/blocks/' . $type . '.phtml';
		if (!is_file($template)) {
			return;
		}

		require $template;
	}
}
