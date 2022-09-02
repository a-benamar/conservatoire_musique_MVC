<div class="row mt-5 mb-5 text-center">
    <div class="col-md-12 text-center">
        <br>

        <form action="./?action=traitementLogin" method="POST">
            <?php if (isset($_SESSION["error"]) && $_SESSION['error'] != '') : ?>

                <div class="alert alert-danger">

                    <?= $_SESSION["error"];
                    unset($_SESSION['error']);
                    ?>

                </div>

                <?php session_unset(); ?>
            <?php endif; ?>
            <fieldset>
                <hr class="text-bolder text-danger">
                <h2 class="text-danger text-center fw-bolder"> LOGIN </h2>
                <hr class="text-bolder text-danger">

            </fieldset>

            <fieldset>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <input type="text" id="name" name="email" class="form-control" placeholder="Adresse e-mail" required>
                    </div>

                    <div class="col-md-12">
                        <input type="password" id="mdp" name="mdp" class="form-control" placeholder="Mot de passe" required>
                    </div>

                </div>
                <div class="col-md-12 button">
                    <hr class="text-bolder text-danger">
                    <button type="submit" name="seConnecter" class="m-2">Se Connecter</button>
                    <hr class="text-bolder text-danger">
                </div>

            </fieldset>

</form>
</div>
</div>

<br><br><br>










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
        background:url("https://img-31.ccm2.net/c-fOFxKL2gpFLrvmUMaelAQ8-2s=/1240x/smart/6b4bda32f7cd415389f230ae90788b89/ccmcms-hugo/10786591.jpg");
    }

    form {
        align-items: center;
        max-width: 500px;
        margin: 10px auto;
        padding: 10px 20px;
        background: rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        box-shadow: 2px 2px 0px 4px rgba(0, 0, 0, 0.3);
    }

    h1 {
        margin: 0 0 30px 0;
        text-align: center;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="password"],
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