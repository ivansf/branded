<?php

/**
 * Implements hook_page_alter().
 */
function branded_page_alter(&$page) {
	$original_css = drupal_add_css();
	$css_options = array(
		'group' => CSS_THEME,
		'media' => 'screen',
		'every_page' => TRUE,
	);

//	drupal_set_message(print_r(theme_get_setting('branded-logo'), true));
//	drupal_set_message("testing out a very long error message.
//	<ul>
//		<li>asdasd</li>
//		<li>asd</li>
//		<li>asdasdasdas</li>
//	</ul>
//	<a href=\"#\">Testing out the link!</a>
//
//	testing out a very long error message. testing out a very long error message. testing out a very long error message");
//	drupal_set_message("testing out a very long error message. testing out a very long error message. testing out a very long error message. testing out a very long error message
//	<ul>
//		<li>asdasd</li>
//		<li>asd</li>
//		<li>asdasdasdas</li>
//	</ul>
//	<a href=\"#\">Testing out the link!</a>
//	", 'warning');
//	drupal_set_message(theme_get_setting('branded-left'));
//
//
//	drupal_set_message("testing out a very long error message.
//	<ul>
//		<li>asdasd</li>
//		<li>asd</li>
//		<li>asdasdasdas</li>
//	</ul>
//	<a href=\"#\">Testing out the link!</a>
//
//	testing out a very long error message. testing out a very long error message. testing out a very long error message", "error");

	if (module_exists('toolbar') && user_access('access toolbar')) {
		drupal_add_css(drupal_get_path('theme', 'branded') . '/css/override.toolbar.css', $css_options);
	}
//
//	// add admin toolbar css
//	if (module_exists('admin') && user_access('use admin toolbar')) {
//		drupal_add_css(drupal_get_path('theme', 'branded') . '/css/override.toolbar.css', $css_options);
//	}

}


/**
 * Preprocessor for theme('page').
 */
function branded_preprocess_page(&$vars) {
	// Toolbar is enabled
	$vars['toolbar'] = module_exists('toolbar');

	// local tasks
	$vars['primary_local_tasks'] = $vars['secondary_local_tasks'] = FALSE;
	if (!empty($vars['tabs']['#primary'])) {
		$vars['primary_local_tasks'] = $vars['tabs'];
		unset($vars['primary_local_tasks']['#secondary']);
	}
	if (!empty($vars['tabs']['#secondary'])) {
		$vars['secondary_local_tasks'] = array(
			'#theme' => 'menu_local_tasks',
			'#secondary' => $vars['tabs']['#secondary'],
		);
	}

	// Set a page icon class.
	$vars['page_icon_class'] = ($item = menu_get_item()) ? implode(' ' , $item['href']) : '';

	// Overlay is enabled.
	$vars['overlay'] = (module_exists('overlay') && overlay_get_mode() === 'child');

	if ($vars['overlay']) {
		$vars['theme_hook_suggestions'][] = 'page__overlay';
		$vars['primary_local_tasks'] = menu_primary_local_tasks();
	}
}