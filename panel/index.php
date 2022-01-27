<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login/");
    exit;
}
 require_once "../config.php";
$sql = "SELECT id, username, diamonds FROM users WHERE id='".$_SESSION['id'] ."'";
$result = $link->query($sql);

$link->close();
?>
<!DOCTYPE html>
<html>
   <head>
      <title>KyuB</title>
      <link rel="preconnect" href="https://minecraft-api.com/api">
      <meta charset="utf-8">
      <?php
      echo "<link rel='shortcut icon' type='image/x-icon' href='https://minotar.net/helm/" . $_SESSION['username'] . "/21.png' />";
      ?>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../main.css">
   </head>
   <body>
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
                    <?php echo "<img style='border-radius: 3rem;' src='https://minotar.net/helm/".$_SESSION['username']."/21.png'>" ?> <?php
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
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                    <div class="card text-white bg-dark">
                    <div class="card-header">Dans votre compte</div>
  <div class="card-body"><?php
                    if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  if ($row["diamonds"]>1) {
    echo "<h2><acc>". $row["diamonds"]. "</acc> Diamants</h2>";
    }else{
    echo "<h2><acc>". $row["diamonds"]. "</acc> Diamant</h2>";
    }
  }
}
                    ?></div>
</div>
                </div>
                <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block">
                  
                </div>
            </div>
        </div>
    </header>
   </body>
</html>