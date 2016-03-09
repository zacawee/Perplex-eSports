<html>
    <?php 
        require_once("includes/connection.php");
    ?>
    <?php
        if (isset($_POST["submit"])) {
            $gamertag = ($_POST["Gamertag"]);
        } else {
            $gamertag = "";
        }
    ?>
    
    <?php 
        if (isset($_POST["submit"])) {
            if (empty($gamertag)) {
                echo "Please enter a Gamertag: ";
            } else {
                if(isset($_POST["submit"])) {
                    $query = "INSERT INTO matchFinder (user) VALUES ('{$gamertag}')";
                    $result = mysqli_query($connection, $query); 
                    
                    if($result) {
                        $message =   "Congratulations we are not complete retards! <3"; 
                    } else {
                        $message = "We fucked up, sorry <3"; 
                    }
                        echo $message;
                }
            }
        }
            
            //echo "Pre Query":
//            if (isset($_POST["submit"])) {
//                $query = "INSERT INTO matchFinder (user ('{$gamertag}'))";
//                $result = mysqli_query($connection, $query);
//                //echo "Post Query";
//                if ($result) {
//                    $message = "Congratulations we are not complete retards! <3";
//                } else {
//                    $message = "We fucked up, sorry <3";
//                }
//                
//                echo $message;
        
    ?>
    
    <form action="" method="post">
        <input type="text" name="Gamertag" value="">
        <button class="btn btn-success" type="submit" name="submit" value="Submit">Post Match</button>
    </form>                    
</html>