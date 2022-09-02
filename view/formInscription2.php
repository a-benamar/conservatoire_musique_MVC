<div class="row mt-5 mb-5">
    <div class="col-md-12">

    <form action="./?action=traitement-inscription&choix=2" method="POST">
        <fieldset>
            <div class="alert alert-danger">

                <?= $_SESSION["error_adherent_existe"]; ?>

            </div>
            <hr class="text-bolder text-danger">
            <h2 class="text-dark text-center"> Formulaire d'inscription </h2>
            <hr class="text-bolder text-danger">
            <h3 class="text-center text-danger"><?= strtoupper($instrument->getLibInstrument()) ?> <i class="fas fa-music"> </i>
                <?= $seance->getDateSeance() ?></h3>
            <hr class="text-bolder text-danger">

            <div class="row">
              
                    <div class="col-md-12">
                        <input type="hidden" name="adher_idSeance" value="<?= $seance->getIdSeance() ?>">
                        <label>Nom l'adhérente</label>
                        <select class="form-select" aria-label="Default select example" name="idAdherent" required>
                            <option selected disabled>-- Veuillez séléctionner l'adhérent --</option>
                            <?php
                            foreach ($AllAdherents as $unAdherent) :
                            ?>

                                <?php
                                echo ("<option value='" . $unAdherent->getIdAdherent() . "'>" . $unAdherent->getNomAdherent() . " " . $unAdherent->getPrenomAdherent() . "</option>");
                                ?>

                            <?php
                            endforeach; ?>
                        </select>

                    </div>

                    <div class="rows-col-md-6 d-flex mt-0 button">
                        <hr class="text-bolder text-danger">
                        <a href="./?action=voirInstruments" type="submit" class="m-2">Retour</a>
                        <button type="submit" name="valider" class="m-2">S'inscrire</button>
                    </div>


          


            </div>
        </fieldset>

        </form>
    </div>
</div>









<style>
    *,
    *:before,
    *:after {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        font-family: 'Nunito', sans-serif;
        color: #384047;
    }

    form {
        max-width: 700px;
        margin: 10px auto;
        padding: 10px 20px;
        background: #f4f7f8;
        border-radius: 10px;
        box-shadow: 2px 2px 4px 4px rgba(0, 0, 0, 0.5);
    }

    h1 {
        margin: 0 0 30px 0;
        text-align: center;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    textarea,
    select {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        font-size: 16px;
        height: auto;
        margin: 0;
        outline: 0;
        padding: 13px;
        width: 100%;
        ;
        background-color: #e8eeef;
        color: black;
        box-shadow: 3px 3px 3px rgba(255, 98, 57, 0.5);
        margin-bottom: 30px;
    }


    .button button {
        padding: 10px;
        color: #FFF;
        background-color: #f9765a;
        font-size: 18px;
        text-align: center;
        font-style: normal;
        border-radius: 10px;
        width: 100%;
        border: 5px solid #ff6239;
        border-width: 1px 1px 3px;
        box-shadow: 5px 5px 0 rgba(0, 0, 0, 0.2);
        margin-bottom: 10px;
    }

    .button a {
        padding: 10px;
        color: #FFF;
        background-color: #f9765a;
        font-size: 18px;
        text-align: center;
        text-decoration: none;
        font-style: normal;
        border-radius: 10px;
        width: 100%;
        border: 5px solid #ff6239;
        border-width: 1px 1px 3px;
        box-shadow: 5px 5px 0 rgba(0, 0, 0, 0.2);
        margin-bottom: 10px;
    }

    button:hover {
        background-color: #ff6239;
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        color: black;
        font-weight: bold;
    }

    .button a:hover {
        background-color: #ff6239;
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        color: black;
        font-weight: bold;
    }

    fieldset {
        margin-bottom: 15px;
        border: none;
    }

    legend {
        font-size: 1.4em;
        margin-bottom: 10px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    label.light {
        font-weight: 300;
        display: inline;
    }

    span {
        color: black;
    }

    .number {
        background-color: #5fcf80;
        color: #fff;
        height: 30px;
        width: 30px;
        display: inline-block;
        font-size: 0.8em;
        margin-right: 4px;
        line-height: 30px;
        text-align: center;
        text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
        border-radius: 100%;
    }

    @media screen and (min-width: 480px) {

        form {
            max-width: auto;
        }

    }
</style>