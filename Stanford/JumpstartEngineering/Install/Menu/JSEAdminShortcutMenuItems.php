<?php
/**
 * @file
 * Create JSE menu items for the Private Pages section
 */

namespace Stanford\JumpstartEngineering\Install\Menu;
use Stanford\Utility\Install\CreateMenuLinks;

/**
 *
 */
class JSEAdminShortcutMenuItems extends \AbstractInstallTask {

  /**
   * Create menu items.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {

    // Manage meta tags.
    $items['admin/stanford/jumpstart/shortcuts/site-actions/manage-metatags'] = array(
      /*
      'link_path' => drupal_get_normal_path('admin/config/search/metatags'),
      'link_title' => 'Manage Meta Tags',
      'menu_name' => 'menu-admin-shortcuts',
      'weight' => 30,
      */

      'title' => 'Manage Meta Tags',
      'description' => 'Manage the meta tags for your site',
      'page callback' => 'drupal_goto',
      'page arguments' => array('admin/config/search/metatags'),
      'access arguments' => array('Administer meta tags'),
      'type' => MENU_NORMAL_ITEM,
      'menu_name' => 'menu-admin-shortcuts',
      'weight' => 30,

    );
    // Manage redirects.
    $items['admin/stanford/jumpstart/shortcuts/site-actions/manage-redirects'] = array(
      'link_path' => drupal_get_normal_path('admin/config/search/redirect'),
      'link_title' => 'Manage URL Redirects',
      'menu_name' => 'menu-admin-shortcuts',
      'weight' => 32,
    );

    $linker = new \Stanford\Utility\Install\CreateMenuLinks();
    $linker->execute($items);

  }

}
