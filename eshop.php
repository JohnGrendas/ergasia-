<!DOCTYPE html>
<html>
  <head>
     <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
     <title> Eshop </title>
     <link rel="stylesheet" type="text/css" href="css/Home.css">
  </head>
  <body>
       <span style="font-size:30px; cursor:pointer; color: white" onclick="openNav()">&#9776;</span>

   <div id="bg">
   </div>


     <div id="mySidenav" class="sidenav">


             <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="float:right;">&times;</a>
             <a href="index.php">Home</a>
             <a href="eshop.php">Eshop</a>
             <a href="about.php">About</a>
             <a href="contact.php">Contact</a>

     </div>

   <div id="main">
<style>
table,th,td {
    border:1px solid green;
    
    }
</style>
     <h2>Wu-Tang Clan</h2>
     <p>Τα διαθέσιμα προιόντα μας!</p>
     <table style="width:100%">
  <tr>
    <th>Κατηγορία</th>
    <th>Προιόν</th> 
    <th>Τιμή</th>
  </tr>
  <tr>
    <td>CARTOON HOODIE - SAND</td>
    <td><img src="pics/WuWear.jpg" height="160"></td>
    <td>$70,00</td>
  </tr>
  <tr>
    <td>WU WAVE TEE - BLACK</td>
    <td><img src="pics/WuWearTee.jpg" height="160"></td>
    <td>$30,00</td>
  </tr>
  <tr>
    <td>INDUSTRIAL TEE - NAVY</td>
    <td> <img src="pics/WuWearTeeNavy.jpg" height="160"></td>
    <td>$30,00</td>
  </tr>
   <tr>
    <td>Wallabe Loe Zebra Clarks - Maple</td>
    <td> <img src="pics/LoeZebraClarks.png" height="160"></td>
    <td>$150,00</td>
  </tr>
  
</table>
 
 
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

</html>