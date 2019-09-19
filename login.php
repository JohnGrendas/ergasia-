<?php

session_start();


if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}


require_once "config.php";


$username = $password = "";
$username_err = $password_err = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){

   
    if(empty(trim($_POST["username"]))){
        $username_err = "Παρακαλώ βάλτε το username σας.";
    } else{
        $username = trim($_POST["username"]);
    }


    if(empty(trim($_POST["password"]))){
        $password_err = "Παρακαλώ βάλτε τον κωδικό σας.";
    } else{
        $password = trim($_POST["password"]);
    }

    
    if(empty($username_err) && empty($password_err)){
      
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            
            $param_username = $username;

           
            if(mysqli_stmt_execute($stmt)){
             
                mysqli_stmt_store_result($stmt);

               
                if(mysqli_stmt_num_rows($stmt) == 1){
                   
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                           
                            session_start();

                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            
                            header("location: index.php");
                        } else{
                            
                            $password_err = "Το password είναι λάθος";
                        }
                    }
                } else{
                    $username_err = "Δεν βρέθηκε λογαριασμός με αυτο το username";
                }
            } else{
                echo "Κάτι πήγε στραβά ,προσπαθήστε αργότερα...";
            }
        mysqli_stmt_close($stmt);
        }
        
    }
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/Home.css">
    <title>Login</title>
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
        <h2>Login</h2>
        <p>Παρακαλώ βάλτε τα στοιχεία σας.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
                <a href="index.php">HOME</a>
            </div>
            <p><a href="register.php">Sign up now</a>.</p>
        </form>
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
            Wu-Tung Clan copyright 2019
       </footer>
       
</body>
</html>
