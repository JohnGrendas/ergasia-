

<!DOCTYPE html>
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
        <a href="index.php">Home</a>
        <a href="eshop.php">Eshop</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>

      </div>

    <div id="main">
        <h2>Wu-Tang Clan</h2>
        <p> Το Wu-Tang Clan είναι μια αμερικανική ομάδα hardcore hip hop από τη Νέα Υόρκη </p>
        <img src="pics/wutangclan.jpg" height="200" alignt="center">
        <button onclick="window.location.href = 'register.php';">Sign up</button>
        <button onclick="window.location.href = 'login.php';">Login</button>
        
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
