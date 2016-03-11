<?php
    if (isset($_POST["submit"])) {
        $gamertag = ($_POST["Gamertag"]);
//       $game = ($_POST["Game"]);
//        $type = ($_POST["Type"]);
        $description = ($_POST["Description"]);
        } else {
            $gamertag = "";
            $game = "";
            $description "";
        }
    ?>
    
<?php 
    if (isset($_POST["submit"])) {
        if (empty($gamertag)) {
        echo "Please enter a Gamertag: ";
        } else {
        
            if(isset($_POST["submit"])) {
                $query = "INSERT INTO matchFinder (user, game, description) VALUES ('{$gamertag}', '{$game}', '{$description}')";
                $result = mysqli_query($connection, $query); 
            
            if($result) {
                $message =   "Submitted"; 
            } else {
                $message = "Error"; 
            }
                echo $message;
        }
    }
}
?>