<?php
/**
 * @file
 * Update email address for user 1.
 */

namespace Stanford\JumpstartEngineering\Install\Users;
/**
 *
 */
class UserOne extends \AbstractInstallTask {

  /**
   * Update email address for user 1.
   *
   * @param array $args
   *   Installation arguments.
   * 
   */
  public function execute(&$args = array()) {

    // Change user 1, currently admin, to jse-admins
    $account = user_load(1, TRUE);
    $edit = array();
    $edit['mail'] = "jse-admins@lists.stanford.edu";
    $edit['status'] = TRUE;
    $roles = array(
      DRUPAL_AUTHENTICATED_RID => TRUE,
      $admin_role->rid => TRUE
    );
    $edit['roles'] = $roles;
    $edit['timezone'] = variable_get('date_default_timezone', '');
    $account = user_save($account, $edit);
  }
}