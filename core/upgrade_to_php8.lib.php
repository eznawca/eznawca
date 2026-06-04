<?php


if (version_compare(PHP_VERSION, '7.0', '<')) {
	/**
	 * < PHP 7.0
	 */

	if (!function_exists('intdiv')) {
		function intdiv($a, $b) {
			if ($b == 0) throw new Exception('Division by zero');
			if ($b == -1 && $a == PHP_INT_MIN) throw new Exception('ArithmeticError');
			return (int)(($a - $a % $b) / $b);
		}
	}

	if (!function_exists('random_bytes')) {
		function random_bytes($length = 32) {
			if (!is_int($length) || $length < 1) throw new InvalidArgumentException('Length must be a positive integer');

			if (function_exists('openssl_random_pseudo_bytes')) {
				$bytes = openssl_random_pseudo_bytes($length, $crypto_strong);
				if ($crypto_strong === false) {
					throw new Exception('Unable to generate a cryptographically strong random string');
				}
				return $bytes;
			}

			$bytes = '';
			for ($i = 0; $i < $length; $i++) {
				$bytes .= chr(mt_rand(0, 255));
			}

			return $bytes;
		}
	}

	if (!function_exists('random_int')) {
		function random_int($min, $max) {
			if (!is_int($min) || !is_int($max)) throw new InvalidArgumentException('Both arguments must be integers');
			if ($min > $max) throw new InvalidArgumentException('Minimum value must be less than or equal to the maximum value');

			$range = $max - $min;
			if ($range == 0) return $min;

			$log = log($range, 2);
			$bytes = (int)($log / 8) + 1;
			$bits = (int)$log + 1;
			$filter = (1 << $bits) - 1;

			do {
				$rnd = hexdec(bin2hex(random_bytes($bytes)));
				$rnd = $rnd & $filter;
			} while ($rnd > $range);

			return $min + $rnd;
		}
	}
}


if (version_compare(PHP_VERSION, '7.1', '<')) {
	/**
	 * < PHP 7.1
	 */
	if (!function_exists('is_iterable')) {
		function is_iterable($var) {
			return is_array($var) || $var instanceof Traversable;
		}
	}
}

if (version_compare(PHP_VERSION, '7.2', '<')) {
	/**
	 * < PHP 7.2
	 */
	if (!defined('PHP_FLOAT_EPSILON')) define('PHP_FLOAT_EPSILON', 2.2204460492503e-16); // Definiowanie PHP_FLOAT_EPSILON dla starszych wersji PHP (przed 7.2)

	if (!function_exists('mb_chr')) {
		function mb_chr($code, $encoding = 'UTF-8') {
			return mb_convert_encoding('&#' . intval($code) . ';', $encoding, 'HTML-ENTITIES');
		}
	}

	if (!function_exists('mb_ord')) {
		function mb_ord($char, $encoding = 'UTF-8') {
			if ($encoding != 'UTF-8') {
				$char = mb_convert_encoding($char, 'UTF-8', $encoding);
			}
			$result = unpack('N', mb_convert_encoding($char, 'UCS-4BE', 'UTF-8'));
			return is_array($result) ? $result[1] : null;
		}
	}

	if (!function_exists('mb_scrub')) {
		function mb_scrub($string, $encoding = 'UTF-8') {
			return mb_convert_encoding($string, $encoding, $encoding);
		}
	}
}

if (version_compare(PHP_VERSION, '7.3.0', '<')) {
	/**
	 * < PHP 7.3.0
	 */
	if (!function_exists('array_key_first')) {
		function array_key_first($array)
		{
			if ($array === []) {
				return null;
			}
			foreach ($array as $key => $unused) return $key;
		}
	}

	if (!function_exists('array_key_last')) {
		function array_key_last($array)
		{
			if ($array === []) {
				return null;
			}
			return array_key_first(array_slice($array, -1, null, true));
		}
	}

	if (!function_exists('hrtime')) {
		function hrtime($getAsNumber = false)
		{
			$mt = microtime(true);
			if ($getAsNumber) return $mt * 1000000000;
			$sec = floor($mt);
			$nano = ($mt - $sec) * 1000000000;
			return [$sec, $nano];
		}
	}

	if (!function_exists('is_countable')) {
		function is_countable($var)
		{
			return is_array($var) || $var instanceof Countable;
		}
	}
}


