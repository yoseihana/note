<div class="note">
    <p class="retour"><a href="<?php echo Url::listerNote(); ?>">Retour à la liste de note</a></p>

    <h2>
        Note du <?php echo $view['data']['note'][Note::DATE_PARUTION] ?>
        - <?php echo $view['data']['note'][Note::TITRE] ?>
    </h2>

    <p><?php echo($view['data']['note'][Note::NOTE]); ?></p>
    <?php if (MainController::isAuthenticated()): ?>
    <p><a href="<?php echo Url::modifierNote($view['data']['note']['id']); ?>">Modifier</a>
        - <a href="<?php echo Url::supprimerNote($view['data']['note']['id']); ?>">Supprimer</a></p>
    <?php endif; ?>
</div>

<div class="bouton">
    <?php if (MainController::isAuthenticated()): ?>
    <p><a href="<?php echo Url::ajouterNote(); ?>">Ajouter une note</a></p>
    <?php else: ?>
    <p><a href="<?php echo Url::connexionMembre(); ?>">Vous devez vous connecter pour modifier ou supprimer la note</a>
    </p>
    <?php endif; ?>
</div>
