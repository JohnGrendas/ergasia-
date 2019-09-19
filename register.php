<?php
require_once "config.php";
 

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Παρακαλώ βάλτε ένα username.";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Το username υπάρχει ήδη.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Κάτι πήγε λάθος,Προσπαθήστε αργότερα .";
            }
            mysqli_stmt_close($stmt);
        }
        
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Το password πρέπει να έχει τουλάχιστον 6 χαρακτήρες";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Παρακαλώ επιβεβαιώστε το password σας.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Το password σας δεν είναι ίδιο.";
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else{
                echo "Κάτι πήγε λάθος ,Προσπήστε αργότερα .";
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
    <title>Sign up</title>
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
        <h2>Sign Up</h2>
        <p>Παρακαλούμε συμπλήρωσε τη φόρμα για να δημιουργήσεις λογαριασμό.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
                <a href="index.php">HOME</a>
            </div>
            <p>Έχετε ήδη λογαριασμό? <a href="login.php">Login</a>.</p>
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