if (version_compare(PHP_VERSION, '7.4', '<')) {
		/**
		 * < PHP 7.4
		 */
	if (!function_exists('get_mangled_object_vars')) {
		function get_mangled_object_vars($obj) {
			return get_object_vars($obj);
		}
	}

	if (!function_exists('password_algos')) {
		function password_algos() {
			return [
				PASSWORD_BCRYPT,
				// Możesz dodać więcej znanych algorytmów, jeśli są dostępne w twoim środowisku.
			];
		}
	}

	if (!function_exists('mb_str_split')) {
		function mb_str_split($string, $length = 1, $encoding = 'UTF-8') {
			if ($length < 1) return false;

			$result = [];
			$strLen = mb_strlen($string, $encoding);

			for ($i = 0; $i < $strLen; $i += $length) {
				$result[] = mb_substr($string, $i, $length, $encoding);
			}

			return $result;
		}
	}

}

if (version_compare(PHP_VERSION, '8.0', '<')) {
	/**
	 * < PHP 8
	 */
	if (!function_exists('str_starts_with')) {
		// case-sensitive
		function str_starts_with($haystack, $needle) {
			$len_n = strlen($needle);
			if ($len_n == 0) return true;
			$len_h = strlen($haystack);
			if ($len_n > $len_h) return false;
			return strncmp($haystack, $needle, $len_n) == 0;
		}
	}

	if (!function_exists('str_ends_with')) {
		// case-sensitive
		function str_ends_with($haystack, $needle) {
			$len_n = strlen($needle);
			if ($len_n == 0) return true;
			$len_h = strlen($haystack);
			if ($len_n > $len_h) return false;
			return $needle === substr($haystack, - $len_n);
		}
	}

	if (!function_exists('str_contains')) {
		// case-sensitive
		function str_contains($haystack, $needle) {
			$len_n = strlen($needle);
			if ($len_n == 0) return false;
			$len_h = strlen($haystack);
			if ($len_n > $len_h) return false;
			return strpos($haystack, $needle) !== false;
		}
	}
	if (!function_exists('fdiv')) {
		function fdiv($dividend, $divisor) {
			if ($divisor == 0) return INF;
			return $dividend / $divisor;
		}
	}

	if (!function_exists('get_debug_type')) {
		/**
		 * Funkcja get_debug_type() zwraca typ zmiennej w bardziej czytelnej formie niż gettype().
		 */
		function get_debug_type($value) {
			switch (true) {
				case is_null($value):
					return 'null';
				case is_bool($value):
					return 'bool';
				case is_int($value):
					return 'int';
				case is_float($value):
					return 'float';
				case is_string($value):
					return 'string';
				case is_array($value):
					return 'array';
				case is_object($value):
					return get_class($value);
				case is_resource($value):
					return 'resource (of type ' . get_resource_type($value) . ')';
				default:
					return 'unknown type';
			}
		}
	}
}

if (version_compare(PHP_VERSION, '8.1', '<')) {
	/**
	 * < PHP 8.1
	 */
	if (!function_exists('array_is_list')) {
		function array_is_list(array $array) {
			if ($array === []) return true;

			$keys = array_keys($array);
			foreach ($keys as $key => $value) {
				if ($key !== $value) {
					return false;
				}
			}

			return true;
		}
	}
}

