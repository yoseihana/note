<div class="note">
    <?php if (count($view['data']['notes']) > 0): ?>
    <ul>
        <?php foreach ($view['data']['notes'] as $note): ?>
        <li>
            <h2><a href="<?php echo voirNoteUrl($note['id']); ?>"><?php echo($note['titre']); ?></a>
                - <?php echo($note['date_parution']); ?></h2>

            <p><a href="<?php echo modifierNoteUrl($note['id']); ?>">Modifier</a>
                - <a href="<?php echo supprimerNoteUrl($note['id']); ?>">Supprimer</a></p>
        </li>
        <?php endforeach; ?>
    </ul>

    <div class="pagination">
        <?php for ($i = 1; $i <= $view['data']['nbPage']; $i++): ?>
        <a href="index.php?a=lister&c=note&page=<?php echo $i ?>"><?php echo $i ?></a>
        <?php endfor; ?>
    </div>

    <?php endif; ?>
</div>
<div class="bouton">
    <p>
        <a href="<?php echo ajouterNoteUrl(); ?>">Ajouter une note</a>
    </p>
</div>

