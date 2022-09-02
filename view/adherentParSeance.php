
<h5 class="mt-3">Bonjour  <?= $_SESSION['nom']." ".$_SESSION['prenom']. " ( ". $_SESSION['role'] ." )"?></h5>
<div class="container m-4">
    <h2 class="text-center fw-bold text-DARK " style="text-decoration: underline;">LISTE DES ADHERENT PAR SEANCE </h2>

    <div class="text-center m-5">
    <?php if (isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger text-center">

      <?= $_SESSION["error"];
      unset($_SESSION['error']);
      ?>

    </div>
  <?php endif; ?>

  <?php if (isset($_SESSION["success"])) : ?>

    <div class="alert alert-success text-center">

      <?= $_SESSION["success"];
      unset($_SESSION['success']);
      ?>

    </div>

    <?php
    // Pour supprimer la persistance des données et réinitialiser le formulaire en cas de succès
    session_unset();
    ?>
  <?php endif; ?>
  
        <?php foreach ($AllSeances as $uneSeance) : ?>
            <?php $idIntsrument = $uneSeance->getIdInstrument() ?>
            <?php $unInstrument = $instrumentManager->getInstrumentById($idIntsrument) ?>

            <a href="./?action=voirInscriptionsParSeance&idSeance=<?= $unInstrument->getIdInstrument(); ?>" class="btn  btn-outline-secondary"><img src="public/icons/instruments/<?= $unInstrument->getIdInstrument(); ?>.png" alt="" style="width:200px; height:120px">
                <hr> Liste Adhérent inscrit au<br> Séance du :
                <strong><?= $uneSeance->getDateSeance() . "</strong><br> Instrument : <strong>" .
                 $unInstrument->getLibInstrument(); ?></strong>
            </a>


        <?php endforeach; ?>

    </div>

</div>