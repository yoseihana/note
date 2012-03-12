<div class="note">
    <p class="retour"><a href="<?php echo listerNoteUrl(); ?>">Retour à la liste de note</a></p>

    <h2>
        Note du <?php echo $view['data']['note']['date_parution'] ?> - <?php echo $view['data']['note']['titre'] ?>
    </h2>

    <p><?php echo($view['data']['note']['note']); ?></p>

    <p><a href="<?php echo modifierNoteUrl($view['data']['note']['id']); ?>">Modifier</a>
        - <a href="<?php echo supprimerNoteUrl($view['data']['note']['id']); ?>">Supprimer</a></p>
</div>
<div class="bouton">
    <p><a href="<?php echo ajouterNoteUrl(); ?>">Ajouter une note</a></p>
</div>