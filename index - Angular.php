<?php
function get_title(){
    return "Login to EconomyCraft";
}
function get_script(){
    return "script/login.js";
}
include 'php/header.php';
?>
<div class="container">
<div class="container loginform" ng-app>
    <div class="propic"><img src="img/earth.jpg" alt="Profile Picture"></img></div>
    <h2>Welcome</h2>
    <div ng-controller="Login">
        <form ng-submit="Enter()" action="php/user.php" method="post">
            <p id="userin">
            <input type="text" ng-model="userName" size="18"
                   placeholder="User name" name="username">
            <input type="password" ng-model="passWord" size="18"
                   placeholder="Password" name="password">
            </p><p>
                <input class="btn-inverse" type="submit" value="Log in">
                <input class="btn-warning" ng-click="Hash()"type="button" value="Hash">
                <a href="#" class="pull-right" ng-click="Register()">...or Register</a>
            </p>
            <span id="output"></span>
            <p id="pass"></p>
        </form>
    </div>
</div>
</div>

<?php include 'php/footer.php'; ?>