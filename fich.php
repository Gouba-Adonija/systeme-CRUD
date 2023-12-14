<?php
    // Chemin de l'image à modifier
    $cheminImage = 'chemin/vers/votre/image.jpg';

    // Vérifier si le formulaire est soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifier si le fichier a été correctement téléchargé
        if ($_FILES['nouvelle_image']['error'] === UPLOAD_ERR_OK) {
            // Vérifier le type du fichier
            $infoFichier = getimagesize($_FILES['nouvelle_image']['tmp_name']);
            $extension = image_type_to_extension($infoFichier[2], false);
            $extensionsAutorisees = ['jpeg', 'jpg', 'png', 'gif'];

            if (in_array($extension, $extensionsAutorisees)) {
                // Supprimer l'ancienne image
                if (file_exists($cheminImage)) {
                    unlink($cheminImage);
                }

                // Déplacer la nouvelle image vers le chemin spécifié
                move_uploaded_file($_FILES['nouvelle_image']['tmp_name'], $cheminImage);

                echo '<p>Image modifiée avec succès !</p>';
            } else {
                echo '<p>Erreur : Type de fichier non autorisé. Veuillez télécharger une image JPEG, JPG, PNG ou GIF.</p>';
            }
        } else {
            echo '<p>Erreur lors du téléchargement de l\'image.</p>';
        }
    }
    ?>

    <!-- Afficher l'image existante -->
    <img src="<?php echo $cheminImage; ?>" alt="Image existante">

    <!-- Formulaire pour télécharger la nouvelle image -->
    <form method="post" enctype="multipart/form-data">
        <label for="nouvelle_image">Choisir une nouvelle image :</label>
        <input type="file" name="nouvelle_image" accept="image/jpeg, image/jpg, image/png, image/gif" required>
        <button type="submit">Modifier l'image</button>
    </form>