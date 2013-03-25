<?php
session_start();
if(isset($_REQUEST['logout'])){
    if("true" == strtolower($_REQUEST['logout'])){
        session_destroy();
        header("location:index.php");
    }
} elseif(!isset($_SESSION['loggedin'])){
    header("location:index.php");
}
$user=$_SESSION['loggedin'];
function get_title(){return "The Stock Market Game";}
function get_script(){return "script/play.js";}
$style ="css/play.css";
$connect = mysql_connect("localhost","econ_craftU4c8n",":(].vNI9c!n0") or die("Could not connect to Database");
$select = mysql_select_db("econ_craft", $connect);
$query  = "SELECT * FROM Users WHERE Username='$user' LIMIT 1";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_assoc($result)) {
    $email = $row['Email'];
}
include 'php/header.php';
$grhash = md5( strtolower( trim( $email ) ) );
?>
<div id="first"class="pull-left">
    <a id="propic"href="http://www.gravatar.com/<?php echo $grhash;?>">
        <img src="http://www.gravatar.com/avatar/<?php echo $grhash."?d=".urlencode( 'http://assets.zombiehippie.com/avatar.jpg' );?>" alt="Gravatar"></img>
    </a>
    <ul class="nav nav-list">
        <li>
            <a href="?profile=<?php echo $user?>"><i class="icon-user"></i><?php echo $user?></a>
        </li><li>
            <a href="?view=overview"><i class="icon-check"></i>Overview</a>
        </li><li id="Stocks">
            <a href="#" onclick="$('#stock-nav').toggle();"><i class="icon-list"></i>Stocks</a>
        </li>
    </ul>
    <ul id="stock-nav"class="nav nav-list">
        <li>
            <a href=""><i></i>Buy Shares</a>
        </li>
        <li>
            <a href=""><i></i>Sell Shares</a>
        </li>
    </ul>
    <ul class="nav nav-list">
        <li class="divider"></li><li>
            <a href="?logout=true">Log out</a>
        </li>
    </ul>
</div>
<div id="last">

</div>
<?php
include 'php/footer.php'
?>