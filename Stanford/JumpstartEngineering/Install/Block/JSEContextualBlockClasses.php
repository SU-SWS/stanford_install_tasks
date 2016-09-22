<?php
/**
 * @file
 * Set contextual block classes
 */

namespace Stanford\JumpstartEngineering\Install\Block;
/**
 *
 */
class JSEContextualBlockClasses extends \AbstractInstallTask {

  /**
   * Set Contextual Block Classes.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {


    // Install contextual block classes.
    $cbc_layouts = array();
    $cbc_layouts['stanford_jumpstart_home_gibbons']['bean-homepage-about-block'][] = 'span8 well';

//    $cbc_layouts['stanford_jumpstart_home_hoover']['bean-homepage-about-block'][] = 'span4 well';
//    $cbc_layouts['stanford_jumpstart_home_hoover']['views-46f3a22e00be75cb8fe3bc16de17162a'][] = 'span4 well';
//    $cbc_layouts['stanford_jumpstart_home_morris']['bean-jumpstart-home-page-banner---no-'][] = 'span8';
//    $cbc_layouts['stanford_jumpstart_home_morris']['bean-homepage-about-block'][] = 'span4 well';
//    $cbc_layouts['stanford_jumpstart_home_morris']['views-f73ff55b085ea49217d347de6630cd5a'][] = 'span4 well';
//    $cbc_layouts['stanford_jumpstart_home_morris']['views-stanford_events_views-block'][] = 'span4 well';
//    $cbc_layouts['stanford_jumpstart_home_pettit']['bean-jumpstart-home-page-full-width-b'][] = 'span12';
    $cbc_layouts['stanford_jumpstart_home_pettit']['bean-homepage-about-block'][] = 'span8 well';
//    $cbc_layouts['stanford_jumpstart_home_pettit']['views-f73ff55b085ea49217d347de6630cd5a'][] = 'span4 well';
//    $cbc_layouts['stanford_jumpstart_home_pettit']['views-stanford_events_views-block'][] = 'span4 well';
//    $cbc_layouts['stanford_jumpstart_home_terman']['bean-jumpstart-home-page-full-width-b'][] = 'span12';
//    $cbc_layouts['stanford_jumpstart_home_terman']['bean-jumpstart-about-block'][] = 'span4 well';
//    $cbc_layouts['stanford_jumpstart_home_terman']['views-f73ff55b085ea49217d347de6630cd5a'][] = 'span4 well';
//    $cbc_layouts['stanford_jumpstart_home_terman']['views-stanford_events_views-block'][] = 'span4 well';
    $cbc_layouts['sitewide_jse']['bean-jse-linked-logo-block'][] = 'span4';
    $cbc_layouts['sitewide_jse']['bean-jse-logo-block'][] = 'span4';
    $cbc_layouts['sitewide_jse']['bean-jumpstart-footer-contact-block'][] = 'span2';
    $cbc_layouts['sitewide_jse']['bean-jumpstart-footer-social-media--0'][] = 'span2';
    $cbc_layouts['sitewide_jse']['bean-jumpstart-custom-footer-block'][] = 'span2';
    $cbc_layouts['sitewide_jse']['stanford_private_page-stanford_internal_login'][] = 'span2';
    variable_set('contextual_block_class', $cbc_layouts);
  }

}
