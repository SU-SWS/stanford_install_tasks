<?php
/**
 * @file
 * Abstract Task Class.
 */

namespace Stanford\JumpstartVPSA\Install\Block;
/**
 *
 */
class JSVPSABlockClasses extends \AbstractInstallTask {

  /**
   * Set Block Classes.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {


    // Install block classes:
    $fields = array('module', 'delta', 'css_class');
    $values = array(
      array("bean", "flexi-block-for-the-home-page", "well span4 clear-row"),
      array("bean", "homepage-about-block", "well"),
      array("bean", "vpsa-resources-block", "span4"),
      array("bean", "vpsa-student-affairs-block", "span4"),
      array('bean', "vpsa-helpful-links-footer-block", "span4"),
      array("bean", "social-media", "span4"),
      array("bean", "contact-block", "span4"),
      array("bean", "optional-footer-block", "span4"),
      array("bean", "jumpstart-footer-contact-block", "span4"),
      array("bean", "vpsa-story-telling-block", "storytelling"),
      // Menus.
      array("menu", "menu-admin-shortcuts-home", "shortcuts-home"),
      array(
        "menu",
        "menu-admin-shortcuts-site-action",
        "shortcuts-actions shortcuts-dropdown"
      ),
      array("menu", "menu-admin-shortcuts-add-feature", "shortcuts-features"),
      array("menu", "menu-admin-shortcuts-get-help", "shortcuts-help"),
      array("menu", "menu-admin-shortcuts-ready-to-la", "shortcuts-launch"),
      array("menu", "menu-admin-shortcuts-logout-link", "shortcuts-logout"),
      // Views.
      array("views", "stanford_events_views-block_1", "span12 clear-row"),
      // Upcoming Events Block
      // array('views', "3b9ba5dd07e9aa559cbe7d1ced47f7b7", "span12 clear-row"), // 5 Item News List Block
      array("views", "f73ff55b085ea49217d347de6630cd5a", "well"),
      //News: 2 Item Recent News List Block
      // Other.
      array(
        "stanford_jumpstart_layouts",
        "jumpstart-launch",
        "shortcuts-launch-block"
      ),
    );
    // Key all the values.
    $insert = db_insert('block_class')->fields($fields);
    foreach ($values as $value) {
      $db_values = array_combine($fields, $value);
      $insert->values($db_values);
    }
    $insert->execute();
  }

}
