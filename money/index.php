<!DOCTYPE html>
<html>
   <head>
      <title>KyuB</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../main.css">
   </head>
   <body>
<?php
session_start();
 require_once "../config.php";

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login/");
    exit;
}else if( $_SESSION["username"] !== "Aleod"){
    header("location: ../login/");
    exit;
}
$username = $diamonds = "";
$username_err = $diamonds_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new diamonds
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";     
    } else{
        $username = trim($_POST["username"]);
    }
    
    $diamonds = trim($_POST["diamonds"]);
        

    if(empty($username_err) && empty($diamonds_err)){
    
        $sql = "UPDATE users SET diamonds = ? WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "ss", $param_diamonds, $param_username);
            
        	$param_diamonds = trim($_POST["diamonds"]);
            $param_username = trim($_POST["username"]);
        
            if(mysqli_stmt_execute($stmt)){
                header("location: ../panel/");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
      <nav class="navbar navbar-dark navbar-expand-sm textlight bg-dark navigation-clean">
         <div class="container">
            <a class="navbar-brand" href="#"><b>KyuB</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
               <ul class="navbar-nav mt-2 mb-2">
                  <li class="nav-item">
                     <a class="nav-link btn login" style="margin-right: 5px;margin-left: 5px;">
                    <?php echo "<img src='https://minotar.net/helm/".$_SESSION['username']."/21.png'>" ?> <?php
					echo $_SESSION['username'];
					?></a>
                  </li>
                    <li class="nav-item">
                     <a class="nav-link btn btn-success signin" href="../logout" style="margin-right: 5px;margin-left: 5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
					  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
					  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
					</svg> Deconnexion</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
<header class="header-blue">
        <div class="container">
            <div class="card text-white bg-dark m-auto mt-5" style="max-width: 18rem;">
                <div class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg> Modification des données</div>
                <div class="card-body">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="input-group mb-3" style="border-radius: 0.3rem;">
                        <span class="input-group-text" id="basic-addon1">username</span>
                        <input  type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Pseudo MC">
						<span class="invalid-feedback"><?php echo $username_err; ?></span>                      
					</div>
                      <div class="input-group mb-3" style="border-radius: 0.3rem;">
                        <span class="input-group-text" id="basic-addon1">diamonds</span>
                        <input type="diamonds" name="diamonds" class="form-control <?php echo (!empty($diamonds_err)) ? 'is-invalid' : ''; ?>" placeholder="Quantité d'argent">
                       <span class="invalid-feedback"><?php echo $diamonds_err; ?></span>
                        </div>
                      <div class="input-group mb-3">
                        <input type="submit" class="btn btn-success m-auto" style="min-width: 100%; border-radius: 0.3rem;" value="Mettre à jour">
                      </div>
                      </form>
                       
                  <p class="card-text">Merci d'inserer que des chiffres pour les diamands</p>
                </div>
              </div>
              
        </div>
    </header>
   </body>
</html>

