<?php
/**
 * @file
 * This function removes any view that has been saved to the database.
 */

namespace Stanford\Utility\Install;

/**
 * Rebuild the node access database.
 */
class NodeAccessRebuild extends \AbstractInstallTask {


  public function execute(&$args = array()) {

    node_access_rebuild();
  }

}

