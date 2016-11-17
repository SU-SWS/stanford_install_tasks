<?php
/**
 * @file
 * Enable Courses
 */

namespace Stanford\JumpstartEngineering\Install\Courses;

/**
 *
 */
class EnableCourses extends \ITasks\AbstractInstallTask {

  /**
   * Enable Courses on JSE sites
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {

    module_load_include('module', 'redirect', 'redirect.module');
    module_load_include('module', 'features', 'features.module');
    $modules = array('stanford_feeds_helper', 'stanford_courses',
      'stanford_course_views', 'stanford_courses_administration');

    if (module_enable($modules, TRUE)) {
      // Todo: revert stanford_course_views
      //features_revert(array('stanford_course_views' => array('views_view')));
      //features_revert_module('stanford_course_views');
      drush_log('Enabled modules: ' . implode(', ', $modules), 'ok');
    } else
    {
      drush_log('Error when enabling modules: ' . implode(', ', $modules), 'notice');
      exit();
    }

    // Unpublish courses node
    $query = new \EntityFieldQuery();

    $entities = $query->entityCondition('entity_type', 'node')
                      ->propertyCondition('type', 'stanford_page')
                      ->propertyCondition('title', 'Courses')
                      ->execute();

    if (!empty($entities['node'])) {
      $node = node_load(array_shift(array_keys($entities['node'])));
      path_node_delete($node);
      $node->status = 0;
      $node->title = 'Courses Deprecated';
      $node->path['alias'] = 'courses-deprecated';
      $node->path['pathauto'] = 0;
      $node->menu = array(
        'enabled' => 0,
      );
      node_save($node);
      redirect_delete_by_path('courses');
      redirect_delete_by_path('about/courses');
      path_delete(array('source'=>'courses'));
      path_delete(array('source'=>'about/courses'));
      drush_log('Unpublished node: ' . $node->title . ' ' . $node->nid, 'ok');
    }
  }

}
