<?php
/**
 * @file
 * Add Contextual Block Classes.
 */

namespace Stanford\JumpstartVPSA\Update;
/**
 *
 */
class BlockClasses extends \AbstractUpdateTask {

  protected $description = "Add Contextual Block Classes";

  /**
   * Add Contextual Block Classes.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {
    // Insert contextual block classes.
    // --------------------------------------------------------------------------.
    $cbc_layouts = variable_get('contextual_block_class', array());
    // Large about block.
    if (!isset($cbc_layouts['vpsa_homepage_dickinson']['bean-vpsa-large-about-block'])) {
      $cbc_layouts['vpsa_homepage_dickinson']['bean-vpsa-large-about-block'][] = 'span8';
      $cbc_layouts['vpsa_homepage_dickinson']['bean-vpsa-large-about-block'][] = 'clear-row';
      $cbc_layouts['vpsa_homepage_dickinson']['bean-vpsa-large-about-block'][] = 'column';
    }
    // Quick links.
    if (!isset($cbc_layouts['vpsa_homepage_dickinson']['bean-vpsa-quick-links'])) {
      $cbc_layouts['vpsa_homepage_dickinson']['bean-vpsa-quick-links'][] = 'span4';
      $cbc_layouts['vpsa_homepage_dickinson']['bean-vpsa-quick-links'][] = 'well';
      $cbc_layouts['vpsa_homepage_dickinson']['bean-vpsa-quick-links'][] = 'column';
      $cbc_layouts['vpsa_homepage_ellison']['bean-vpsa-quick-links'][] = 'well';
      $cbc_layouts['vpsa_homepage_melville']['bean-vpsa-quick-links'][] = 'well';
      $cbc_layouts['vpsa_homepage_melville']['bean-vpsa-quick-links'][] = 'column';
      $cbc_layouts['vpsa_homepage_morrison']['bean-vpsa-quick-links'][] = 'span4';
      $cbc_layouts['vpsa_homepage_morrison']['bean-vpsa-quick-links'][] = 'well';
      $cbc_layouts['vpsa_homepage_morrison']['bean-vpsa-quick-links'][] = 'column';
    }
    // Announcements & News block.
    if (!isset($cbc_layouts['vpsa_homepage_dickinson']['views-f73ff55b085ea49217d347de6630cd5a'])) {
      $cbc_layouts['vpsa_homepage_dickinson']['views-f73ff55b085ea49217d347de6630cd5a'][] = 'well';
      $cbc_layouts['vpsa_homepage_dickinson']['views-f73ff55b085ea49217d347de6630cd5a'][] = 'column';
      $cbc_layouts['vpsa_homepage_ellison']['views-f73ff55b085ea49217d347de6630cd5a'][] = 'well';
      $cbc_layouts['vpsa_homepage_melville']['views-f73ff55b085ea49217d347de6630cd5a'][] = 'well';
      $cbc_layouts['vpsa_homepage_melville']['views-f73ff55b085ea49217d347de6630cd5a'][] = 'column';
      $cbc_layouts['vpsa_homepage_morrison']['views-f73ff55b085ea49217d347de6630cd5a'][] = 'well';
    }
    // Custom content block.
    if (!isset($cbc_layouts['vpsa_homepage_dickinson']['bean-vpsa-custom-block-'])) {
      $cbc_layouts['vpsa_homepage_dickinson']['bean-vpsa-custom-block-'][] = 'well';
      $cbc_layouts['vpsa_homepage_dickinson']['bean-vpsa-custom-block-'][] = 'column';
      $cbc_layouts['vpsa_homepage_melville']['bean-vpsa-custom-block-'][] = 'well';
      $cbc_layouts['vpsa_homepage_melville']['bean-vpsa-custom-block-'][] = 'column';
      $cbc_layouts['vpsa_homepage_morrison']['bean-vpsa-custom-block-'][] = 'well';
      $cbc_layouts['vpsa_homepage_morrison']['bean-vpsa-custom-block-'][] = 'column';
      $cbc_layouts['vpsa_homepage_morrison']['bean-vpsa-custom-block-'][] = 'span4';
    }
    // Custom content block #2.
    if (!isset($cbc_layouts['vpsa_homepage_morrison']['bean-vpsa-custom-block-2'])) {
      $cbc_layouts['vpsa_homepage_morrison']['bean-vpsa-custom-block-2'][] = 'well';
      $cbc_layouts['vpsa_homepage_morrison']['bean-vpsa-custom-block-2'][] = 'column';
      $cbc_layouts['vpsa_homepage_morrison']['bean-vpsa-custom-block-2'][] = 'span4';
    }
    // Storytelling block.
    if (!isset($cbc_layouts['vpsa_homepage_melville']['bean-vpsa-story-telling-block'])) {
      $cbc_layouts['vpsa_homepage_melville']['bean-vpsa-story-telling-block'][] = 'span12';
      $cbc_layouts['vpsa_homepage_melville']['bean-vpsa-story-telling-block'][] = 'clear-row';
      $cbc_layouts['vpsa_homepage_morrison']['bean-vpsa-story-telling-block'][] = 'span12';
      $cbc_layouts['vpsa_homepage_morrison']['bean-vpsa-story-telling-block'][] = 'clear-row';
    }
    // Social media connect block.
    if (!isset($cbc_layouts['vpsa_homepage_dickinson']['bean-jumpstart-footer-social-media--0'])) {
      $cbc_layouts['vpsa_homepage_dickinson']['bean-jumpstart-footer-social-media--0'] = array('span12');
      $cbc_layouts['vpsa_homepage_ellison']['bean-jumpstart-footer-social-media--0'] = array('span12', 'clear-row');
      $cbc_layouts['vpsa_homepage_melville']['bean-jumpstart-footer-social-media--0'] = array('span12');
    }
    // Events.
    if (!isset($cbc_layouts['vpsa_homepage_dickinson']['views-stanford_events_views-block'])) {
      $cbc_layouts['vpsa_homepage_dickinson']['views-stanford_events_views-block'][] = 'well';
      $cbc_layouts['vpsa_homepage_dickinson']['views-stanford_events_views-block'][] = 'column';
      $cbc_layouts['vpsa_homepage_morrison']['views-stanford_events_views-block'][] = 'well';
    }
    // Remove some block classes.
    $and1 = db_and()
      ->condition("module", "bean")
      ->condition("delta", "jumpstart-footer-social-media--0");
    db_delete("block_class")
      ->condition($and1)
      ->execute();
    // OK DONE!
    variable_set('contextual_block_class', $cbc_layouts);
  }

}
