<?php
/**
 * @file
 * This function removes any view that has been saved to the database.
 */

namespace Stanford\Utility\Install;
/**
 *
 */
class ViewsFromDB extends \AbstractInstallTask {


  public function execute(&$args = array()) {

     $implements = module_implements('views_default_views');
    foreach ($implements as $module_name) {
      $views = call_user_func($module_name . '_views_default_views');

      foreach ($views as $view_name => $view) {
          $results = db_select('views_view', 'vv')
              ->fields('vv', array('vid'))
              ->condition('name', $view_name)
              ->range(0,1)
              ->execute()
              ->fetchAssoc();

          $view->vid = $results['vid'];
          $view->delete();
      }
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

