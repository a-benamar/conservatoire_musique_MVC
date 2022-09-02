
      <h5 class="mt-3">Bonjour  <?= $_SESSION['nom']." ".$_SESSION['prenom']. " ( ". $_SESSION['role'] ." )"?></h5>
<div class="container mt-5 mb-5">
<h2 class="text-center fw-bold text-dark" style="text-decoration: underline;">LISTE DES COURS</h2>

<div class="row row-cols-1 row-cols-md-4 g-4 mt-4 mx-0">

<?php foreach($AllSeances as $uneSeance): 
  $idProf = $uneSeance->getIdProf();
  $idInstrument = $uneSeance->getIdInstrument();

  $unProfesseur =  $professeurManager->getProfesseureById($idProf);
  $unInstrument =  $instrumentManager->getInstrumentById($idInstrument);?>

  <div class="col">
 
    <div class="card h-100">
      <img src="public/images/<?= $idInstrument?>.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center text-white bg-danger w-100"><?= $unInstrument->getLibInstrument(); ?></h5>
        <p class="card-text text-center">ID séance : <b><?= $uneSeance->getIdSeance(); ?></b></p>
        <p class="card-text text-center">Date séance  : <b><?= $uneSeance->getDateSeance(); ?></b></p>
        <p class="card-text text-center">Assuré par : <b><?= $unProfesseur->getNomProf(). " ".$unProfesseur->getPrenomProf(); ?></b></p>
        <a href="./?action=inscription&idSeance=<?= $uneSeance->getIdSeance(); ?>" class="btn btn-danger w-100">S'inscrire</a>
      </div>
    </div>
  </div>

  <?php endforeach; ?>

  </div>
</div>


