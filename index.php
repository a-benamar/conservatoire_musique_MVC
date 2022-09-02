<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
session_start();
require("model/bdd.php");
require_once("model/managers/professeurManager.php");
require_once("model/managers/seanceManager.php");
require_once("model/managers/instrumentManager.php");
require_once("model/managers/adherentManager.php");
require_once("model/managers/inscriptionManager.php");
require_once("model/managers/userManager.php");



$lePDO = etablirCnx(); // un objet PDO presente la function de la connexion



if (!isset($_GET['action'])) {
    $action = "login";
} else {
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

include "view/header.php";


// if (empty($_SESSION['role']) || $_SESSION['role'] != "employer") {

//     header("location:./?action=login");

//     }else{
//         header("location:./?action=login");
//     }

switch ($action) {

    case "login":
        require "view/login.php";
    break;

     /**
      * Traitement de login
      */
    case "traitementLogin":
      

            if (isset($_POST['email'], $_POST['mdp'])) {
                if (!empty($_POST['email']) && !empty($_POST['mdp'])) {

                    $email       = trim(filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                    $mdp         = trim(filter_var($_POST['mdp'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    
                    //on verifie la validation de l'email
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $_SESSION["error"] = "Erreur - L'email n'est pas valide)";
                        header('Location:./?action=login');
                        exit;
                    }
    
                    // nettoyage de l'email
                    $email  = filter_var($email, FILTER_SANITIZE_EMAIL);
    
                    //Formater le nom et le prénom proprement
                    $email    = strtolower($email);

                    $user = new UserManager($lePDO);
                    $isUser = $user->getUserByEmailAndPassword($email, $mdp);

                    if ($isUser) {
                        session_unset();
                        $_SESSION['id']      = $isUser->getIdUser();
                        $_SESSION["nom"]     = $isUser->getNom();
                        $_SESSION["prenom"]  = $isUser->getPrenom();
                        $_SESSION["email"]   = $isUser->getEmail();
                        $_SESSION["role"]    = $isUser->getRole();

                        header('Location:./?action=accueil');
                        exit;
                    } else {
                        $_SESSION["error"] = "Erreur - L'email et/ou mot de passe incorrect";
                        header('Location:./?action=login');
                    }
                } else {
                    $_SESSION['error'] = "Merci de remplir tous les champs";
                    header("location:./?action=login");
                }
            } else {
                $_SESSION['error'] = "Une erreur est survenue, Merci de ressayer";
                header("location:./?action=login");
            }
        
        
    break;

        
    // if (empty($_SESSION['role']) || $_SESSION['role'] != "employer") {
    //     header("location:./?action=login");
    // } elseif ($_SESSION['role'] == "employer") {
    //     require('index.php');
    // } else {
    //     header("location:./?action=login");
    // }
    

    case "accueil":
        require "view/accueil.php";
        break;

    case "voirInstruments":

        $seanceManager      =  new SeanceManager($lePDO);
        $AllSeances         =  $seanceManager->getAllSeances();

        $professeurManager  =  new ProfesseurManager($lePDO);
        $AllProfesseurs     =  $professeurManager->getAllProfesseurs();

        $instrumentManager  =  new InstrumentManager($lePDO);
        $AllInstruments     =  $instrumentManager->getAllInstruments();
        require "view/voirInstruments.php";
        break;

/**
 * Consulter les adherents par seance
 */
    case "voirInscriptionsParSeance":
        $idSeance           =  filter_var($_GET['idSeance'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $seanceManager      =  new SeanceManager($lePDO);
        $seance             = $seanceManager->getSeanceById($idSeance);

        $idInstrument       = $seance->getIdInstrument();
        $instrumentManager  =  new InstrumentManager($lePDO);
        $instrument         =  $instrumentManager->getInstrumentById($idInstrument);

        $inscriptionManager =  new InscriptionManager($lePDO);
        $AllInscriptionsBySeance    = $inscriptionManager->getAllInscriptionsByIdSeance($idSeance);
      
        $adherentManager    =  new AdherentManager($lePDO);

        require "view/voirInscriptionsParSeance.php";
        break;

        case "adherentParSeance":

            $instrumentManager  =  new InstrumentManager($lePDO);
            $AllInstruments     = $instrumentManager->getAllInstruments();
            $seanceManager      =  new SeanceManager($lePDO);
            $AllSeances         = $seanceManager->getAllSeances();

            require "view/adherentParSeance.php";
            break;

     /**
      * formulaire d'inscription
     */

    case "inscription":

        $adherentManager       =  new AdherentManager($lePDO);
        $AllAdherents          =  $adherentManager->getAllAdherents();

        $instrumentManager     =  new InstrumentManager($lePDO);
        $seanceManager         =  new SeanceManager($lePDO);
        $_SESSION['idSeance']  = filter_var($_GET['idSeance'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $idSeance              =  $_SESSION['idSeance'];
        $seance                =  $seanceManager->getSeanceById($idSeance);
        $idInstrument          =  $seance->getIdInstrument();
        $instrument            =  $instrumentManager->getInstrumentById($idInstrument);
        
        require "view/formInscription.php";
        break;



        case "inscription2":

            $adherentManager       =  new AdherentManager($lePDO);
            $AllAdherents          =  $adherentManager->getAllAdherents();

            $instrumentManager     =  new InstrumentManager($lePDO);
            $seanceManager         =  new SeanceManager($lePDO);
            $idSeance              =  $_SESSION['idSeance'];
            $seance                =  $seanceManager->getSeanceById($idSeance);
            $idInstrument          =  $seance->getIdInstrument();
            $instrument            =  $instrumentManager->getInstrumentById($idInstrument);

            require "view/formInscription2.php";
            break;

            /**
             * Traitement de l'inscription adherent+seance
             */
    case "traitement-inscription":

        $choix = $_REQUEST["choix"] ;

        $inscription = array();

            switch ($choix) {

               case 1:

        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            $_SESSION['error'] = "Une erreur est survenue : la methode POST est attendu";
            header("location:./?action=Inscription");
        }

        if (isset($_POST['adher_nom'], $_POST['adher_prenom'], $_POST['adher_email'], $_POST['adher_tel'], $_POST['adher_idSeance'])) {
            // var_dump($_POST);exit;
            if (!empty($_POST['adher_idSeance']) && !empty($_POST['adher_nom']) && !empty($_POST['adher_prenom']) && !empty($_POST['adher_email']) && !empty($_POST['adher_tel'])) {

                // Nettoyage des caractères HTML et création des variables

                $adher_nom       = trim(filter_var($_POST['adher_nom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $adher_prenom    = trim(filter_var($_POST['adher_prenom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $adher_email     = trim(filter_var($_POST['adher_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $adher_tel       = trim(filter_var($_POST['adher_tel'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $adher_idSeance  = trim(filter_var($_POST['adher_idSeance'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));

                //on verifie la validation de l'email
                if (!filter_var($adher_email, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION["error"] = "Erreur - L'email n'est pas valide)";
                    header('Location:./?action=inscription');

                    exit;
                }

                // nettoyage de l'email
                $adher_email  = filter_var($adher_email, FILTER_SANITIZE_EMAIL);

                //Formater le nom et le prénom proprement
                $adher_nom      = strtoupper($adher_nom);
                $adher_prenom   =  ucfirst(strtolower($adher_prenom));
                $adher_email    = strtolower($adher_email);

                $adherentManager = new AdherentManager($lePDO);

                $checkAdherent   = $adherentManager->verifAdherent($adher_nom, $adher_prenom, $adher_email, $adher_tel);
                //var_dump(count($checkAdherent));exit;
              

                if ($checkAdherent) {
                    $_SESSION["error_adherent_existe"] = "Cet adherent deja éxiste ... Merçi de le séléctionner de la liste ci-dessous";
                    header("location: ./?action=inscription2");
                    exit;
                } else {
                    $adherent = new Adherent();
                    $adherent->setNomAdherent($adher_nom);
                    $adherent->setPrenomAdherent($adher_prenom);
                    $adherent->setMailAdherent($adher_email);
                    $adherent->setTelAdherent($adher_tel);

                    $addAdherentOk = $adherentManager->addAdherent($adherent);

                    $inscription = new Inscription();
                    $lastIdAdherent = $adherentManager->getLastIdAdherent();
                    $inscription->setIdAdherent($lastIdAdherent);
                    $inscription->setIdSeance($adher_idSeance);
               
                    $inscriptionManager  = new InscriptionManager($lePDO);
                    $addInscriptionOK    = $inscriptionManager->addInscription($inscription);

                    // var_dump($addInscriptionOK);exit;

                    if ($addInscriptionOK) {
                   
                //    $_SESSION['success'] = "L'adhérent est inscrit avec succès.";
                        header("location:./?action=inscriptionOK");
                        exit;
                    } else {
                        $_SESSION['error'] = "Une erreur est survenue lors de la création.";
                        header("location:./?action=inscription");
                    }
                }
            } else {
                $_SESSION['error'] = "Une erreur est survenue, Merci de remplir les champs vide";
                header("location:./?action=inscription");
            }
        } else {
            $_SESSION['error'] = "Une erreur est survenue, Merci de ressayer";
            header("location:./?action=inscription");
        }

        break ;
       
        case 2:

            $adher_idSeance  = trim(filter_var($_POST['adher_idSeance'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $adher_id        = trim(filter_var($_POST['idAdherent'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));

            
            $inscription = new Inscription();
            $inscription->setIdAdherent($adher_id);
            $inscription->setIdSeance($adher_idSeance);
           
            $inscriptionManager  = new InscriptionManager($lePDO);
            $addInscriptionOK    = $inscriptionManager->addInscription($inscription);

            // var_dump($addInscriptionOK);exit;

            if ($addInscriptionOK) {
               
            //    $_SESSION['success'] = "L'adhérent est inscrit avec succès.";
                header("location:./?action=inscriptionOK");
                exit;
            } else {
                $_SESSION['error'] = "Une erreur est survenue lors de la création.";
                header("location:./?action=inscription2");
            }
        }
    

        break;

    case "inscriptionOK":
            require "view/inscriptionOK.php";
            break;

        
    case "voirAdherent":
            $adherentManager    =  new AdherentManager($lePDO);
            $id_Adherent        =  filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $unAdherent         =  $adherentManager->getAdherentById($id_Adherent);

            $inscriptionManager =  new InscriptionManager($lePDO);
            $uneInscription     =  $inscriptionManager->getInscriptionByIdAdherent($id_Adherent);
            $id_Seance          =  $uneInscription->getIdSeance();

            $seanceManager      =  new SeanceManager($lePDO);
            $uneSeance          =  $seanceManager->getSeanceById($id_Seance);

            $id_Prof            =  $uneSeance->getIdProf();
            $professeurManager  = new professeurManager($lePDO);
            $unProfesseur       = $professeurManager->getProfesseureById($id_Prof);

            $id_Instrument      = $uneSeance->getIdInstrument();
            $instrumentManager  =  new InstrumentManager($lePDO);
            $unInstrument       = $instrumentManager->getInstrumentById($id_Instrument);


            require "view/voirAdherent.php";
             break;

       /**
        * désabonné d'un adherent 
        */      

    case "desabonne_Adherent":

             if (isset($_POST['desabonne_btn'])) {
                 if (isset($_POST['desabonne_id'])) {
                     $desabonne_id        =  filter_var($_POST['desabonne_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                     $inscriptionManager =  new InscriptionManager($lePDO);
                     $desabonneOk     =  $inscriptionManager->deleteInscriptionByIdAdherent($desabonne_id);
                 }
               
                 if ($desabonneOk) {
                     $_SESSION['success'] = "Désabonné faite  avec succès";
                     header("location:./?action=adherentParSeance");
                     exit;
                 } else {
                     $_SESSION['error'] = "Une erreur est survenue ";
                     header("location:./?action=adherentParSeance");
                 }
                 require('view/adherentParSeance.php');
             }
    
            break;

            /**
             * Generer l'attestation d'inscription en pdf
             */
            case"genPDF":
                $adherentManager    =  new AdherentManager($lePDO);
                $id_Adherent        =  filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $unAdherent         =  $adherentManager->getAdherentById($id_Adherent);
    
                $inscriptionManager =  new InscriptionManager($lePDO);
                $uneInscription     =  $inscriptionManager->getInscriptionByIdAdherent($id_Adherent);
                $id_Seance          = $uneInscription->getIdSeance();
    
                $seanceManager      =  new SeanceManager($lePDO);
                $uneSeance          =  $seanceManager->getSeanceById($id_Seance);
    
                $id_Prof            =  $uneSeance->getIdProf();
                $professeurManager  = new professeurManager($lePDO);
                $unProfesseur       = $professeurManager->getProfesseureById($id_Prof);
    
                $id_Instrument      = $uneSeance->getIdInstrument();
                $instrumentManager  =  new InstrumentManager($lePDO);
                $unInstrument       = $instrumentManager->getInstrumentById($id_Instrument);


                require "fpdf/genpdf.php";
                break;
        


    case"deconnexion":
        
        unset($_SESSION["role"]);
        unset($_SESSION["employer"]);
        require "view/deconnexion.php";
        break;


    default:
        require("view/404.php");

        
}

include "view/footer.php";
