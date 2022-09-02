<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS -->
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="stylesheet" href="public/css/navbar.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Musique</title>

</head>    

<body>

  <div class="container-fluid p-0 m-0">

  <?php if(isset($_SESSION["role"])) : ?>
      

    <div class="card bg-dark text-white text-end">
      <img src="https://cdn.pixabay.com/photo/2018/07/28/11/08/guitar-3567767_1280.jpg" class="w-100" class="card-img effet" alt="...">
      <div class="card-img-overlay text-danger p-5">
        <h1 class="card-title display-1 text-center" style="font-weight:bold">ZikMusic</h1>
        <p class="card-text lead text-light text-center" style="font-size:40px;">Bienvenue chez vous ...</p>
      </div>

        
      <nav role="navigation" class="onoff">
        <ul>
          <li><a href="./?action=accueil"><i class="fas fa-home"></i> Accueil</a></li>

          <li><a href="./?action=voirInstruments"><i class="fas fa-music"></i> Voir le catalogue de cours</a></li>


          <li><a href="./?action=adherentParSeance"><i class="fas fa-users"></i> Voir Adhérent des séances </a></li>

          <li><a href="./?action=deconnexion"><i class="fas fa-power-off"></i> Déconnexion</a></li>

        </ul>
      </nav>
     
    </div>
    <?php else: ?>
      <div class="card bg-dark text-white text-end">
      <div class="card-img-overlay text-danger p-5">
      </div>

        
      <nav role="navigation" class="onoff">
        <ul>
        </ul>
      </nav>
     
    </div>
      <?php endif; ?>
