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
    // Get the default banner image
    $filename = "profile-large-blank.png";
    $file_path = libraries_get_path('tasks') . '/Stanford/Jumpstart/JumpstartEngineering/img/' . $filename;
    $image = file_get_contents($file_path);

    //Create a database entry.
    $file = file_save_data($image, "public://" . $filename, FILE_EXISTS_REPLACE);

    // And save the file id for default_image_ft to use.
    variable_set('stanford_person_profile_picture', $file->fid);

 /*
    // Setting default image on stanford person using a variable leveraging default_image_ft module.
    $q = db_select('file_managed', 'fm');
    $q->addField('fm', 'fid');
    $q->condition('fm.filename', 'default-profile-image.png', '=');
    $fid = $q->execute()->fetchField();
    
    // This default image is being pulled in by CAP.
    variable_set('stanford_person_profile_picture', $fid);
 */
  }

}
