<?php
if(session_status() == 'PHP_SESSION_ACTIVE'){
    unset($_SESSION['erreur']);
}
if(!empty($_POST)){
    require 'control\valid_data.php';
    if(empty($_SESSION['erreur'])){
        require 'model\save_user.php';
    }
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
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" style="text-transform:uppercase" maxlength="10"
                <?php echo ( !isset($_SESSION['erreur']['1']) && !empty($nom)) ? "value='".$nom."'" : "" ?>
                <?php echo isset($_SESSION['erreur']['1']) ? "placeholder='".$_SESSION['erreur']['1']."'" : "" ?> required>
    
            <label for="Surname">Prénom</label>
            <input type="text" id="surname" name="surname" style="text-transform:capitalize"
                <?php echo !empty($pren) ? "value='".$pren."'" : "" ?>
                <?php echo isset($_SESSION['erreur']['2']) ? "placeholder='".$_SESSION['erreur']['2']."'" : "" ?> required>
    
            <label for="email">Email</label>
            <input type="email" id="email" name="email" 
                <?php echo ( !isset($_SESSION['erreur']['3']) && !empty($email)) ? "value='".$email."'" : "" ?>
                <?php echo isset($_SESSION['erreur']['3']) ? "placeholder='".$_SESSION['erreur']['3']."'" : "" ?> required>
    
            <label for="site">Votre site</label>
            <input type="url" id="site" name="site" 
                <?php echo ( !isset($_SESSION['erreur']['4']) && !empty($site)) ? "value='".$site."'" : "" ?>
                <?php echo isset($_SESSION['erreur']['4']) ? "placeholder='".$_SESSION['erreur']['4']."'" : "" ?> required >
    
            <label for="phone">Télephone</label>
            <input type="number" id="phone" name="tel" maxlength="10" minlength="10"
                <?php echo ( !isset($_SESSION['erreur']['5']) && !empty($tel)) ? "value='".$tel."'" : "" ?>
                <?php echo isset($_SESSION['erreur']['5']) ? "placeholder='".$_SESSION['erreur']['5']."'" : "" ?> required>
    
            <label for="picture">Rajouter une photo de profil</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="60000" />
            <input type="file" id="picture" name="picture" required>
            <?php echo isset($_SESSION['erreur']['6']) ? "<p class='error'>".$_SESSION['erreur']['6']."</p>" : "" ?>
    
            <input type="submit" name='send' value="Envoyer">
        </form> 
    </fieldset>
    </div>
</body>
</html>