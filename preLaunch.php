<?php 
    require_once("includes/connectionNew.php");

    if (isset($_POST["submit"])) {

            $email = ($_POST["email"]);            
        } else {
            $email = "";
        }    
    
    if (isset($_POST["submit"])) {
        if (empty($email)) {
                echo "Please enter a valid email ";
            } else {
                if(isset($_POST["submit"])) {
                    $query = "INSERT INTO preLaunchEmails (email) VALUES ('{$email}')";
                    $result = mysqli_query($connection, $query); 
                    
                    if($result) {
                        $message =   "Thank you for subscribing!"; 
                    } else {
                        $message = "Sorry, something went wrong. Please try again."; 
                    }
                        echo $message; 
                        header('refresh: 5; url=index.html'); 
                        // note that exit is not required, HTML can be displayed ?>
<p>You will be redirected in <span id="counter">5</span> second(s).</p>
<script type="text/javascript">
function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=0) {
        location.href = 'index.html';
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script>

<?php
  exit;               }
            }
    }
?>
