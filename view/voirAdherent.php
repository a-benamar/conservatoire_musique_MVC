<h5 class="mt-3">Bonjour  <?= $_SESSION['nom']." ".$_SESSION['prenom']. " ( ". $_SESSION['role'] ." )"?></h5>
<div class="container">
    <div class="main-body mt-3">

        <div class="container rounded bg-white my-5">
            <div class="row body-profil">

                <div class="col-md-12">
                    <div class="p-3 py-5">

                        <div class="d-flex justify-content-between color-align-items-center mb-3">
                            <div class="d-flex flex-row align-items-center back">
                                <a href="./?action=adherentParSeance" class="btn btn-outline-secondary "><i class="fas fa-angle-left mr-1 mb-1"></i> Retour</a>
                            </div>
                            <div class="text-danger mb-2">
                                <h3>-- Informations personnelles --</h3>
                            </div>
                            <div class="d-flex flex-row align-items-center back">
                                <form action="./?action=desabonne_Adherent" method="POST">
                                    <input type="hidden" name="desabonne_id" id="inputId" required value="<?= $uneInscription->getIdAdherent(); ?>">
                                    <button type="submit" name="desabonne_btn" class="btn btn-danger">
                                    <i class="fas fa-user-times mr-1 mb-1"></i> Désabonné
                                    </button>
                                </form>
                            </div>
                        </div>
                        <hr>

                        <div class="row mt-2">
                            <div class="col-md-6 form-group">
                                <span class="font-monospace fw-bolder">Nom :</span> <?= $unAdherent->getNomAdherent(); ?>
                                <hr>
                            </div>
                            <div class="col-md-6 form-group">
                                <span class="font-monospace fw-bold">Prénom :</span><?= $unAdherent->getPrenomAdherent(); ?>
                                <hr>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6 form-group">
                                <span class="font-monospace fw-bold">E-mail :</span><?= $unAdherent->getMailAdherent(); ?>
                                <hr>
                            </div>

                            <div class="col-md-6 form-group">
                                <span class="font-monospace fw-bold">Téléphone :</span><?= $unAdherent->getTelAdherent(); ?>
                                <hr>
                            </div>
                        </div>
                        <div class="text-center mt-4 mb-4 text-danger">
                            <h3>-- Informations Cours --</h3>
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-6 form-group">
                                <span class="font-monospace fw-bold">Instrument :</span> <?= $unInstrument->getLibInstrument(); ?>
                                <hr>
                            </div>
                            <div class="col-md-6 form-group">
                                <span class="font-monospace fw-bold">Séance :</span> <?= $uneSeance->getDateSeance(); ?>
                                <hr>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6 form-group">
                                <span class="font-monospace fw-bold">Professeur :</span><?= $unProfesseur->getNomProf() . " " . $unProfesseur->getPrenomProf(); ?>
                                <hr>
                            </div>
                            <div class="col-md-6 form-group">
                                <span class="font-monospace fw-bold">Date d'inscription :</span> <?= date("d-m-Y", strtotime($unAdherent->getDateInscription())); ?>
                                <hr>
                            </div>
                            <div class="text-center mt-3">
                                <a href="./?action=genPDF&id=<?= $unAdherent->getIdAdherent(); ?>" target="_blank" class="btn btn-primary col-md-4"><i class="fas fa-print mr-1 mb-1"></i> Fiche d'inscription</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<style>
    .container {
        width: 900px;
    }

    body {
        background: whitesmoke
    }

    .body-profil {
        /* box-shadow: 1px 1px 15px 1px rgb(251, 145, 31) */
        box-shadow: 2px 2px 4px 4px rgba(0, 0, 0, 0.5);
    }

    .form-control:focus {
        box-shadow: none;
        border-color: red
    }

    .profile-button {
        background: #fb911f;
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #262e49;

    }

    .profile-button:focus {
        background: green;
        box-shadow: none
    }

    .profile-button:active {
        background: yellow;
        box-shadow: none
    }

    .back:hover {
        color: #fb911f;
        cursor: pointer
    }
</style>