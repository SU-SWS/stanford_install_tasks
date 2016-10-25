<?php
/**
 * @file
 * Enables modules and site configuration for a minimal site installation.
 */

 /**
  * Include the files necessary to do the install tasks.
  */
function itasks_includes() {
  // Things take a long time to run. Lets try to up the limit.
  // 300 seconds = 5 minutes.
  ini_set('max_execution_time', 300);
  require_once dirname(__FILE__) . "/InstallTaskInterface.php";
  require_once dirname(__FILE__) . "/AbstractTask.php";
  require_once dirname(__FILE__) . "/AbstractInstallTask.php";
  require_once dirname(__FILE__) . "/AbstractUpdateTask.php";
  require_once dirname(__FILE__) . "/TaskEngine.php";
}

/**
 * The task execution function.
 *
 * Drupal needs a function name that it can call for each task and this is it.
 * The name of the task is provided in the install_state array so load it up
 * and execute it.
 *
 * @param $install_state
 */
function itask_run_install_task(&$install_state) {
  itasks_includes();
  $engine = new TaskEngine($install_state['profile_info'], $install_state);

  $tasks = $engine->getTasks("install");
  $extras = $engine->getTasks($engine->getExtraTasksName());

  // Add any extra tasks we want to run.
  if (!empty($extras)) {
    $tasks = $tasks + $extras;
  }

  if (function_exists('drush_log')) {
    $time = microtime(TRUE);
    drush_log("Executing: " . $install_state['active_task'], 'ok');
  }

  // Call the bloody thing.
  $tasks[$install_state['active_task']]->execute($install_state);

  if (function_exists("drush_log")) {
    $now = microtime(TRUE);
    $diff = round($now - $time, 3);
    drush_log("Finished executing in: " . $diff . " seconds", "ok");
  }

}
