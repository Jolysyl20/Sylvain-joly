
<?php
$dossier = 'upload/';
$fichier = basename($_FILES['file']['name']);
$taille_maxi = 10000;
$taille = filesize($_FILES['file']['tmp_name']);
$extensions = array('.txt');
$extension = strrchr($_FILES['file']['name'], '.'); 
$oFichier="fileUpload$extension";
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type txt ';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    
     
     if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $oFichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
        
         header ("Location: analyse.php");
         echo 'Upload effectué avec succès !';
         echo '<br>';

     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}
?>
