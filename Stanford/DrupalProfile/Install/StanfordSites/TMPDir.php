<?php
/**
 * @file
 * Abstract Task Class
 */

namespace Stanford\DrupalProfile\Install\StanfordSites;
use \ITasks\AbstractInstallTask;

class TMPDir extends AbstractInstallTask {

  /**
   * Set the site name.
   *
   * @param array $args
   *  Installation arguments.
   */
  public function execute(&$args = array()) {
    variable_set('stanford_sites_tmpdir', $args['forms']['install_configure_form']['stanford_sites_tmpdir']);
    $tmpdir = variable_get('stanford_sites_tmpdir', file_directory_temp());
    file_prepare_directory($tmpdir, FILE_CREATE_DIRECTORY);
    // system_check_directory() is expecting a $form_element array.
    $element = array();
    $element['#value'] = $tmpdir;

    // Check that the temp directory exists; create it if it does not.
    system_check_directory($element);
    variable_set('file_temporary_path', $tmpdir);

  }
  public function form(&$form, &$form_state) {
    $form['sites']['stanford_sites_tmpdir'] = array(
      '#default_value' => '',
      "#type" => "textfield",
      "#title" => t("Temporary Files Directory"),
      "#description" => t('Enter a path for the temporary files directory (e.g., "sites/default/files/tmp".'),
    );
  }
}

