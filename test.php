<?php 
    //Setup Autoloading && Propel
    require_once 'vendor/autoload.php';
    require_once 'config.php';

/*  Write To Database
    $user = new User();
    $user->setUsername('Matt');
    $user->save();
*/

/* Query DataBase */      
    $tweets = TweetQuery::create()
        ->limit(5)
        //->filterByTweet("%Hello%")
        ->find();

/*  Echo Tweets to JSON */
//echo $tweets->toJSON();

//Format Database Visually
foreach($tweets as $tweet) {
    ?>
    <div style="width:350px; height:75px; background-color:#ccc">
    
    
    
    <?php    
        echo $tweet->getTweet();
    ?>
        <br>
        <p>Tweeted By: 
    <?php    
        echo $tweet->getUser()->getUsername();
    ?>
    </p></div><br>
    <?php    
}
