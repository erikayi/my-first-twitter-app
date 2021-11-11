<?php

require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/

$settings = array(
    "oauth_access_token" => "1328893583609487361-0cHnSIcI0190Ld9ctR9SIc6qFoVSOV",
    "oauth_access_token_secret" => "l7QQ31g3apjCCzacfdjkATeb0xcPpWXx0OOwXxheeBGlk",
    "consumer_key" => "fbJDaS4NXzIWb0EYccPzxSymL",
    "consumer_secret" => "Ncj80SFzBVwFfYjviMKb11Q3oF2tpKMVVGEpsbkbUMThKNAUtl"
);

$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";
if (isset($_GET['user']))  {$user = preg_replace("/[^A-Za-z0-9_]/", '', $_GET['user']);}  
else {$user  = "iagdotme";}
if (isset($_GET['count']) && is_numeric($_GET['count']) {$count = $_GET['count'];} 
else {$count = 20;}$getfield = "?screen_name=$user&count=$count&tweet_mode=extended";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);
if(array_key_exists("errors", $string)) 

{echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";
exit();}

foreach($string as $items)    {        
    echo "Time and Date of Tweet: ".$items['created_at']."<br />";        
    echo "Tweet: ". $items['full_text']."<br />";        
    echo "Tweeted by: ". $items['user']['name']."<br />";        
    echo "Screen name: ". $items['user']['screen_name']."<br />";        
    echo "Followers: ". $items['user']['followers_count']."<br />";        
    echo "Friends: ". $items['user']['friends_count']."<br />";        
    echo "Listed: ". $items['user']['listed_count']."<br /><hr />";    
    }
?>