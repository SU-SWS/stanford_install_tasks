<?php

namespace Stanford\JumpstartLab\Install\CAPx;

use \ITasks\AbstractInstallTask;

/**
 * Class CAPxConfig.
 */
class CAPxConfigChange extends AbstractInstallTask {

  /**
   * Configure CAPx.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {
    db_update('capx_cfe')
      ->fields(array(
        'machine_name' => 'labs_default',
        'title' => t('LABs Default'),
      ))
      ->condition('machine_name', 'jse_default')
      ->execute();
  }

}
