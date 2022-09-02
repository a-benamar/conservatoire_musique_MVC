
<h5 class="mt-3">Bonjour  <?= $_SESSION['nom']." ".$_SESSION['prenom']. " ( ". $_SESSION['role'] ." )"?></h5>
<div class="container mt-5 mb-5">
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

  <h2 class="text-center fw-bold text-DARK ">LISTE DES ADHERENT INSCRIT AU COURS DU <br>
  <strong class="text-danger"><?= strtoupper($seance->getDateSeance()." - ".$instrument->getLibInstrument()); ?></strong></h2>
  
  <?php if (count($AllInscriptionsBySeance) > 0) : ?>
  <table class="table table-striped table-hover mt-5">
    <thead class="text-center">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NOM & PRENOM</th>
        <th scope="col">E-MAIL</th>
        <th scope="col">TELEPHONE</th>
        <th scope="col">DATE INSCRIPTION</th>
        <th scope="col">ACTION</th>
      </tr>
    </thead>
    <tbody class="text-center">

  
        <?php foreach ($AllInscriptionsBySeance as $unInscription) : ?>
          <?php $idSeance =  $unInscription->getIdSeance(); ?>
          <?php $idAdherent =  $unInscription->getIdAdherent(); ?>
          <?php $unInscriptions = $inscriptionManager->getInscriptionByIdAdherent($idAdherent);?>
          <?php $unAdherent =  $adherentManager->getAdherentById($idAdherent); ?>
          <?php $uneSeance =  $seanceManager->getSeanceById($idSeance); ?>


          <tr>
            <th scope="row"><?= $unAdherent->getIdAdherent(); ?></th>
            <td><?= $unAdherent->getNomAdherent()." ".$unAdherent->getPrenomAdherent(); ?></td>
            <td><?= $unAdherent->getMailAdherent(); ?></td>
            <td><?= $unAdherent->getTelAdherent(); ?></td>
            <td><?= date("d m Y", strtotime($unAdherent->getDateInscription())); ?></td>
            <td>
              <a href="./?action=voirAdherent&id=<?= $unAdherent->getIdAdherent(); ?>" class="btn btn-outline-danger"><i class="fas fa-eye"></i></a>
              <a href="./?action=voirAdherent" class="btn btn-outline-danger"><i class="fas fa-edit"></i></a>
              <a href="./?action=genPDF&id=<?= $unAdherent->getIdAdherent(); ?>"  target="_blank" class="btn btn-outline-danger"><i class="fas fa-download"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>

      <?php else : ?>

        <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">

          <?php
          echo  "Aucun adhérent trouvé ...";
          ?>

        <?php endif; ?>
    </tbody>
  </table>
</div>

