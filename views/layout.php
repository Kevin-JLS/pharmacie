<!DOCTYPE html>
<html lang="fr">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Pharmacie</title>
     <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?> ">
     <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'add.css' ?> ">
</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
               <a class="navbar-brand" href="/pharmacie">Pharmacie</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                         <li class="nav-item"><a class="nav-link" aria-current="page" href="/pharmacie">Accueil</a></li>
                         <li class="nav-item"><a class="nav-link" href="/pharmacie/liste">Nos pharmacies</a></li>
                         <li class="nav-item"><a class="nav-link text-danger" href="/pharmacie/admin/pharmacies">Partie Admin</a></li>
                    </ul>
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                         <?php if(isset($_SESSION['auth'])) : ?>
                              <li class="nav-item"><a class="nav-link" aria-current="page" href="/pharmacie/logout">Se déconnecter</a></li>
                         <?php endif ?>
                    </ul>
               </div>
          </div>
     </nav>

     <div class="container my-4">
          <?= $content ?>
     </div>

     <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'script-bootstrap.js' ?> "></script>
     
</body>
</html>