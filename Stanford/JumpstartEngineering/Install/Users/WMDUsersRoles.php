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
    $install_vars = variable_get('stanford_jumpstart_install', array());
    $config_form_data = $args['forms']['install_configure_form'];
    // Get some stored variables.
    if ($args['interactive']) {
      $full_name = isset($install_vars['full_name']) ? $install_vars['full_name'] : "School of Engineering";
      $sunetid = isset($install_vars['sunetid']) ? $install_vars['sunetid'] : 'jse-admins';
    }
    else {
      if (function_exists('drush_get_option')) {
        $full_name = isset($config_form_data['stanford_sites_requester_name']) ? $config_form_data['stanford_sites_requester_name'] : drush_get_option('full_name', 'Engineering');
        $sunetid = isset($config_form_data['stanford_sites_requester_sunetid']) ? $config_form_data['stanford_sites_requester_sunetid'] : drush_get_option('sunetid', 'jse-admins');
      }
      else {
        $full_name = "Engineering";
        $sunetid = "jse-admins";
      }
    }
    // add WMD user (site owner)
    // drush waau $sunetid --name="$fullname"
    $sunet = strtolower(trim($sunetid));
    $authname = $sunet . '@stanford.edu';
    $sunet_role = user_role_load_by_name('SUNet User');
    $owner_role = user_role_load_by_name('site owner');
    $editor_role = user_role_load_by_name('editor');
    $admin_role = user_role_load_by_name('administrator');
    $member_role = user_role_load_by_name('site member');
    // Change the sunet requester user to site owner
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
      // Check our chosen authentication scheme.
      $auth_method = variable_get('stanford_sites_auth_method', 'webauth');
      if ($auth_method == 'simplesamlphp') {
        user_set_authmaps($user3, array('authname_simplesamlphp_auth' => $authname));
      }
      else {
        user_set_authmaps($user3, array('authname_webauth' => $authname));
      }
    }
    // Map soe:jse-admins to administrator role
    // drush wamr soe:jse-admins administrator
    if (module_exists('webauth_extras')) {
      module_load_include('inc', 'webauth_extras', 'webauth_extras.drush');
      drush_webauth_extras_webauth_map_role('soe:jse-admins', 'administrator');
    }
  }
}
