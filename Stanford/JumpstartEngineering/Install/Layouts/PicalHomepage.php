<?php
/**
 * @file
 * Configure PICAL homepage layouts.
 */

namespace Stanford\JumpstartEngineering\Install\Layouts;
/**
 *
 */
class PicalHomepage extends \AbstractInstallTask {

  /**
   * Configure PICAL homepage layouts.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {


    $default = 'stanford_jumpstart_home_morris';
    variable_set('stanford_jumpstart_home_active_body_class', 'stanford-jumpstart-home-morris');
    $context_status = variable_get('context_status', array());
    $homecontexts = stanford_jumpstart_home_context_default_contexts();
    $names = array_keys($homecontexts);
    // Enable these JSE layouts for use by site owners.
    $enabled['stanford_jumpstart_home_hoover'] = 1;
    $enabled['stanford_jumpstart_home_morris'] = 1;
    $enabled['stanford_jumpstart_home_terman'] = 1;
    $enabled['stanford_jumpstart_home_pettit'] = 1;
    // Disable these layouts.
    unset($enabled['stanford_jumpstart_home_lomita']);
    unset($enabled['stanford_jumpstart_home_mayfield_news_events']);
    unset($enabled['stanford_jumpstart_home_palm_news_events']);
    unset($enabled['stanford_jumpstart_home_panama_news_events']);
    unset($enabled['stanford_jumpstart_home_serra_news_events']);
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