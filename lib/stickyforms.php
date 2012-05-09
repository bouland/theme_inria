<?php

if (!function_exists('elgg_make_sticky_form')) {

	/**
	 * Load all the REQUEST variables into the sticky form cache
	 *
	 * Call this from an action when you want all your submitted variables
	 * available if the submission fails validation and is sent back to the form
	 */
	function elgg_make_sticky_form() {

		elgg_clear_sticky_form();

		$_SESSION['sticky'] = array();

		foreach ($_REQUEST as $key => $var) {
			// will go through XSS filtering on the get function
			$_SESSION['sticky'][$key] = get_input($key);
		}
	}

	/**
	 * Clear the sticky form cache
	 *
	 * Call this if validation is successful in the action handler or
	 * when they sticky values have been used to repopulate the form
	 * after a validation error.
	 */
	function elgg_clear_sticky_form() {
		unset($_SESSION['sticky']);
	}

	/**
	 * Has this form been made sticky
	 *
	 * @return boolean
	 */
	function elgg_is_sticky_form() {
		return isset($_SESSION['sticky']);
	}

	/**
	 * Get a specific stick variable
	 *
	 * @param string $variable The name of the variable
	 * @param mixed $default Default value if the variable does not exist in sticky cache
	 * @param boolean $filter_result Filter for bad input if true
	 * @return mixed
	 */
	function elgg_get_sticky_value($variable, $default = "", $filter_result = true) {
		if (isset($_SESSION['sticky'][$variable])) {
			$var = $_SESSION['sticky'][$variable];
			if ($filter_result) {
				// XSS filter result
				$var = filter_tags($var);
			}
			return $var;
		}
		return $default;
	}

	/**
	 * Clear a specific sticky variable
	 *
	 * @param string $variable The name of the variable to clear
	 */
	function elgg_clear_sticky_value($variable) {
		unset($_SESSION['sticky'][$variable]);
	}

}