<?php
/**
 * @file
 * Import missing content.
 */

namespace Stanford\JumpstartVPSA\Update;
/**
 *
 */
class ContentImport extends \AbstractUpdateTask {

  protected $description = "Import missing content";

  /**
   * Import missing content.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {
    // Try to use libraries module if available to find the path.
    if (function_exists('libraries_get_path')) {
      $library_path = DRUPAL_ROOT . '/' . libraries_get_path('stanford_sites_content_importer');
    }
    if (!file_exists($library_path . '/SitesContentImporter.php')) {
      $library_path = DRUPAL_ROOT . '/sites/all/libraries/stanford_sites_content_importer';
    }
    if (!file_exists($library_path . '/SitesContentImporter.php')) {
      $library_path = DRUPAL_ROOT . '/sites/default/libraries/stanford_sites_content_importer';
    }
    // @todo: Add better error handling here.
    $library_path .= "/SitesContentImporter.php";
    require_once $library_path;
    // Now that the library exists lets add our own custom processors.
    require_once dirname(__FILE__) . "/../includes/ImporterFieldProcessorCustomBody.php";
    // Allow drush to ping servers.
    ini_set('allow_url_fopen', 1);
    // Fetch JSVPSA Beans.
    $uuids = array(
      '6d61755d-538d-4d08-bcd5-1e0be11d28c2', // VPSA Quick Links
      '6d5066df-346a-4a8a-adea-a9c10eff99a7', // VPSA Large About Block
      '58e5c099-5033-4889-a278-6294113fa998', // VPSA Custom Block 1
      '4e9a73f9-716b-469a-a473-84c261ad05ff', // VPSA Custom Block 2
      '3a68f54e-fb65-40ec-ace2-3e9e977c1765', // VPSA Story Telling Block
      'ff9d9ee1-3a23-433b-9d80-d15bb46a466b', // Full Width Banner Short
    );
    $importer = new \SitesContentImporter();
    $importer->set_endpoint('https://sites.stanford.edu/jsa-content/jsainstall');
    $importer->set_bean_uuids($uuids);
    $importer->import_content_beans();
    $nodes = array(
      // Get the gallery node.
      "a46213f5-57ce-402c-be1e-fac218daf340" => array("a46213f5-57ce-402c-be1e-fac218daf340"),
      // Jacob Smith.
      "5041c58e-efea-4dee-9dc4-628323328264" => array("5041c58e-efea-4dee-9dc4-628323328264"),
    );
    $importer->importer_process_nodes_by_uuids($nodes);
    // Import Private pages.
    $content_types = array(
      'stanford_private_page',
    );
    $importer->add_import_content_type($content_types);
    $importer->importer_content_nodes_recent_by_type();
  }

}
