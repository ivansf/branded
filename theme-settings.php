<?php
/**
 * @file
 * theme-settings.php
 *
 * Provides theme settings for Bootstrap based themes when admin theme is not.
 *
 * @see theme/settings.inc
 */

/**
 * Include common Bootstrap functions.
 */
//include_once dirname(__FILE__) . '/theme/common.inc';

/**
 * Implements hook_form_FORM_ID_alter().
 */
function branded_form_system_theme_settings_alter(&$form, $form_state, $form_id = NULL) {

    $form['branding-layout'] = array(
        '#type' => 'fieldset',
        '#title' => t('Layout Options'),
    );
    $form['branding-layout']['branded-full'] = array(
        '#type' => 'checkbox',
        '#title' => t('Full width'),
        '#default_value' => theme_get_setting('branded-full'),
        '#description' => t('Use full page width for the administration area, otherwise, the layout max width will be set at 1280px')
    );

    $form['branding-fs'] = array(
        '#type' => 'fieldset',
        '#title' => t('Logo Branding'),
        '#description' => 'In Branded, you can make your branding logo show at left of the page title or at the right
        as a watermark.'
    );

    $form['branding-fs']['branded-logo'] = array(
        '#type' => 'file',
        '#title' => t('Uploads a logo'),
        '#description' => t('Adds a logo to the top left corner of the header.')
    );

    $form['branding-fs']['branded-left'] = array(
        '#type' => 'checkbox',
        '#title' => t('Left corner logo'),
        '#default_value' => theme_get_setting('branded-left'),
        '#description' => t('Adds a logo to the top left corner of the header.')
    );
}


