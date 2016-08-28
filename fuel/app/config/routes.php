<?php
return array(
	'_root_'  => 'yoshioka/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
	'search' => 'yoshioka/search',
	'logout' => 'yoshioka/logout',
);
