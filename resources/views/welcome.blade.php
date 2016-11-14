<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ubu, Devs Social Network</title>
    <link rel="stylesheet" href="css/welcomestyle.css">
    <link rel="stylesheet" href="css/frappe.css">
    <link rel="shortcut icon" href="Images/logo.png">
    <link rel="stylesheet" href="sweetalert/sweetalert.css">
    <link rel="stylesheet" href="/icon/icomoon/style.css">
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:600' rel='stylesheet' type='text/css'>
  </head>
  <body ng-app="welcomeapp">
    <video  poster="Images/polina.jpg" id="bgvid"  autoplay="autoplay" loop="loop" muted>
    <source src="videos/polina.mp4" type="video/mp4">
    <source src="videos/polina.webm" type="video/webm">
    </video>
<div ui-view="content"></div>




    <script src="js/angular/angular.min.js"></script>
    <script src="js/angular/angular-ui-router.min.js"></script>
    <script src="js/angular/modules/welcomapp.js"></script>
    <script src="sweetalert/sweetalert.min.js" ></script>
    <!-- <script src="js/materialize.min.js"></script> -->
  </body>
</html>
