<?php
/**
 * @file
 * Abstract Task Class.
 */

use \ITasks\AbstractInstallTask as AbstractInstallTask;
namespace Stanford\JumpstartEngineering\Hopper;

/**
 * Department mods hopper helper class.
 */
class DeptMods extends AbstractInstallTask {

  /**
   * Set Content for the Add features page.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {

    // Disable the stanford_news_views so we can enable stanford_news_extras_views.
    $modules = array('stanford_news_views');
    module_disable($modules);
    if (drupal_uninstall_modules($modules)) {
      drush_log('Disabled and uninstalled modules: ' . implode(', ', $modules), 'ok');
    }

    // Enable all the department modules.
    $modules = array(
      'stanford_jumpstart_home_dept',
      'stanford_jse_dept',
    );
    if (module_enable($modules)) {
      drush_log('Enabled modules: ' . implode(', ', $modules), 'ok');
    }

  }

  /**
   * Dependencies.
   *
   * @return array
   *   An array of dependency modules.
   */
  public function requirements() {
    return array(
      'stanford_sites_jumpstart_engineering',
    );
  }

}
