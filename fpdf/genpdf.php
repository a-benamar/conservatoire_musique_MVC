<?php
  ob_start();
require('fpdf.php');

class PDF extends FPDF
{

// En-tête
function Header()
{
 
    // Logo
    $this->Image('https://img.myloview.fr/papiers-peints/affiche-de-musique-coloree-avec-disque-vinyle-et-instruments-de-musique-illustration-vectorielle-de-musique-fond-design-clavier-de-piano-colore-violoncelle-guitare-saxophone-trompette-et-microph-400-111434651.jpg',90,-6,35,35);
    $this->Ln(20);

    // Police Arial gras 15
    $this->SetFont('Courier','B',20);

    // Décalage à droite
   // $this->Cell(80);

    // Titre
    $this->Cell(0,12,"ATTESTATION D'INSCRIPTION","TB",1,'C');

   // $this->Cell(0,10,'N: ',0,1,'C');
     
      // Saut de ligne
    $this->Ln(12);
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','',8);
    // Numéro de page
    // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$h =10;
$retrait = "                ";

$pdf->SetFont('Helvetica', '');
$pdf->Write($h,"  Je soussigne, Directeur du conservatoire  ZIK MUSIC certifie que l'adherent: \n");
$pdf->Ln(5);
$pdf->SetFont('Courier', '');
$pdf->Write($h, $retrait . "Nom & Prenom  :  ");
$pdf->SetFont('Helvetica', 'B');
$pdf->Write($h, $unAdherent->getNomAdherent()." ". $unAdherent->getPrenomAdherent()."\n");
$pdf->SetFont('Courier', '');
$pdf->Write($h, $retrait . "Adresse mail  :  ");
$pdf->SetFont('Helvetica', 'B');
$pdf->Write($h, $unAdherent->getMailAdherent() . "\n");
$pdf->SetFont('Courier', '');
$pdf->Write($h, $retrait . "N. Telephone  :  ");
$pdf->SetFont('Helvetica', 'B');
$pdf->Write($h, $unAdherent->getTelAdherent() . "\n");

// ecriture en gras italique souligné

$pdf->Ln(8);

$pdf->Cell(0,10,"","T",1,'C');
$pdf->SetFont('Helvetica', '');
$pdf->Write($h,"  Inscrit(e) le : ");
$pdf->SetFont('', 'B');
$pdf->Write($h, date("d-m-Y", strtotime($unAdherent->getDateInscription())));
$pdf->SetFont('Helvetica', '');
$pdf->Write($h,",   Sous le Numero: ");
$pdf->SetFont('', 'B');
$pdf->Write($h ,"00".$uneInscription->getIdAdherent().$uneInscription->getIdSeance());
$pdf->SetFont('Helvetica', '');
$pdf->Write($h ,"  au : \n");
$pdf->Ln(4);
$pdf->SetFont('Courier', '');
$pdf->Write($h, $retrait ."Type d'instrument : ");
$pdf->SetFont('Helvetica', 'B');
$pdf->Write($h, $unInstrument->getLibInstrument() . "\n");
$pdf->SetFont('Courier', '');
$pdf->Write($h, $retrait ."Date de Seance    : ");
$pdf->SetFont('Helvetica', 'B');
$pdf->Write($h, $uneSeance->getDateSeance() . "\n");
$pdf->SetFont('Courier', '');
$pdf->Write($h, $retrait ."Nom de professeur : ");
$pdf->SetFont('Helvetica', 'B');
$pdf->Write($h, $unProfesseur->getNomProf() . " " . $unProfesseur->getPrenomProf() ."\n");
$pdf->Ln(5);
$pdf->SetFont('Helvetica', '');
$pdf->Write($h,"  La presente attestation est delivree a l'interesse pour servir et valoir c que de droit. \n");


$pdf->Ln(8);
$pdf->Cell(0,5,"Fait a Cachan Le : " . date('d/m/ Y'),0,1,'C');
$pdf->Ln(5);
$pdf->Cell(50);
$pdf->Cell(88,8,"Le directeur de l'etablissement", 1,1,'C');
$pdf->Cell(50);
$pdf->Cell(88,5,"M. Abdel BEN AMAR", 'LR',1,'C');
$pdf->Cell(50);
$pdf->Cell(88,5,"", 'LR',1,'C');
$pdf->Cell(50);
$pdf->Cell(88,5,"", 'LR',1,'C');
$pdf->Cell(50);
$pdf->Cell(88,5,"", 'LR',1,'C');
$pdf->Cell(50);
$pdf->Cell(88,5,"", 'LR',1,'C');
$pdf->Cell(50);
$pdf->Cell(88,5,"", 'LR',1,'C');
$pdf->Cell(50);
$pdf->Cell(88,5,"", 'LRB',1,'C');

$pdf->Output();
ob_end_flush();
?>