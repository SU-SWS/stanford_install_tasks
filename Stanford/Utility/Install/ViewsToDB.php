<?php
/**
 * @file
 * This function saves all of the available views in to the database so that
 * the menu system can find them.
 */

namespace Stanford\Utility\Install;
/**
 *
 */
class ViewsToDB extends \AbstractInstallTask {


  public function execute(&$args = array()) {

    // Load up and save all views to the db.
    $implements = module_implements('views_default_views');
    $views = array();
    foreach ($implements as $module_name) {
      $views += call_user_func($module_name . "_views_default_views");
    }

    // Initialize! Alive!
    foreach ($views as $view) {
      $view->save(); // this unfortunately enables (turns on) the view as well.
    }

  }

  /**
   *
   */
  public function requirements() {
    return array(
      'views',
    );
  }

}

