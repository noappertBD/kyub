<!DOCTYPE html>
<html>
   <head>
      <title>KyuB</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="main.css">
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
                     <a class="nav-link btn btn-success signup" href="./signup/" style="margin-right: 5px;margin-left: 5px;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                      </svg> Ouvrir un compte</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link btn login" href="./login/" style="margin-right: 5px;margin-left: 5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg> Se connecter</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <header class="header-blue">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                    <h1 style="margin-top: 5vh;">Pour plus de sécurité dans vos transactions</h1>
                    <p>KyuB permet l'achat en ligne et la livraison de vos produits</p><a class="btn btn-outline-success btn-lg openaccount" href="./signup/">Ouvrir un compte</a>
                </div>
                <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block">
                  <img style="margin-top: 5vh;" src="https://static.wikia.nocookie.net/minecraft_fr_gamepedia/images/4/49/Coffre.gif">
                </div>
            </div>
        </div>
    </header>
   </body>
</html>