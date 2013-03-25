<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo get_title();?></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <?php if(isset($style)){echo '<link rel="stylesheet"type="text/css"href="'.$style.'"/>';}?>
    <script src="lib/zepto.min.js"></script>
    <script src="<?php echo get_script();?>"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.0.5/angular.min.js"></script>
</head>
<body>