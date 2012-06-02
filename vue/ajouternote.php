<div class="note">
    <p class="retour"><a href="<?php echo Url::listerNote(); ?>">Retour à la liste de note</a></p>

    <h2>
        Ajouter une note
    </h2>

    <form action="<?php echo ($_SERVER['PHP_SELF']);?>" method='POST'>
        <fieldset>
            <label for="titre">
                Titre
            </label>
            <input type="text" id="titre" name="titre" value="titre"/>
            <br/>
            <label for="note">
                Note
            </label>
            <textarea rows="8" cols="50" id="note" name="note">
            </textarea>
            <br/>
            <input type="hidden" name="c" value="<?php echo MainController::getLastController() ?>"/>
            <input type="hidden" name="a" value="<?php echo MainController::getLastAction() ?>"/>
            <input type="submit" value="Ajouter">

        </fieldset>
    </form>
</div>