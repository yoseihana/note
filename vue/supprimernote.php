<div class="note">
    <p class="retour"><a href="<?php echo Url::listerNote(); ?>">Retour à la liste de note</a></p>

    <h2>
        Etes-vous sûr de vouloir supprimer la note du <?php echo $view['data']['note'][Note::DATE_PARUTION]; ?>
        ?
    </h2>
    <?php if (MainController::isAuthenticated()): ?>
    <form action="<?php echo ($_SERVER['PHP_SELF']);?>" method='POST'>
        <fieldset>
            <p class="supprimer">
                <?php echo $view['data']['note'][Note::TITRE]; ?>
            </p>

            <input type="submit" value="Supprimer">
        </fieldset>
        <input type="hidden" name="c" value="<?php echo MainController::getLastController() ?>"/>
        <input type="hidden" name="a" value="<?php echo MainController::getLastAction() ?>"/>
        <input type="hidden" name="id" value="<?php echo ($view['data']['note'][Note::ID]); ?>"/>
    </form>
    <?php else: ?>
    <p>Vous devez vous connecter pour acceder à cette page.</p>
    <?php endif; ?>
</div>
<?php if (!MainController::isAuthenticated()): ?>
<div class="bouton">
    <p>
        <a href="<?php echo Url::connexionMembre(); ?>">Se connecter</a>
    </p>
</div>
<?php endif; ?>