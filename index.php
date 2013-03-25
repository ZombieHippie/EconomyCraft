<?php
session_start();
// store session data
if(isset($_SESSION['loggedin'])){
    header("location:play.php");
}
require 'php/phpass-0.3/PasswordHash.php';
$connect = mysql_connect("localhost","econ_craftU4c8n",":(].vNI9c!n0") or die("Could not connect to Database");
$select = mysql_select_db("econ_craft", $connect);
if(isset($_POST['username']) && isset($_POST['password'])){
    $user = $_POST['username'];
    $usernamequery = mysql_query("SELECT * FROM users WHERE Username='$user'");
    $t_hasher = new PasswordHash(8, TRUE);
    $query  = "SELECT * FROM Users WHERE Username='$user' LIMIT 1";
    $result = mysql_query($query) or die(mysql_error());
    $validLogin = FALSE;
    while($row = mysql_fetch_assoc($result)) {
        $userhash = $row['Password'];
        $validLogin = $t_hasher->CheckPassword($_POST['password'],$userhash);
    }
    unset($t_hasher);
    
    if($validLogin) {
        $_SESSION['loggedin']=$user;
        header("location:play.php");
    } else {
        $status = '<div class="alert alert-error">Login failed</div>';
    }

}
mysql_close();

function get_title(){
    return "Log in to The Stock Market Game";
}
function get_script(){
    return "";
}
$created = $_REQUEST['created'];
include 'php/header.php';
?>
<div class="container">
<div class="container loginform">
    <div class="propic"><img src="img/earth.jpg" alt="Profile Picture"></img></div>
    <h2>Welcome</h2>
    <form action="index.php" method="post">
        <?php echo $status?>
        <p id="userin">
        <input type="text" size="18" value="<?php echo $created;?>"
               placeholder="User name" name="username" >
        <input type="password" size="18"
               placeholder="Password" name="password">
        </p><p>
            <input class="btn-inverse" type="submit" value="Log in">
            <a href="new-user.php" class="pull-right">...or Register</a>
        </p>
        <span id="output"></span>
        <p id="pass"></p>
    </form>
</div>
</div>

<?php include 'php/footer.php'; ?>