if (version_compare(PHP_VERSION, '8.3', '<')) {
	/**
	 * < PHP 8.3
	 */
	if (!function_exists('json_validate')) {
		function json_validate($json) {
			if (!is_string($json)) return false;
			json_decode($json);
			return (json_last_error() === JSON_ERROR_NONE);
		}
	}

	if (!function_exists('mb_str_pad')) {
		function mb_str_pad($input, $pad_length, $pad_string = ' ', $pad_type = STR_PAD_RIGHT, $encoding = 'UTF-8') {
			$input_length = mb_strlen($input, $encoding);
			$pad_string_length = mb_strlen($pad_string, $encoding);

			if ($pad_length <= $input_length || !$pad_string_length) {
				return $input;
			}

			$pad_length -= $input_length;
			$pad_count = ceil($pad_length / $pad_string_length);

			$pad_string = str_repeat($pad_string, $pad_count);
			$pad_string = mb_substr($pad_string, 0, $pad_length, $encoding);

			switch ($pad_type) {
				case STR_PAD_RIGHT:
					return $input . $pad_string;
				case STR_PAD_LEFT:
					return $pad_string . $input;
				case STR_PAD_BOTH:
					$left_length = floor($pad_length / 2);
					$right_length = $pad_length - $left_length;
					$left_pad = mb_substr($pad_string, 0, $left_length, $encoding);
					$right_pad = mb_substr($pad_string, -$right_length, null, $encoding);
					return $left_pad . $input . $right_pad;
				default:
					throw new InvalidArgumentException('Invalid pad type');
			}
		}
	}

	if (!function_exists('str_increment')) {
		function str_increment($string) {
			if (!is_string($string) || empty($string)) throw new InvalidArgumentException("The string must be a non-empty alphanumeric string");
			$length = strlen($string);
			$carry = true;
			for ($i = $length - 1; $i >= 0 && $carry; $i--) {
				$char = $string[$i];
				$carry = false;
				if ($char == '9') {
					$string[$i] = '0';
					$carry = true;
				} elseif ($char == 'Z') {
					$string[$i] = 'A';
					$carry = true;
				} elseif ($char == 'z') {
					$string[$i] = 'a';
					$carry = true;
				} else {
					$string[$i] = chr(ord($char) + 1);
				}
			}
			if ($carry) {
				$string = ($string[$i] == '0' ? '1' : 'A') . $string;
			}
			return $string;
		}

	}

	if (!function_exists('str_decrement')) {
		function str_decrement($string) {
			if (!is_string($string) || empty($string)) throw new InvalidArgumentException("The string must be a non-empty alphanumeric string");

			$length = strlen($string);
			$carry = true;
			for ($i = $length - 1; $i >= 0 && $carry; $i--) {
				$char = $string[$i];
				$carry = false;
				if ($char == '0') {
					$string[$i] = '9';
					$carry = true;
				} elseif ($char == 'A') {
					$string[$i] = 'Z';
					if ($i == 0) { // Usuwa 'A', jeśli jest na początku ciągu
						$string = substr($string, 1);
					}
					$carry = ($i > 0);
				} elseif ($char == 'a') {
					$string[$i] = 'z';
					$carry = true;
				} else {
					$string[$i] = chr(ord($char) - 1);
				}
			}
			// Usuwa początkowy znak '0' lub 'Z', jeśli cały ciąg został zdekrementowany
			if ($carry && ($string[0] == '0' || $string[0] == 'Z')) {
				$string = substr($string, 1);
			}
			return $string;
		}
	}
}

/**
 * SPRAWDŹ:
 * mb_chr, mb_ord, mb_scrub (PHP 7.2)
 * str_increment(), str_decrement() (PHP 8.3)
 * SPRAWDŹ CZY MOŻNA:
 * preg_replace_callback_array (dostępna od PHP 7.0)
 * error_clear_last (dostępna od PHP 7.0)
 * pcntl_async_signals (dostępna od PHP 7.1)
 * stream_isatty (dostępna od PHP 7.2)
 * sapi_windows_vt100_support (dostępna od PHP 7.2)
 */