<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: ../login/");
    exit;
}
require_once "../config.php";
$sql = "SELECT id, username, diamonds FROM users WHERE id='" . $_SESSION['id'] . "'";
$result = $link->query($sql);

$sqlshop = "SELECT id, item_name, item_stock, item_price FROM shop";
$resultshop = $link->query($sqlshop);

if (isset($_GET["click"])) {
    $sqlup = "UPDATE users SET diamonds='".$rendu."' WHERE id=".$_SESSION['id'];
}

$link->close();
  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $url = "https"; 
  else
    $url = "http"; 
  $url .= "://"; 
  $url .= $_SERVER['HTTP_HOST']; 
  $url .= $_SERVER['REQUEST_URI'];
$id = parse_url($url, PHP_URL_QUERY);
?>
<!DOCTYPE html>
<html>
   <head>
      <title>KyuB</title>
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
					<?php
if ($result->num_rows > 0)
{
    // output data of each row
    while ($row = $result->fetch_assoc())
    {
        echo "<h5 class='text-light mt-2'><acc>" . $row["diamonds"] . "</acc> Diamants</h5>";
        $rowd = $row["diamonds"];
    }
}
?>
				</li>
                    
					<li class="nav-item">
                     <a class="nav-link btn login" style="margin-right: 5px;margin-left: 5px;">
                    <?php echo "<img src='https://minotar.net/helm/" . $_SESSION['username'] . "/21.png'>" ?> <?php
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
                <?php
if ($resultshop->num_rows > 0)
{
    while ($rowshop = $resultshop->fetch_assoc())
    {
    if ($rowshop['id'] == $id)
    {
    $rendu = ($rowd - $rowshop['item_price']);
        echo "<div class='col-12 col-lg-12 col-xl-12'><div class='card text-white bg-dark'><div class='card-header'>" . $rowshop['item_stock'] . " " . $rowshop['item_name'] . "</div><div class='card-body'><img src='https://minecraftitemids.com/item/128/" . $rowshop['item_name'] . ".png'></img></div><div class='card-footer d-flex'><span><acc>" . $rowshop['item_price'] . "</acc> diamant(s) - Il vous restera <acc>" . $rendu . "</acc> diamant(s)</span><a style='position: absolute; right: 15px;margin-top:6px' class='btn btn-success d-flex justify-content-end'>Acheter</a></div></div></div>";
        }
    }
}
?>
            </div> 
        </div>
    </header>
   </body>
</html>
