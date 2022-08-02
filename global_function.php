<?php

use App\Models\Page;

if ( ! function_exists('user')) {
	function user($attr = null, $default = null) {
		$user = Auth::user() ?? $default;
		if ($user == $default || $attr == null) {
			return $user;
		}
		return $user->{$attr} ?? $default;
	}
}