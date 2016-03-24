<?php
/**
 * @file
 * Import JSE BEANs
 */

use Stanford\Jumpstart\Install\Content\Importer\ImporterFieldProcessorCustomBody as ImporterFieldProcessorCustomBody;
use Stanford\Jumpstart\Install\Content\Importer\ImporterFieldProcessorFieldSDestinationPublish as ImporterFieldProcessorFieldSDestinationPublish;

namespace Stanford\JumpstartEngineering\Install\Content;
/**
 *
 */
class ImportJSEBeans extends \AbstractInstallTask {

  /**
   * Import JSE BEANs.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {

    $endpoint = "https://sites.stanford.edu/jsa-content/jsainstall";

    $uuids = array(
      '04cef32d-aa4b-477c-850e-e9efd331fa4c',
      // Jumpstart Home Page Banner - No Caption.
      '40cabca1-7d44-42bf-a012-db53fdccd350',
      // Jumpstart Large Custom Block.
      '7e510af6-c003-402d-91a4-7480dac1484a',
      // Jumpstart Small Custom Block.
      '2c570a0a-d52a-4e8b-bf36-ec01b2777932',
      // JSE Logo Block.
      '593aed4a-653e-4bea-8129-9733f4b2bd4b',
      // JSE Linked Logo Block
      '87527e6a-1f9e-4b39-a999-c138851b3a47',
      // Jumpstart Custom Footer Block.
      'afb406ad-c08f-4c91-a179-e703a8afc6ca',
      // Jumpstart Home Page Full-Width Banner - No Caption
    );
    $importer = new \SitesContentImporter();
    $importer->set_endpoint($endpoint);
    $importer->set_bean_uuids($uuids);
    $importer->import_content_beans();

  }

  /**
   * [requirements description]
   * @return [type] [description]
   */
  public function requirements() {
    return array(
      'bean',
      'bean_admin_ui',
    );
  }

}






