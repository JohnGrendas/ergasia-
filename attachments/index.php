<?php
session_start();
$con = mysqli_connect("localhost", "id10914702_admin", "admin", "id10914702_db");

?>
<html>
 <head>
          <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
	        <link rel="stylesheet" type="text/css" href="css/Home.css">
       <title>Home</title>
</head>

 <body>
   <span style="font-size:30px; cursor:pointer; color: white" onclick="openNav()">&#9776;</span>
  <div id="bg">
  </div>

<div id="mySidenav" class="sidenav">


       <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="float:right;">&times;</a>
       <a href="index.html">Home</a>
       <a href="About.html">About</a>
       <a href="Eshop.html">Eshop</a>
       <a href="Contact.html">Contact</a>

     </div>

   <div id="main">
       <h2>Wu-Tang Clan</h2>
       <p> Το Wu-Tang Clan είναι μια αμερικανική ομάδα hardcore hip hop από τη Νέα Υόρκη </p>
   </div>

 <script>
   function openNav() {
     document.getElementById("mySidenav").style.width = "250px";
     document.getElementById("main").style.marginLeft = "250px";
   }
   function closeNav() {
     document.getElementById("mySidenav").style.width = "0";
     document.getElementById("main").style.marginLeft= "0";
   }
 </script>

      <footer align="center">
              copyright 2019
      </footer>
</body>
<html>
