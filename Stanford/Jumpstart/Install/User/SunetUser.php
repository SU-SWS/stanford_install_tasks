<?php
/**
 * @file
 * Abstract Task Class.
 */

namespace Stanford\Jumpstart\Install\User;
/**
 *
 */
class SunetUser extends \AbstractInstallTask {

  /**
   * Set the site name.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {

    $install_state = $args;

    // Need this for UI install.
    require_once DRUPAL_ROOT . '/includes/password.inc';

    $sunet = "webservices";
    $authname = $sunet . '@stanford.edu';
    $sunet_role = user_role_load_by_name('SUNet User');
    $owner_role = user_role_load_by_name('site owner');

    // Change the sunet requester user to site owner.
    $edit = array();
    $user3 = user_load_by_mail($authname);

    if ($user3) {
      $roles = array(DRUPAL_AUTHENTICATED_RID => TRUE, $sunet_role->rid => TRUE, $owner_role->rid => TRUE);
      $edit['roles'] = $roles;
      $user3 = user_save($user3, $edit);
    }

    // @TODO: Refactor out once environment stuff is set.
    if (module_exists('simplesamlphp') && $user3) {
      user_set_authmaps($user3, array('authname_simplesamlphp_auth' => $authname));
    }

    if (module_exists("webauth") && $user3) {
      user_set_authmaps($user3, array('authname_webauth' => $authname));
    }

  }

  /**
   * [form description]
   * @param  [type] &$form       [description]
   * @param  [type] &$form_state [description]
   * @return [type]              [description]
   */
  public function form(&$form, &$form_state) {
    /**
     * Grab requester's SUNetID.
     * We will be setting this programatically so we do not want to present it to the user.
     */
    $form["sites"]["stanford_sites_requester_sunetid"] = array(
      "#type" => "textfield",
      "#title" => t("SUNetID."),
      "#description" => t("Requester's SUNetID."),
      "#default_value" => "",
    );
  
    /**
     * Grab requester's preferred name.
     * We will be setting this programatically so we do not want to present it to the user.
     */
    $form["sites"]['stanford_sites_requester_name'] = array(
      "#type" => "textfield",
      "#title" => t("Name."),
      "#description" => t("Requester's preferred name"),
      "#default_value" => "",
    );
  
  
    /**
     * Grab requester's preferred email.
     * We will be setting this programatically so we do not want to present it to the user.
     */
    $form["sites"]['stanford_sites_requester_email'] = array(
      "#type" => "textfield",
      "#title" => t("Email."),
      "#description" => t("Requester's preferred email."),
      "#default_value" => "",
    );
  
    /**
     * Set org type: group or dept.
     * Blank if a personal site.
     * We will be setting this programatically so we do not want to present it to the user.
     */
    $form['stanford_sites_org_type'] = array(
      "#type" => "textfield",
      "#title" => t("Group."),
      "#description" => t("Requester's preferred email."),
      "#default_value" => "",
    );
  }

  /**
   * [requirements description].
   *
   * @return [type] [description]
   */
  public function requirements() {
    return array(
      'user',
    );
  }

}
