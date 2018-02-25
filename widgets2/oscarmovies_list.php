<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>

<?php 
$sql = "select * from OscarMovies";

$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
    while ($row = mysqli_fetch_assoc($result))
    {
        echo '<p>';
        echo 'Title: <b>' . $row['Title'] . '</b> ';
        echo 'Genre: <b>' . $row['Genre'] . '</b> ';
        echo 'Director: <b>' . $row['Director'] . '</b> ';
        echo 'Studio: <b>' . $row['Studio'] . '</b> ';
        echo 'Description: <b>' . $row['Description'] . '</b> ';
        echo 'Year: <b>' . $row['Year'] . '</b> ';
        echo 'Number of Nominations: <b>' . $row['NumberNominations'] . '</b> ';
        
        echo '<a href="oscarmovies_view.php?id=' . $row['MovieID'] . '">' . $row['Title'] . '</a>';

        echo '</p>';
    }
    
}else{//no records
    echo '<div align="center">No movies? There must be a commercial break!!</div>';
}

@mysqli_free_result($result); #releases web server memory
@mysqli_close($iConn); #close connection to database

?>
 
<?php include 'includes/footer.php'; ?>