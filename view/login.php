<!--init du title-->
<?php $title= 'Exemple Annonces Basic PHP: Connexion'; ?>

<?php ob_start(); ?>

<!--formulaire de connexion pour l'utilisateur-->
    <form method="post" action="index.php/annonces">
        <label for="login"> Votre identifiant </label> :
        <input type="text" name="login" id="login" placeholder="defaut" maxlength="12" required />
        <br />
        <label for="password"> Votre mot de passe </label> :
        <input type="password" name="password" id="password" maxlength="12" required />

        <input type="submit" value="Envoyer">
    </form>
<?php $content = ob_get_clean(); //stock le html ?>

<?php require 'layout.php'; ?>