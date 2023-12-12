<?php
if(session_status() == 'PHP_SESSION_ACTIVE'){
    unset($_SESSION['erreur']);
}
if(!empty($_POST)){
    require 'control\valid_data.php';
    if(empty($_SESSION['erreur'])){
        require 'model\save_user.php';
    }
    var_dump($_SESSION);
}
require 'model\functions\functions.php';
    $restrict = date_permit(18);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="creation.css">
    <title>Page d'inscription</title>
</head>
<body>
    <div class="contain">
    <fieldset>
        <h1>Page de création</h1>
        <form method="post" action="creation.php" enctype="multipart/form-data">
            <?php include 'formulaire.php';?>
        </form> 
    </fieldset>
    </div>
</body>
</html>