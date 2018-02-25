<?php 
/* config.php for widgets
put configuration information here

*/
// functions to debug
define('DEBUG',TRUE); #we want to see all errors

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

$nav1['index.php'] = 'HOME';
$nav1['customers.php'] = 'CUSTOMERS';
$nav1['daily.php'] = 'DAILY';
$nav1['oscarmovies_list.php'] = 'MOVIES';
$nav1['contact.php'] = 'CONTACT US1';
$nav1['contact2.php'] = 'CONTACT US2';

//defaults for header.php
$banner = 'WIDGETS';
$slogan = 'The Widgets with the Mostest!';

switch(THIS_PAGE){
    case 'template.php':
        $title = 'Template page';
        $PageID = 'Template';
        $logo = 'fa-home';
    break;
    
    case 'index.php':
        $title = 'Home';
        $PageID = 'Welcome';
        $logo = 'fa-home';
    break;

    case 'customers.php':
        $title = 'Customers';
        $PageID = 'Customers';
        $logo = 'fa-users';
    break;
        
    case 'daily.php':
        $title = 'Daily Specials';
        $PageID = 'Daily Specials';
        $logo = 'fa-calendar-alt';
    break;
    
    case 'oscarmovies_list.php':
        $title = 'Oscar Movies';
        $PageID = 'Oscar Nominated Movies';
        $logo = 'fa-film';
    break;
        
    case 'contact.php':
        $title = 'Contact Us';
        $PageID = 'Contact Us';
        $logo = 'fa-envelope';
    break;
    
    case 'contact2.php':
        $title = 'Contact Us More';
        $PageID = 'Detailed Contact Us';
        $logo = 'fa-envelope';
    break;
    
    default:
        $title = THIS_PAGE;
        $PageID = '';
        $logo = 'fa-arrow-alt-circle-down';
}

//other include files referenced here
include 'credentials.php';

// Error messaging function
function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
        echo "I'm sorry, we have encountered an error.";
        die();
    }
}

//nav function
function coffee_links($nav1){
    
foreach($nav1 as $url => $text){
    //echo '<li><a href="' . $url . '">' . $text . '</a></li>';
    
    if(THIS_PAGE == $url)
    {//current page-add highlight
        echo '
         <li class="nav-item active px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="' . $url . '">' . $text . '</a>
         </li>
        ';
    }else{//no highlight
        echo '
         <li class="nav-item px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="' . $url . '">' . $text . '</a>
         </li>
        '; 
    }
}

}//end coffee_links() function

?>