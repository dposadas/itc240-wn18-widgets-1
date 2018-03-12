<?php
/*
config.php

stores configuration information for our web application

*/

//removes header already sent errors
ob_start();

define('SECURE',false); #force secure, https, for all site pages

define('PREFIX', 'widgets_wn18_'); #Adds uniqueness to your DB table names.  Limits hackability, naming collisions

header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching

define('DEBUG',true); #we want to see all errors

include 'credentials.php';//stores database info
include 'common.php';//stores favorite functions

//prevents date errors
date_default_timezone_set('America/Los_Angeles');

//create config object
$config = new stdClass;

//these are the navigation links
$config->nav1['index.php'] = 'HOME';
$config->nav1['customers.php'] = 'CUSTOMERS';
$config->nav1['daily.php'] = 'DAILY';
$config->nav1['oscarmovies_list.php'] = 'MOVIES';
$config->nav1['contact.php'] = 'CONTACT US1';
$config->nav1['contact2.php'] = 'CONTACT US2';

//create default page identifier
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//START NEW THEME STUFF - be sure to add trailing slash!
$sub_folder = 'widgets2/';//change to 'widgets' or 'sprockets' etc.
$config->theme = 'Coffee';//sub folder to themes

//will add sub-folder if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
//force secure website
if (SECURE && $_SERVER['SERVER_PORT'] != 443) {#force HTTPS
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}else{
    //adjust protocol
    $protocol = (SECURE==true ? 'https://' : 'http://'); // returns true
    
}
$config->virtual_path = $protocol . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;

define('ADMIN_PATH', $config->virtual_path . '/admin/'); # Could change to sub folder
define('INCLUDE_PATH', $config->physical_path . '/includes/');

//END NEW THEME STUFF

//set website defaults
$config->title = THIS_PAGE;
$config->banner = 'Widgets';
$config->slogan = 'The Widgets with the Mostest!';
$config->loadhead = '';//place items in <head> element

switch(THIS_PAGE){
     /*   
    case 'contact.php':    
        $config->title = 'Contact Page';    
    break;
    
    case 'appointment.php':    
        $config->title = 'Appointment Page';
        $config->banner = 'Widget Appointments!';
    break;
        
    case 'template.php':    
        $config->title = 'Template Page';    
    break;    */
    case 'template.php':
        $config->title = 'Template page';
        $config->PageID = 'Template';
        $config->logo = 'fa-home';
    break;

    case 'index.php':
        $config->title = 'Home';
        $config->PageID = 'Welcome';
        $config->logo = 'fa-home';
    break;

    case 'customers.php':
        $config->title = 'Customers';
        $config->PageID = 'Customers';
        $config->logo = 'fa-users';
    break;

    case 'daily.php':
        $config->title = 'Daily Specials';
        $config->PageID = 'Daily Specials';
        $config->logo = 'fa-calendar-alt';
    break;

    case 'oscarmovies_list.php':
        $config->title = 'Oscar Movies';
        $config->PageID = 'Oscar Nominated Movies';
        $config->logo = 'fa-film';
    break;

    case 'contact.php':
        $config->title = 'Contact Us';
        $config->PageID = 'Contact Us';
        $config->logo = 'fa-envelope';
    break;

    case 'contact2.php':
        $config->title = 'Contact Us More';
        $config->PageID = 'Detailed Contact Us';
        $config->logo = 'fa-envelope';
    break;

    default:
        $config->title = THIS_PAGE;
        $config->PageID = '';
        $config->logo = 'fa-arrow-alt-circle-down';
      
}

//START NEW THEME STUFF
//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . 'themes/' . $config->theme . '/';
//END NEW THEME STUFF

/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
if(startSession() && isset($_SESSION['AdminID']))
{#add admin logged in info to sidebar or nav
    
    $config->adminWidget = '
        <a href="' . ADMIN_PATH . 'admin_dashboard.php">ADMIN</a> 
        <a href="' . ADMIN_PATH . 'admin_logout.php">LOGOUT</a>
    ';
}else{//show login (YOU MAY WANT TO SET TO EMPTY STRING FOR SECURITY)
    
    $config->adminWidget = '
        <a  href="' . ADMIN_PATH . 'admin_login.php">LOGIN</a>
    ';
}
?>















