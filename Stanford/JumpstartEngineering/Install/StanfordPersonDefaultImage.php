<?php
/**
 * @file
 * Abstract Task Class.
 */

namespace Stanford\JumpstartEngineering\Install;
/**
 *
 */
class StanfordPersonDefaultImage extends \AbstractInstallTask {

  /**
   * Set the site name.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {
    // Setting default image on stanford person using a variable leveraging default_image_ft module.
    $q = db_select('file_managed', 'fm');
    $q->addField('fm', 'fid');
    $q->condition('fm.filename', 'default-profile-image.png', '=');
    $fid = $q->execute()->fetchField();
    
    variable_set('stanford_person_profile_picture', $fid);
  }

}
