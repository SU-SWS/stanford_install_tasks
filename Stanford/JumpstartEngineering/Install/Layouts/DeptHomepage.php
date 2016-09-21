<?php
/**
 * @file
 * Configure PICAL homepage layouts.
 */

namespace Stanford\JumpstartEngineering\Install\Layouts;
/**
 *
 */
class DeptHomepage extends \AbstractInstallTask {

  /**
   * Configure PICAL homepage layouts.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {

    // Set default layout
    $default = 'stanford_jumpstart_home_gibbons';
    variable_set('stanford_jumpstart_home_active_body_class', 'stanford-jumpstart-home-gibbons');
    $context_status = variable_get('context_status', array());
    $homecontexts = stanford_jumpstart_home_context_default_contexts();
    $names = array_keys($homecontexts);

    // Enable this layout for use by site owners.
    $enabled['stanford_jumpstart_home_gibbons'] = 1;

    // Not sure why we are getting an empty space...
    unset($context_status['']);

    foreach ($names as $context_name) {
      $context_status[$context_name] = TRUE;
      $settings = variable_get('sjh_' . $context_name, array());
      $settings['site_admin'] = isset($enabled[$context_name]);
      variable_set('sjh_' . $context_name, $settings);
    }

    $context_status[$default] = FALSE;
    unset($context_status['']);

    // Save settings.
    variable_set('stanford_jumpstart_home_active', $default);
    variable_set('context_status', $context_status);
  }

}