<?php
//customer_view.php - shows details of a single customer
?>
<?php include 'includes/config.php';?>
<?php

//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:oscarmovies_list.php');
}


$sql = "select * from OscarMovies where MovieID = $id";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        
        $Movie = stripslashes($row['Title']);
        $Genre = stripslashes($row['Genre']);
        $Director = stripslashes($row['Director']);
        $Studio = stripslashes($row['Studio']);
        $Desc = stripslashes($row['Description']);
        $Year = stripslashes($row['Year']);
        $NumberNom = stripslashes($row['NumberNominations']);
        $title = "Title Page for " . $Movie;
        $pageID = $Movie;
        $Feedback = '';//no feedback necessary
    }    

}else{//inform there are no records
    $Feedback = '<p>This movie does not exist</p>';
}

?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
    
    
if($Feedback == '')
{//data exists, show it

    echo '<p>';
    echo 'Genre: <b>' . $Genre . '</b><br> ';
    echo 'Director: <b>' . $Director . '</b><br> ';
    echo 'Studio: <b>' . $Studio . '</b><br> ';
    echo 'Description: <b>' . $Desc . '</b><br> ';
    echo 'Year: <b>' . $Year . '</b><br> ';
    echo 'Number of Nominations: <b>' . $NumberNom . '</b><br> ';
    
    echo '<img src="uploads/movie' . $id . '.png" />';
    
    echo '</p>';
    echo '<br><small><i>Image courtesy of ' . $Studio . '<i></small>';
}else{//warn user no data
    echo $Feedback;
}    

echo '<p><a href="oscarmovies_list.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php include 'includes/footer.php';?>