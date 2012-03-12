<div class="note">
    <p class="retour"><a href="<?php echo listerNoteUrl(); ?>">Retour à la liste de note</a></p>

    <h2>
        Etes-vous sûr de vouloir supprimer la note du <?php echo $view['data']['note']['date_parution']; ?> ?
    </h2>

    <p class="supprimer">
        <?php echo $view['data']['note']['titre']; ?>
    </p>

    <form action="<?php echo ($_SERVER['PHP_SELF']);?>" method='POST'>
        <fieldset>

            <input type="hidden" name="c" value="<?php echo ($valideControlleur['note']); ?>"/>
            <input type="hidden" name="a" value="<?php echo ($valideActions['supprimer']); ?>"/>
            <input type="hidden" name="id" value="<?php echo ($view['data']['note']['id']); ?>"/>
            <input type="submit" value="Supprimer">
            </label>
        </fieldset>
    </form>
</div>