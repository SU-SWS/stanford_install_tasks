<?php
/**
 * @file
 * Create and update users; map roles
 */

namespace Stanford\JumpstartEngineering\Install\Users;
/**
 *
 */
class WMDUsersRoles extends \AbstractInstallTask {

  /**
   * Create and update users; map roles
   *
   * @param array $args
   *   Installation arguments.
   *
   * @todo: Refactor this into several methods and/or a generic Utility class.
   */
  public function execute(&$args = array()) {

    // Need this for UI install.
    require_once DRUPAL_ROOT . '/includes/password.inc';

    $config_form_data = $args['forms']['install_configure_form'];

    // @todo: Get name and sunet from form.

    $full_name = "Engineering"; // unsued var?
    $sunetid = "jse-admins";

    $sunet = strtolower(trim($sunetid));
    $authname = $sunet . '@stanford.edu';
    $sunet_role = user_role_load_by_name('SUNet User');
    $owner_role = user_role_load_by_name('site owner');

    // Change the sunet requester user to site owner.
    $edit = array();
    $user3 = user_load_by_mail($authname);

    if ($user3) {

      $roles = array(
        DRUPAL_AUTHENTICATED_RID => TRUE,
        $sunet_role->rid => TRUE,
        $owner_role->rid => TRUE
      );

      $edit['roles'] = $roles;
      $user3 = user_save($user3, $edit);
      user_set_authmaps($user3, array('authname_webauth' => $authname));
    }

    // Map soe:jse-admins to administrator role
    // drush wamr soe:jse-admins administrator
    if (module_exists('webauth_extras')) {
      module_load_include('inc', 'webauth_extras', 'webauth_extras.drush');
      drush_webauth_extras_webauth_map_role('soe:jse-admins', 'administrator');
    }

  }
}
