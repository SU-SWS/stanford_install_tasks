<?php

/**
 * During the early parts of the installation process there is not a good way
 * to include dependencies. So this is why this ugly little guy is here.
 */

 /**
  * Include the files necessary to do the install tasks.
  */
 function itasks_includes() {

   // Things take a long time to run. Lets try to up the limit.
   ini_set('max_execution_time', 300); //300 seconds = 5 minutes

   require_once dirname(__FILE__) . "/InstallTaskInterface.php";
   require_once dirname(__FILE__) . "/AbstractTask.php";
   require_once dirname(__FILE__) . "/AbstractInstallTask.php";
   require_once dirname(__FILE__) . "/AbstractUpdateTask.php";
   require_once dirname(__FILE__) . "/TaskEngine.php";
   require_once dirname(__FILE__) . "/iTasks.php";

 }
