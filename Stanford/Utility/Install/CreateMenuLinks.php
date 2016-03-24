<?php
/**
 * @file
 * This function creates a new Menu Position rule.
 */

namespace Stanford\Utility\Install;

/**
 * Create new menu links.
 * @param array $mp_rules A multidimensional array with the following keys:
 * 'link_title' : Link title in the Main Menu. Assuming depth of 1
 * 'admin_title' : Administrative title of the Menu Position rule. Human-readable.
 * 'conditions' : multidimensional array of Menu Position conditions
 */

class CreateMenuLinks extends \AbstractInstallTask {


  public function execute(&$args = array()) {

    // Loop through each of the items and save them.
    foreach ($args as $k => $v) {
      // Check to see if there is a parent declaration. If there is then find
      // the mlid of the parent item and attach it to the menu item being saved.
      if (isset($v['parent'])) {
        $v['plid'] = $args[$v['parent']]['mlid'];
        unset($v['parent']); // Remove fluff before save.
      }
      // Save the menu item.
      $mlid = menu_link_save($v);
      $v['mlid'] = $mlid;
      $args[$k] = $v;
    }
  }

}

