<?php
/**
 * @file
 * Theme settings.
 */

namespace Stanford\JumpstartVPSA\Update;
/**
 *
 */
class ThemeSettings extends \AbstractUpdateTask {

  protected $description = "Update theme settings";

  /**
   * Update theme settings.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {
    // Change the default theme.
    theme_enable(array('stanford_framework'));
    variable_set('theme_default', 'stanford_framework');
    // Add theme settings.
    $theme_settings = variable_get('theme_stanford_framework_settings', array());
    $theme_settings['choosestyle_styleoptions'] = 'style-custom';
    $theme_settings['fonts'] = 'fonts-sans';
    $theme_settings['styles'] = 'styles-light';
    variable_set('theme_stanford_framework_settings', $theme_settings);
    // Disable a conflicting module.
    module_disable(array("stanford_jumpstart_roles"), FALSE);
    drupal_flush_all_caches();
  }

}
