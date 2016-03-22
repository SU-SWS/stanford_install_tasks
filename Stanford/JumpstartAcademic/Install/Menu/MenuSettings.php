<?php
/**
 * @file
 * Abstract Task Class.
 */

namespace Stanford\JumpstartAcademic\Install\Menu;
/**
 *
 */
class MenuSettings extends \AbstractInstallTask {

  /**
   * Set the site name.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {

    $items = array();

    // Rebuild the menu cache before starting this.
    drupal_static_reset();
    menu_cache_clear_all();
    menu_rebuild();

    // News Landing
    $items['news'] = array(
      'link_path' => drupal_get_normal_path('news'),
      'link_title' => 'News',
      'menu_name' => 'main-menu',
      'weight' => -9,
    );
    // News / Recent News
    $items['news/recent-news'] = array(
      'link_path' => 'news/recent-news',
      'link_title' => 'Recent News',
      'menu_name' => 'main-menu',
      'weight' => -10,
      'router_path' => 'news/recent-news',
      'parent' => 'news',
      'customized' => 1,
    );
    // News / Subscribe
    $items['news/subscribe'] = array(
      'link_path' => drupal_get_normal_path('news/subscribe'),
      'link_title' => 'Subscribe',
      'menu_name' => 'main-menu',
      'weight' => -9,
      'router_path' => 'news/subscribe',
      'parent' => 'news',
      'customized' => 1,
    );
    // Events Landing
    $items['events'] = array(
      'link_path' => drupal_get_normal_path('events'),
      'link_title' => 'Events',
      'menu_name' => 'main-menu',
      'weight' => -8,
    );
    // Events / Upcoming
    $items['events/upcoming-events'] = array(
      'link_path' => 'events/upcoming-events',
      'link_title' => 'Upcoming Events',
      'menu_name' => 'main-menu',
      'weight' => -10,
      'parent' => 'events',
      'router_path' => 'events/upcoming-events',
      'customized' => 1,
    );
    // Events / Past
    $items['events/past-events'] = array(
      'link_path' => 'events/past-events',
      'link_title' => 'Past Events',
      'menu_name' => 'main-menu',
      'weight' => -9,
      'parent' => 'events',
      'router_path' => 'events/past-events',
      'customized' => 1,
    );
    // Gallery
    $items['news/gallery'] = array(
      'link_path' => drupal_get_normal_path('news/gallery'),
      'link_title' => 'Gallery',
      'menu_name' => 'main-menu',
      'weight' => -8,
      'parent' => 'news',
      'customized' => 1,
    );
    // Research
    $items['research'] = array(
      'link_path' => drupal_get_normal_path('research'),
      'link_title' => 'Research',
      'menu_name' => 'main-menu',
      'weight' => -7,
    );
    // People
    $items['people'] = array(
      'link_path' => drupal_get_normal_path('people'),
      'link_title' => 'People',
      'menu_name' => 'main-menu',
      'weight' => -6,
    );
    // Programs
    $items['programs'] = array(
      'link_path' => drupal_get_normal_path('programs'),
      'link_title' => 'Programs',
      'menu_name' => 'main-menu',
      'weight' => -5,
    );
    // About
    $items['about'] = array(
      'link_path' => drupal_get_normal_path('about'),
      'link_title' => 'About',
      'menu_name' => 'main-menu',
      'weight' => -4,
    );
    // About / About Us
    $items['about/about-us'] = array(
      'link_path' => drupal_get_normal_path('about/about-us'),
      'link_title' => 'About Us',
      'menu_name' => 'main-menu',
      'weight' => -8,
      'parent' => 'about', // must be saved prior to contact item.
    );
    // About / Contact
    $items['about/contact'] = array(
      'link_path' => drupal_get_normal_path('about/contact'),
      'link_title' => 'Contact',
      'menu_name' => 'main-menu',
      'weight' => -7,
      'parent' => 'about', // must be saved prior to contact item.
    );
    
    /////////////////////////////////////////////////////////////////////////////
    // Jumpstart Academic Main Menus
    /////////////////////////////////////////////////////////////////////////////
    
    // Academics
    $items['academics'] = array(
      'link_path' => drupal_get_normal_path('academics'),
      'link_title' => 'Academics',
      'menu_name' => 'main-menu',
      'weight' => -48,
    );  
    // Academics Overview
    $items['academics/academics-overview'] = array(
      'link_path' => drupal_get_normal_path('academics/academics-overview'),
      'link_title' => 'Overview',
      'menu_name' => 'main-menu',
      'weight' => -50,
      'parent' => 'academics',
    );    
    // Undergraduate Program
    $items['academics/undergraduate-program'] = array(
      'link_path' => drupal_get_normal_path('academics/undergraduate-program'),
      'link_title' => 'Undergraduate Program',
      'menu_name' => 'main-menu',
      'weight' => -48,
      'parent' => 'academics',
    );   
    // Major
    $items['academics/undergraduate-program/major'] = array(
      'link_path' => drupal_get_normal_path('academics/undergraduate-program/major'),
      'link_title' => 'Major',
      'menu_name' => 'main-menu',
      'weight' => -48,
      'parent' => 'academics/undergraduate-program',
    );
    // Minor
    $items['academics/undergraduate-program/minor'] = array(
      'link_path' => drupal_get_normal_path('academics/undergraduate-program/minor'),
      'link_title' => 'Minor',
      'menu_name' => 'main-menu',
      'weight' => -46,
      'parent' => 'academics/undergraduate-program',
    );
    // Honors
    $items['academics/undergraduate-program/honors'] = array(
      'link_path' => drupal_get_normal_path('academics/undergraduate-program/honors'),
      'link_title' => 'Honors',
      'menu_name' => 'main-menu',
      'weight' => -44,
      'parent' => 'academics/undergraduate-program',
    );
    // Coterminal Masters
    $items['academics/undergraduate-program/coterminal-masters'] = array(
      'link_path' => drupal_get_normal_path('academics/undergraduate-program/coterminal-masters'),
      'link_title' => 'Coterminal Masters',
      'menu_name' => 'main-menu',
      'weight' => -42,
      'parent' => 'academics/undergraduate-program',
    );
    // How to Declare
    $items['academics/undergraduate-program/how-declare'] = array(
      'link_path' => drupal_get_normal_path('academics/undergraduate-program/how-declare'),
      'link_title' => 'How to Declare',
      'menu_name' => 'main-menu',
      'weight' => -40,
      'parent' => 'academics/undergraduate-program',
    );
    // Preparing to Graduate
    $items['academics/undergraduate-program/preparing-graduate'] = array(
      'link_path' => drupal_get_normal_path('academics/undergraduate-program/preparing-graduate'),
      'link_title' => 'Preparing to Graduate',
      'menu_name' => 'main-menu',
      'weight' => -38,
      'parent' => 'academics/undergraduate-program',
    );
    // Peer Advisors
    $items['academics/undergraduate-program/peer-advisors'] = array(
      'link_path' => drupal_get_normal_path('academics/undergraduate-program/peer-advisors'),
      'link_title' => 'Peer Advisors',
      'menu_name' => 'main-menu',
      'weight' => -36,
      'parent' => 'academics/undergraduate-program',
    );
    // Forms
    $items['academics/undergraduate-program/forms'] = array(
      'link_path' => drupal_get_normal_path('academics/undergraduate-program/forms'),
      'link_title' => 'Forms',
      'menu_name' => 'main-menu',
      'weight' => -34,
      'parent' => 'academics/undergraduate-program',
    );
    // Resources
    $items['academics/undergraduate-program/resources'] = array(
      'link_path' => drupal_get_normal_path('academics/undergraduate-program/resources'),
      'link_title' => 'Resources',
      'menu_name' => 'main-menu',
      'weight' => -32,
      'parent' => 'academics/undergraduate-program',
    );  
    // Graduate Programs
    $items['academics/graduate-programs'] = array(
      'link_path' => drupal_get_normal_path('academics/graduate-programs'),
      'link_title' => 'Graduate Programs',
      'menu_name' => 'main-menu',
      'weight' => -46,
      'parent' => 'academics',
    );  
    // Doctoral Program
    $items['academics/graduate-programs/doctoral-program'] = array(
      'link_path' => drupal_get_normal_path('academics/graduate-programs/doctoral-program'),
      'link_title' => 'Doctoral Program',
      'menu_name' => 'main-menu',
      'weight' => -50,
      'parent' => 'academics/graduate-programs',
    );   
    // Requirements
    $items['academics/graduate-programs/doctoral-program/requirements'] = array(
      'link_path' => drupal_get_normal_path('academics/graduate-programs/doctoral-program/requirements'),
      'link_title' => 'Requirements',
      'menu_name' => 'main-menu',
      'weight' => -50,
      'parent' => 'academics/graduate-programs/doctoral-program',
    ); 
    // How to Apply
    $items['academics/graduate-programs/doctoral-program/how-apply'] = array(
      'link_path' => drupal_get_normal_path('academics/graduate-programs/doctoral-program/how-apply'),
      'link_title' => 'How to Apply',
      'menu_name' => 'main-menu',
      'weight' => -48,
      'parent' => 'academics/graduate-programs/doctoral-program',
    ); 
    // Masters Program
    $items['academics/graduate-programs/masters-program'] = array(
      'link_path' => drupal_get_normal_path('academics/graduate-programs/masters-program'),
      'link_title' => 'Masters Program',
      'menu_name' => 'main-menu',
      'weight' => -48,
      'parent' => 'academics/graduate-programs',
    );
    // Requirements
    $items['academics/graduate-programs/masters-program/requirements'] = array(
      'link_path' => drupal_get_normal_path('academics/graduate-programs/masters-program/requirements'),
      'link_title' => 'Requirements',
      'menu_name' => 'main-menu',
      'weight' => -50,
      'parent' => 'academics/graduate-programs/masters-program',
    );
    // How to Apply
    $items['academics/graduate-programs/masters-program/how-apply'] = array(
      'link_path' => drupal_get_normal_path('academics/graduate-programs/masters-program/how-apply'),
      'link_title' => 'How to Apply',
      'menu_name' => 'main-menu',
      'weight' => -48,
      'parent' => 'academics/graduate-programs/masters-program',
    );
      
    // Graduate Admissions
    $items['academics/graduate-programs/graduate-admissions'] = array(
      'link_path' => drupal_get_normal_path('academics/graduate-programs/graduate-admissions'),
      'link_title' => 'Graduate Admissions',
      'menu_name' => 'main-menu',
      'weight' => -46,
      'parent' => 'academics/graduate-programs',
    );
    // Forms
    $items['academics/graduate-programs/forms'] = array(
      'link_path' => drupal_get_normal_path('academics/graduate-programs/forms'),
      'link_title' => 'Forms',
      'menu_name' => 'main-menu',
      'weight' => -44,
      'parent' => 'academics/graduate-programs',
    );
    // Resources
    $items['academics/graduate-programs/resources'] = array(
      'link_path' => drupal_get_normal_path('academics/graduate-programs/resources'),
      'link_title' => 'Resources',
      'menu_name' => 'main-menu',
      'weight' => -42,
      'parent' => 'academics/graduate-programs',
    );
    // Job Placement
    $items['academics/graduate-programs/job-placement'] = array(
      'link_path' => drupal_get_normal_path('academics/graduate-programs/job-placement'),
      'link_title' => 'Job Placement',
      'menu_name' => 'main-menu',
      'weight' => -40,
      'parent' => 'academics/graduate-programs',
    );
    // Courses
    $items['courses'] = array(
      'link_path' => drupal_get_normal_path('courses'),
      'link_title' => 'Courses',
      'menu_name' => 'main-menu',
      'weight' => -8,
      'customized' => 1,
    );
    // People
    $items['people'] = array(
      'link_path' => drupal_get_normal_path('people'),
      'link_title' => 'People',
      'menu_name' => 'main-menu',
      'weight' => -7,
    );
    // Faculty
    $items['people/faculty'] = array(
      'link_path' => drupal_get_normal_path('people/faculty'),
      'link_title' => 'Faculty',
      'menu_name' => 'main-menu',
      'weight' => -10,
      'customized' => 1,
      'parent' => 'people',
    );
    // Faculty
    $items['people/students'] = array(
      'link_path' => drupal_get_normal_path('people/students'),
      'link_title' => 'Students',
      'menu_name' => 'main-menu',
      'weight' => -8,
      'customized' => 1,
      'parent' => 'people',
    );
    // Staff
    $items['people/staff'] = array(
      'link_path' => drupal_get_normal_path('people/staff'),
      'link_title' => 'Staff',
      'menu_name' => 'main-menu',
      'weight' => -6,
      'customized' => 1,
      'parent' => 'people',
    );
    // Publications
    $items['publications'] = array(
      'link_path' => drupal_get_normal_path('publications'),
      'link_title' => 'Publications',
      'menu_name' => 'main-menu',
      'weight' => -6,
      'customized' => 1,
    );
    // News Landing
    $items['news'] = array(
      'link_path' => drupal_get_normal_path('news'),
      'link_title' => 'News',
      'menu_name' => 'main-menu',
      'weight' => -5,
    );
    // News / Recent News
    $items['news/recent-news'] = array(
      'link_path' => 'news/recent-news',
      'link_title' => 'Recent News',
      'menu_name' => 'main-menu',
      'weight' => -9,
      'parent' => 'news',
      'customized' => 1,
    );
    // News / Department Newsletter
    $items['news/department-newsletter'] = array(
      'link_path' => drupal_get_normal_path('news/department-newsletter'),
      'link_title' => 'Newsletter',
      'menu_name' => 'main-menu',
      'weight' => -8,
      'parent' => 'news',
    ); 
    // News / subscribe
    $items['news/subscribe'] = array(
      'link_path' => drupal_get_normal_path('news/subscribe'),
      'link_title' => 'Subscribe',
      'menu_name' => 'main-menu',
      'weight' => -7,
      'parent' => 'news',
    );
    // Events Landing
    $items['events'] = array(
      'link_path' => drupal_get_normal_path('events'),
      'link_title' => 'Events',
      'menu_name' => 'main-menu',
      'weight' => -4,
    ); 
    // Events / Upcoming
    $items['events/upcoming-events'] = array(
      'link_path' => drupal_get_normal_path('events/upcoming-events'),
      'link_title' => 'Upcoming Events',
      'menu_name' => 'main-menu',
      'weight' => -10,
      'parent' => 'events',
      'router_path' => 'events/upcoming-events',
      'customized' => 1,
    ); 
    // Events / Past
    $items['events/past-events'] = array(
      'link_path' => drupal_get_normal_path('events/past-events'),
      'link_title' => 'Past Events',
      'menu_name' => 'main-menu',
      'weight' => -9,
      'parent' => 'events',
      'router_path' => 'events/past-events',
      'customized' => 1,
    );
    // About
    $items['about'] = array(
      'link_path' => drupal_get_normal_path('about'),
      'link_title' => 'About',
      'menu_name' => 'main-menu',
      'weight' => -3,
    );  
    // About / Overview
    $items['about/overview'] = array(
      'link_path' => drupal_get_normal_path('about/about-us'),
      'link_title' => 'Overview',
      'menu_name' => 'main-menu',
      'weight' => -10,
      'parent' => 'about', // must be saved prior to overview item.
    );
    // About / location
    $items['about/location'] = array(
      'link_path' => drupal_get_normal_path('about/location'),
      'link_title' => 'Location',
      'menu_name' => 'main-menu',
      'weight' => -8,
      'parent' => 'about', // must be saved prior to contact item.
    );
    // About / Contact
    $items['about/contact'] = array(
      'link_path' => drupal_get_normal_path('about/contact'),
      'link_title' => 'Contact',
      'menu_name' => 'main-menu',
      'weight' => -6,
      'parent' => 'about', // must be saved prior to web-access item.
    ); 
    // About / affiliated-programs
    $items['about/affiliated-programs'] = array(
      'link_path' => drupal_get_normal_path('about/affiliated-programs'),
      'link_title' => 'Affiliated Programs',
      'menu_name' => 'main-menu',
      'weight' => -4,
      'parent' => 'about', // must be saved prior to contact item.
    );
    // About / Make a Gift
    $items['about/giving'] = array(
      'link_path' => drupal_get_normal_path('about/giving'),
      'link_title' => 'Make A Gift',
      'menu_name' => 'main-menu',
      'weight' => -2,
      'parent' => 'about', // must be saved prior to web-access item.
    );
    
    /////////////////////////////////////////////////////////////////////////////
    // Footer Menus
    /////////////////////////////////////////////////////////////////////////////
    
    // About
    $items['about'] = array(
      'link_path' => drupal_get_normal_path('about'),
      'link_title' => 'About Us',
      'menu_name' => 'menu-footer-about-menu',
      'weight' => -50,
    );
    // Affiliated Programs
    $items['about/affiliated-programs'] = array(
      'link_path' => drupal_get_normal_path('about/affiliated-programs'),
      'link_title' => 'Affiliated Programs',
      'menu_name' => 'menu-footer-about-menu',
      'weight' => -48,
    );
    // Location
    $items['about/location'] = array(
      'link_path' => drupal_get_normal_path('about/location'),
      'link_title' => 'Location',
      'menu_name' => 'menu-footer-about-menu',
      'weight' => -46,
    );
    // Contact
    $items['about/contact'] = array(
      'link_path' => drupal_get_normal_path('about/contact'),
      'link_title' => 'Contact',
      'menu_name' => 'menu-footer-about-menu',
      'weight' => -44,
    );
    // Make a Gift
    $items['about/giving'] = array(
      'link_path' => drupal_get_normal_path('about/giving'),
      'link_title' => 'Make a Gift',
      'menu_name' => 'menu-footer-about-menu',
      'weight' => -42,
    );
    
    // -------------------------------------------------------------------------
    
    // Overview
    $items['academics/academics-overview'] = array(
      'link_path' => drupal_get_normal_path('academics/academics-overview'),
      'link_title' => 'About Us',
      'menu_name' => 'menu-footer-academics-menu',
      'weight' => -50,
    );   
    // Undergraduate Program
    $items['academics/undergraduate-program'] = array(
      'link_path' => drupal_get_normal_path('academics/undergraduate-program'),
      'link_title' => 'Undergraduate Program',
      'menu_name' => 'menu-footer-academics-menu',
      'weight' => -48,
    );    
    // Graduate Program
    $items['academics/graduate-programs'] = array(
      'link_path' => drupal_get_normal_path('academics/graduate-programs'),
      'link_title' => 'Graduate Programs',
      'menu_name' => 'menu-footer-academics-menu',
      'weight' => -46,
    );   
    // Courses
    $items['courses'] = array(
      'link_path' => drupal_get_normal_path('courses'),
      'link_title' => 'Courses',
      'menu_name' => 'menu-footer-academics-menu',
      'weight' => -44,
    );
    
    // -------------------------------------------------------------------------
    
    // Department Newsletter
    $footer_news_events['news/department-newsletter'] = array(
      'link_path' => drupal_get_normal_path('news/department-newsletter'),
      'link_title' => 'Department Newsletter',
      'menu_name' => 'menu-footer-news-events-menu',
      'weight' => -50,
    );
    // Recent News
    $footer_news_events['news/recent-news'] = array(
      'link_path' => drupal_get_normal_path('news/recent-news'),
      'link_title' => 'Recent News',
      'menu_name' => 'menu-footer-news-events-menu',
      'weight' => -48,
    );
    // Subscribe
    $footer_news_events['news/subscribe'] = array(
      'link_path' => drupal_get_normal_path('news/subscribe'),
      'link_title' => 'Subscribe',
      'menu_name' => 'menu-footer-news-events-menu',
      'weight' => -46,
    );
    // Upcoming events
    $footer_news_events['events/upcoming-events'] = array(
      'link_path' => drupal_get_normal_path('events/upcoming-events'),
      'link_title' => 'Upcoming Events',
      'menu_name' => 'menu-footer-news-events-menu',
      'weight' => -44,
      'router_path' => 'events/upcoming-events',
      'customized' => 1,
    );
    
    // -------------------------------------------------------------------------
    
    // Faculty
    $items['people/faculty'] = array(
      'link_path' => drupal_get_normal_path('people/faculty'),
      'link_title' => 'Faculty',
      'menu_name' => 'menu-footer-people-menu',
      'weight' => -50,
    );
    // Students
    $items['people/students'] = array(
      'link_path' => drupal_get_normal_path('people/students'),
      'link_title' => 'Students',
      'menu_name' => 'menu-footer-people-menu',
      'weight' => -48,
    );
    // Staff
    $items['people/staff'] = array(
      'link_path' => drupal_get_normal_path('people/staff'),
      'link_title' => 'Staff',
      'menu_name' => 'menu-footer-people-menu',
      'weight' => -46,
    );

    // Loop through each of the items and save them.
    foreach ($items as $k => $v) {

      // Check to see if there is a parent declaration. If there is then find
      // the mlid of the parent item and attach it to the menu item being saved.
      if (isset($v['parent'])) {
        $v['plid'] = $items[$v['parent']]['mlid'];
        unset($v['parent']); // Remove fluff before save.
      }

      // Save the menu item.
      $mlid = menu_link_save($v);
      $v['mlid'] = $mlid;
      $items[$k] = $v;

    }

    // The home link weight needs to change.
    $home_search = db_select('menu_links', 'ml')
      ->fields('ml', array('mlid'))
      ->condition('menu_name', 'main-menu')
      ->condition('link_path', '<front>')
      ->condition('link_title', 'Home')
      ->execute()
      ->fetchAssoc();

    if (is_numeric($home_search['mlid'])) {
      $menu_link = menu_link_load($home_search['mlid']);
      $menu_link['weight'] = -50;
      menu_link_save($menu_link);
    }

  }

}
