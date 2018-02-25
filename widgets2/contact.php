<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
<h2>Contact Us</h2>
<?php 
//email2.php

if(isset($_POST['Submit']))
{//send email?
    /*echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    */
    $to = "danielle.posadas@seattlecentral.edu";
    $subject = "My Website Feedback" . date("m/d/y, G:i:s");
    
    //collect and clean post data
    $FirstName = coffee_clean_post('FirstName');
    $LastName = coffee_clean_post('LastName');
    $Email = coffee_clean_post('Email');
    $Comments = coffee_clean_post('Comments');
    
    //build body of the email
    $text = ''; //initialize variable
    $text .= 'First Name: ' . $FirstName . PHP_EOL . PHP_EOL;
    $text .= 'Last Name: ' . $LastName . PHP_EOL . PHP_EOL;
    $text .= 'Email: ' . $Email . PHP_EOL . PHP_EOL;
    $text .= 'Comments: ' . $Comments . PHP_EOL . PHP_EOL;
    
    $headers = 'From: noreply@posadascoding.com' . PHP_EOL .
    'Reply-To: ' . $Email . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();
    
    mail($to,$subject,$text,$headers);
    
    echo '<div class="row"><div class="form-group col-lg-12">
    <h3>Message Sent</h3>
    <p>Thank you. We will contact you within 24 hours. </p>
    </div>
    </div>
    ';
                                            
} else {//show form!
    echo '
    <form action="contact.php" method="post">
    
    <div class="row">
        <div class="form-group col-lg-4">
            <label class="text-heading" for="FirstName">First Name</label>
            <input class="form-control" type="text" name="FirstName" id="FirstName" autofocus required />
        </div>
        
        <div class="form-group col-lg-4">
            <label class="text-heading" for="LastName">Last Name</label>
            <input class="form-control" type="text" name="LastName" id="LastName" required />
        </div>
        
        <div class="form-group col-lg-4">
            <label class="text-heading" for="Email">Email</label>
            <input class="form-control" type="email" name="Email" id="Email" required />
        </div>
        
        <div class="clearfix"></div>
        
        <div class="form-group col-lg-12">
            <label class="text-heading" for="Comments">Comments</label>
            <textarea class="form-control" name="Comments" id="Comments"></textarea>
        </div>
        
        <div class="form-group col-lg-12">
            <button type="submit" class="btn btn-secondary" name="Submit">Submit</button>
        </div>
    </div>
    </form> 
    ';
}

?>
<?php include 'includes/footer.php';

function coffee_clean_post($key){
    if(isset($_POST[$key])){
        return strip_tags(trim($_POST[$key]));
    }else{
        return '';
    }
}


?>