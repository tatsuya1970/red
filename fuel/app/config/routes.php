<?php
return array(
	'_root_'  => 'yoshioka/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
	'search' => 'yoshioka/search',
	'search_api' => 'yoshioka/search_api',
	'profile' => 'yoshioka/profile',
	'profile_edit' => 'yoshioka/profile_edit',
	'logout' => 'yoshioka/logout',
);
