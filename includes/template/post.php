<html>
    <?php 
        require_once("includes/connection.php");
    ?>
    <?php
        if (isset($_POST["submit"])) {
            $gamertag = ($_POST["Gamertag"]);
            $game = ($_POST["Game"]);
            $description = ($_POST["Description"]);
            $type = ($_POST["Type"]);
        } else {
            $gamertag = "";
            $game = "";
            $description = "";
            $type = "";
        }
    ?>
    
    <?php 
        if (isset($_POST["submit"])) {
            if (empty($gamertag)) {
                echo "Please enter a Gamertag: ";
            } else {
                if(isset($_POST["submit"])) {
                    $query = "INSERT INTO matchFinder (user, game, description, type) VALUES ('{$gamertag}', '{$game}', '{$description}', '{$type}')";
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
    ?>
    
    <form action="" method="post">
        <input type="text" name="Gamertag" value=""> <br />
        <select name="Game">
            <option value="BO3">Black Ops III</option>
            <option value="CSGO">CS:GO</option>
        </select> <br />
        <select name="Type">
            <option value="scrim">Scrim</option>
            <option value="8s">8's Lobby</option>
        </select> <br />
        <input type="text" name="Description" value=""> <br />
        <button class="btn btn-success" type="submit" name="submit" value="Submit">Post Match</button>
    </form>                    
</html>