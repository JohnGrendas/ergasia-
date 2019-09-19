<!DOCTYPE html>
<html>
   <head>
     <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="css/Home.css">
     <title> About </title>
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

     <h2>Wu-Tang Clan</h2>
     <p> Το Wu-Tang Clan είναι μια αμερικανική ομάδα hardcore hip hop από τη Νέα Υόρκη </p>

     <p> Το Wu-Tang Clan έχει κυκλοφορήσει τέσσερα λευκώματα στούντιο χρυσού και πλατινένιου </p>
     Μέλη: RZA<img src="pics/RZA.jpg" height="80">, GZA <img src="pics/GZA.jpg" height="80"> , Ol' Dirty Bastard <img src="pics/Ol'_Dirty_Bastard.jpg" height="80" >, Method Man <img src="pics/Method Man.jpg" height="80">, Raekwon <img src="pics/Raekwon.jpg" height="80">, Ghostface Killah <img src="pics/Ghostface Killah.jpg" height="80">, Inspectah Deck <img src="pics/Inspectah Deck.jpg" height="80">, U-God <img src="pics/U-God.jpg" height="80">, Masta Killa <img src="pics/Masta Killa.jpg" height="80">
     <p> Το 1993, το πρώτο άλμπουμ τους, Enter the Wu-Tang (36 Chambers), θεωρείται ένα από τα μεγαλύτερα άλμπουμ στην ιστορία του hip hop </p>
     <p> Tο Clan Wu-Tang έχει ένα ευρύ φάσμα συνεργατών. Οι στενοί συνεργάτες σε μεμονωμένα μέλη ή στην ομάδα ως σύνολο περιλαμβάνουν ή συμπεριλάμβαναν κυρίως καλλιτέχνες με βάση την Ανατολική Ακτή, όπως οι Redman, Mobb Deep, Busta Rhymes, Erick Sermon, Nas, Pete Rock και άλλοι </p>

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
