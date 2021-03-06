<?php
/**
 * @file
 * Abstract Task Class.
 */

namespace Stanford\Jumpstart\Install\Menu;
use \ITasks\AbstractInstallTask;

/**
 *
 */
class MenuSettings extends AbstractInstallTask {

  /**
   * Set the site name.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {

     $items = array();

    // Rebuild the menu cache before starting this.
    drupal_static_reset();
    menu_cache_clear_all();
    menu_rebuild();

    // News Landing.
    $items['news'] = array(
      'link_path' => drupal_get_normal_path('news'),
      'link_title' => 'News',
      'menu_name' => 'main-menu',
      'weight' => -9,
    );

    // Events Landing.
    $items['events'] = array(
      'link_path' => drupal_get_normal_path('events'),
      'link_title' => 'Events',
      'menu_name' => 'main-menu',
      'weight' => -8,
    );

    // Research.
    $items['research'] = array(
      'link_path' => drupal_get_normal_path('research'),
      'link_title' => 'Research',
      'menu_name' => 'main-menu',
      'weight' => -7,
    );

    // People.
    $items['people'] = array(
      'link_path' => drupal_get_normal_path('people'),
      'link_title' => 'People',
      'menu_name' => 'main-menu',
      'weight' => -6,
    );

    // People.
    $items['programs'] = array(
      'link_path' => drupal_get_normal_path('programs'),
      'link_title' => 'Programs',
      'menu_name' => 'main-menu',
      'weight' => -5,
    );

    // About.
    $items['about'] = array(
      'link_path' => drupal_get_normal_path('about'),
      'link_title' => 'About',
      'menu_name' => 'main-menu',
      'weight' => -4,
    );

    // About / Contact.
    $items['about/contact'] = array(
      'link_path' => drupal_get_normal_path('about/contact'),
      'link_title' => 'Contact',
      'menu_name' => 'main-menu',
      'weight' => -8,
      'parent' => 'about', // must be saved prior to contact item.
    );

    // Loop through each of the items and save them.
    foreach ($items as $k => $v) {

      // Check to see if there is a parent declaration. If there is then find
      // the mlid of the parent item and attach it to the menu item being saved.
      if (isset($v['parent'])) {
        $v['plid'] = $items[$v['parent']]['mlid'];
        unset($v['parent']); // Remove fluff before save.
      }

      // Save the menu item.
      $mlid = menu_link_save($v);
      $v['mlid'] = $mlid;
      $items[$k] = $v;
    }

    // The home link weight needs to change so that it is in front..
    $home_search = db_select('menu_links', 'ml')
      ->fields('ml', array('mlid'))
      ->condition('menu_name', 'main-menu')
      ->condition('link_path', '<front>')
      ->condition('link_title', 'Home')
      ->execute()
      ->fetchAssoc();

    if (is_numeric($home_search['mlid'])) {
      $menu_link = menu_link_load($home_search['mlid']);
      $menu_link['weight'] = -50;
      menu_link_save($menu_link);
    }

  }

}
