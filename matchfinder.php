<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Perplex.GG</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->    
        <link href="css/styles.css" rel="stylesheet" type="text/css">
        <style>
            p {
                display: inline-block;   
            }
        </style>
    </head>
    <body data-navSetting="matchFinder">
        <?php 
            require_once("includes/connection.php"); 
            include_once("includes/template/nav.php");
        ?>
        <div class="content contentContainer">
            <div class="row">      
                <div class="col-md-6 col-md-offset-3 marginTop">
                    <?php
                        $data = "SELECT * FROM matchFinder";
                        $result = mysqli_query($connection, $data);
                     ?>
            
                    <h1>Match Finder</h1>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="divBox">
                        <div class="floatRight">
                            <p><?php echo $row["time"]; ?></p> <br />
                        </div>
                        <p>Gamertag: <?php echo $row["user"]; ?></p> <br />
                        <p>Game: <?php echo $row["game"]; ?></p> <br />
                        <p>Description: <?php echo $row["description"]; ?></p> <br />
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>    
    <script src="js/navSetting.js"></script>
    </body>    
</html>