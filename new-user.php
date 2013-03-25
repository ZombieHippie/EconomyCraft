<?php
require 'php/phpass-0.3/PasswordHash.php';
$connect = mysql_connect("localhost","econ_craftU4c8n",":(].vNI9c!n0") or die("Could not connect to Database");
$select = mysql_select_db("econ_craft", $connect);
if(isset($_POST['username']) && isset($_POST['password']) 
        && isset($_POST['email'])){
    $t_hasher = new PasswordHash(8, TRUE);
    $hash = $t_hasher->HashPassword($_POST['password']);
    unset($t_hasher);
    $user = $_POST['username'];
    $email = $_POST['email'];
    $usernamequery = mysql_query("SELECT * FROM users WHERE Username='$user'");
    $emailquery = mysql_query("SELECT * FROM users WHERE Email='$email'");
    $status = "";
    $canCreateUser = TRUE;
    if(mysql_num_rows($usernamequery) > 0){
        $status .= '<div class="alert alert-error"><strong>'.$user.'</strong> is already registered!</div>';
        $canCreateUser = FALSE;
    }
    if (mysql_num_rows($emailquery) > 0){
        $status .= '<div class="alert alert-error">Email address is already registered!</div>';
        $canCreateUser = FALSE;
    }
    if($canCreateUser) {
        $status .= '<div class="alert alert-success"><strong>'.$user.'</strong> has been successfully registered!</div>';
        mysql_query("INSERT INTO users (Username, Password, Email) VALUES ('$user', '$hash', '$email')");
        header("location:index.php?created=".$user);
    }
}
mysql_close();

function get_title(){
    return "Register to enter the Stock Market Game";
}
function get_script(){
    return "";
}
include 'php/header.php';
?>

<div class="container">
<div class="container loginform">
    <div class="propic"><img src="img/earth.jpg" alt="Profile Picture"></img></div>
    <h2>Register</h2>
    <div>
        <?php echo $status;?>
        <form action="new-user.php" method="post">
            <p id="userin">
            <input type="text" maxlength="18"
                   placeholder="User name" name="username"
                   value="<?php echo $user;?>" required>
            <input type="email" maxlength="100"
                   placeholder="Email" name="email"
                   value="<?php echo $email;?>" required>
            <input type="password" maxlength="18"
                   placeholder="Password" name="password"
                   value="<?php echo $_POST['password'];?>" required>
            </p><p>
                <input class="btn-inverse" type="submit" value="Register">
                <a href="index.php" class="pull-right">...or Log in</a>
            </p>
        </form>
    </div>
</div>
</div>

<?php include 'php/footer.php'; ?>