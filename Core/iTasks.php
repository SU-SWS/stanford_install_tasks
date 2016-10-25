<?php
/**
 * @file
 * Enables modules and site configuration for a minimal site installation.
 */



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
