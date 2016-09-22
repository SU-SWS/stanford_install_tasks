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
   * Configure Department homepage layouts.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {

    // Add layout settings for Gibbons layout
    $layout = array();
    $layout["sjh_stanford_jumpstart_home_gibbons"]["context"] = "stanford_jumpstart_home_gibbons";
    $layout["sjh_stanford_jumpstart_home_gibbons"]["thumb"] = "js-home-gibbons.jpg";
    $layout["sjh_stanford_jumpstart_home_gibbons"]["title"] = "Gibbons";
    $layout["sjh_stanford_jumpstart_home_gibbons"]["description"] = "<ul><li>Full-width banner block</li><li>Large About block</li><li>Auto-generated News block</li><li>Five small custom block</li></ul><li>Auto-generated Events block</li>";
    $layout["sjh_stanford_jumpstart_home_gibbons"]["class"] = "stanford-jumpstart-home-gibbons";

    variable_set('sju_stanford_jumpstart_home_gibbons', $layout);

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
