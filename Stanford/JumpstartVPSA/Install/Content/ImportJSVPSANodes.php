<?php
/**
 * @file
 * Abstract Task Class.
 */

use Stanford\Jumpstart\Install\Content\Importer\ImporterFieldProcessorCustomBody as ImporterFieldProcessorCustomBody;
use Stanford\Jumpstart\Install\Content\Importer\ImporterFieldProcessorFieldSDestinationPublish as ImporterFieldProcessorFieldSDestinationPublish;

namespace Stanford\JumpstartVPSA\Install\Content;
/**
 *
 */
class ImportJSVPSANodes extends \AbstractInstallTask {

  /**
   * Set the site name.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {

    $endpoint = "https://sites.stanford.edu/jsa-content/jsainstall";

    // JSVPSA ONLY CONTENT - Tid 39 = JSVPSA.
    $filters = array('sites_products' => array('39'));
    $view_importer = new \SitesContentImporterViews();
    $view_importer->set_endpoint($endpoint);
    $view_importer->set_resource('content');
    $view_importer->set_filters($filters);
    $view_importer->add_field_processor(array("body" => "\Stanford\Jumpstart\Install\Content\Importer\ImporterFieldProcessorCustomBody"));
    $view_importer->add_field_processor(array("field_s_destination_publish" => "\Stanford\Jumpstart\Install\Content\Importer\ImporterFieldProcessorCustomFieldSDestinationPublish"));
    $view_importer->import_content_by_views_and_filters();

  }

}







