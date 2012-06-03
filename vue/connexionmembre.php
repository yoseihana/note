<div class="note">
    <p class="retour"><a href="<?php echo Url::listerNote(); ?>">Retour à la liste de note</a></p>

    <h2>
        <?php $view['data']['view_title']; ?>
    </h2>

    <form action="<?php echo ($_SERVER['PHP_SELF']);?>" method='POST'>
        <fieldset>
            <label for="mail">
                Email
            </label>
            <br/>
            <input type="text" id="mail" name="mail" value="Email"/>
            <br/>
            <label for="mdp">
                Mot de passe
            </label>
            <br/>
            <input type="text" id="mdp" name="mdp" value="Mot de passe"/>
            <br/>
            <input type="hidden" name="c" value="<?php echo MainController::getLastController() ?>"/>
            <input type="hidden" name="a" value="<?php echo MainController::getLastAction() ?>"/>
            <input type="submit" value="Connexion">

        </fieldset>
    </form>
</div>