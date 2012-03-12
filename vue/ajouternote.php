<div class="note">
<p class="retour"><a href="<?php echo listerNoteUrl(); ?>">Retour à la liste de note</a></p>
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
            <textarea rows="8" cols="50" id="note" name="note">
            </textarea>
        </label>
            <input type="hidden" name="c" value="<?php echo ($valideControlleur['note']); ?>"/>
            <input type="hidden" name="a" value="<?php echo ($valideActions['ajouter']); ?>"/>
            <br/>
            <input type="submit" value="Ajouter">

    </fieldset>
</form>
</div>