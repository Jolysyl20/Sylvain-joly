<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>analyse de fichier</title>
    <meta name="description" content="Multi-Level Push Menu: Off-screen navigation with multiple levels" />
    <meta name="keywords" content="multi-level, menu, navigation, off-canvas, off-screen, mobile, levels, nested, transform" />
    <meta name="author" content="JSyl20" />
    <!--only css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <!--only JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>  
</head>
<body>
<?php
if (!isset($_POST['valider'])) {
?>
<div class="container" > 
<div class="col"style="             text-align: center;
                                    background-color: #80808026;
                                    margin-top: 5%;
                                    margin-left: 25%;
                                    margin-right: 25%;
                                    padding: 3%;
                                    border-radius: 19px;">
<form method="POST" >
    <h2>On y est presque...</h2>
    <h3>Entrer le mot ou phrase à rechercher</h3>
   <p>Fichier en cour d'analyse</p>
    <div class="SkillBar">
    <div id="Skill-HTML"> 
        
      <span class="Skill-Area "></span>
      <span class="PercentText ">97%</span>
    </div>
  </div>
<br>
    <input type="text" name="mot" placeholder="Mot recherché"/>
    <input type="submit" value="valider" name="valider"/>
</form>
</div>
</div>
<?php
} else {
  
    $resultats =array();
    $mot=$_POST['mot'];
    
    $ofichier="upload/fileUpload.txt";
    $fp = fopen($ofichier, 'rb') or die('Ouverture en lecture de "' . $ofichier . '" impossible !');
    ?>

    <?php
    while (!feof($fp)) {
        $ligne = fgets($fp);
        if (preg_match('|\b' . preg_quote($mot) . '\b|i', $ligne)) {
            $resultats[] = $ligne;
        }
        ?>

        <?php
    }
    fclose($fp);
    $nb = count($resultats);
    if ($nb > 0) {
        echo '<h1 style="margin-left: 45%">Résultat</h1><br>';
        echo "<div class='col'style='text-align: center';>
        <h2><mark> $mot.</mark> a été trouvé $nb fois </h2></div> <br> ";
        echo '<div style="text-align:center">';
        echo '<textarea style=" width: 653px; height: 276px;">';
        
        foreach ($resultats as $v) {
            echo" * .$v";
        }
       
        echo '</textarea><br>';
        echo '</div>';
        echo '<br><div style="text-align:center">
        <a href="../../index.html" > <input type="button" value="retour accueil"></a>
        </div>';
    } else {
        die("Ce nom n'est pas présent !");
    }
}
?>
</body>
</html>