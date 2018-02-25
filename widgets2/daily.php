<?php include 'includes/config.php';?>
<?php
// daily logic goes here:

if($_GET['day'])
{ // data in querystring, use it!
    $day = $_GET['day'];
}else{//use current date
    $day = date('l');
}
?>
<?php
// dynamic information for each day goes here
switch($day)
{
    case 'Sunday':
        $myCoffee = "Dark Roast Coffee";
        $myPic = "images/darkroast.jpg";
        $myAlt = "Our dark roast coffees are full of flavor!";
        $myContent = "This simple dark roast blend is not plain and will make your $day snazzy!";
    break;
    case 'Monday':
        $myCoffee = "Latte";
        $myPic = "images/latte.jpg";
        $myAlt = "Latte's are delicious!";
        $myContent = "Classic latte is nothing ordinary and will make your $day classy.";
    break;    
    case 'Tuesday':
        $myCoffee = "Iced Coffee";
        $myPic = "images/icedcoffee.jpg";
        $myAlt = "Iced coffees will keep you cool!";
        $myContent = "This Iced Coffee is the perfect treat for a $day.";
    break;
    case 'Wednesday':
        $myCoffee = "Flat White";
        $myPic = "images/flatwhite.jpg";
        $myAlt = "Our Flat White Coffees are awesome!";
          $myContent = "The Flat White is spot on and will make your $day decorative.";
    break;
    case 'Thursday':
        $myCoffee = "Mocha";
        $myPic = "images/mocha.jpg";
        $myAlt = "Mochas are sweet and yummy!";
        $myContent = "These delightful hot Mochas will thaw even the coldest hearts, perfect for a $day date-night.";
    break;
    case 'Friday':
        $myCoffee = "Cappuccino";
        $myPic = "images/cappuccino.jpg";
        $myAlt = "Cappuccinos are foamy!";
        $myContent = "Our Cappuccinos are the foamiest in town and will make $day Fri-yay.";
    break;
    case 'Saturday':
        $myCoffee = "Americano";
        $myPic = "images/americano.jpg";
        $myAlt = "Americanos are flavorful!";
        $myContent = "Americanos are the perfect break and will provide a relaxing $day.";
    break;
}
?>
<?php include 'includes/header.php';?>
    <h2>Daily Page</h2>
    <p>Every day has a delightful coffee featured!</p>
    <p>Today is <?=$day?>.</p>
    <p>Today's coffee special is <b><?=$myCoffee?></b>.</p>
    <img src="<?=$myPic?>" alt="<?=$myAlt?>" />
    <p><?=$myContent?></p>
    <p>Plan out your week! View the specials for other days by clicking on the day below.</p>
    <p><a href="daily.php?day=Monday">Monday</a></p>
    <p><a href="daily.php?day=Tuesday">Tuesday</a></p>
    <p><a href="daily.php?day=Wednesday">Wednesday</a></p>
    <p><a href="daily.php?day=Thursday">Thursday</a></p>
    <p><a href="daily.php?day=Friday">Friday</a></p>
    <p><a href="daily.php?day=Saturday">Saturday</a></p>
    <p><a href="daily.php?day=Sunday">Sunday</a></p>

<?php include 'includes/footer.php'; ?>