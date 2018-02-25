<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
<h2>Contact Us 2</h2>
<?php 
//contactus2.php  LARGE FORM

if(isset($_POST['Submit']))
{
    $to = "danielle.posadas@seattlecentral.edu";
    $subject = "Coffee Feedback" . date("m/d/y, G:i:s");
    
    //collect and clean post data
    $FirstName = coffee_cleanse_post('FirstName');
    $LastName = coffee_cleanse_post('LastName');
    $Email = coffee_cleanse_post('Email');
    $CoffeeCheckbox = coffee_cleanse_post('Interested');
    $MailList = coffee_cleanse_post('MailingList');
    $Comments = coffee_cleanse_post('Comments');
    
    //build body of the email
    $text = ''; //initialize variable
    $text .= 'First Name: ' . $FirstName . PHP_EOL . PHP_EOL;
    $text .= 'Last Name: ' . $LastName . PHP_EOL . PHP_EOL;
    $text .= 'Email: ' . $Email . PHP_EOL . PHP_EOL;
    $text .= 'Coffee Interests: ' . $CoffeeCheckbox . PHP_EOL . PHP_EOL;
    $text .= 'Join Mail List?: ' . $MailList . PHP_EOL . PHP_EOL;
    $text .= 'Comments: ' . $Comments . PHP_EOL . PHP_EOL;
    
    $headers = 'From: noreply@posadascoding.com' . PHP_EOL .
    'Reply-To: ' . $Email . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();
    
    mail($to,$subject,$text,$headers);
    
    echo '<div class="row"><div class="form-group col-lg-12">
    <h3>Your message was received!</h3>
    <p>Thank you. We will contact you within 24 hours. </p>
    </div>
    </div>
    ';
                                            
} else {
    echo '
    <form action="contact2.php" method="post">
    
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
            <fieldset>
            <legend>What are your coffee interests?:</legend>
            <input type="checkbox" name="Interested[]" value="Local Coffee Beans" tabindex="40" /> Local Coffee Beans <br />
            <input type="checkbox" name="Interested[]" value="International Coffee Beans" tabindex="40" /> International Coffee Beans <br />
            <input type="checkbox" name="Interested[]" value="Featured Drinks" tabindex="40" /> Featured Drinks <br />
            </fieldset>
        </div>
        
        <div class="form-group col-lg-12">
            <fieldset>
            <legend>Join our mailing list?</legend>
            <input type="radio" name="MailingList" value="Yes" 
            tabindex="50" checked="checked"
			/> Yes <br />
			<input type="radio" name="MailingList" value="No" /> No <br />
            </fieldset>
        </div>
        
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

function coffee_cleanse_post($key){
    if(isset($_POST[$key])){
        if(is_array($_POST[$key])){
           return (implode(", ",$_POST[$key])); 
        }else{
            return strip_tags(trim($_POST[$key]));
        }
    }else{
        return '';
    }
}


?>