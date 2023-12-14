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

<div class="box">
    <div class="file">
        <label for="picture">Rajouter une photo de profil</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="60000" /> 
        <input type="file" id="picture" name="picture">              
    </div>
    <div class="img">
        <img src="<?= "images\\".$pict?>" alt="" width="80px">
    </div>
    <input type="hidden" id="picture" name="pict" value="
        <?php echo (!isset($_SESSION['erreur']['6']) && !empty($pict)) ? $pict : "" ?>">
        <?php echo isset($_SESSION['erreur']['6']) ? "<p>".$_SESSION['erreur']['6']."</p>" : "" ?>
</div>

<input type="submit" name='send' value="Envoyer">

