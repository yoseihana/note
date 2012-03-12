<div class="note">
<p class="retour"><a href="<?php echo listerNoteUrl(); ?>">Retour à la liste de note</a></p>
<h2>
    Modifier la note du <?php echo $view['data']['note']['date_parution']; ?>
</h2>
<form action="<?php echo ($_SERVER['PHP_SELF']);?>" method='POST'>
    <fieldset>
        <label for="titre">
            Titre
        </label>
        <input type="text" name="titre" id="titre" value="<?php echo $view['data']['note']['titre'] ?>"/>
        <label for="note">
            <textarea rows="8" cols="50" id="note" name="note">
                <?php echo $view['data']['note']['note']; ?>
            </textarea>
        </label>
            <input type="hidden" name="c" value="<?php echo ($valideControlleur['note']); ?>"/>
            <input type="hidden" name="a" value="<?php echo ($valideActions['modifier']); ?>"/>
            <input type="hidden" name="id" value="<?php echo ( $view['data']['note']['id']); ?>"/>
            <br/>
            <input type="submit" value="Modifier">
    </fieldset>
</form>
</div>