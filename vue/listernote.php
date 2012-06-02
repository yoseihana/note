<div class="note">
    <?php if (count($view['data']['notes']) > 0): ?>
    <ul>
        <?php foreach ($view['data']['notes'] as $note): ?>
        <li>
            <h2><a href="<?php echo Url::voirNote($note[Note::ID]); ?>"><?php echo($note[Note::TITRE]); ?></a>
                - <?php echo($note[Note::DATE_PARUTION]); ?></h2>

            <p><a href="<?php echo Url::modifierNote($note[Note::ID]); ?>">Modifier</a>
                - <a href="<?php echo Url::supprimerNote($note[Note::ID]); ?>">Supprimer</a></p>
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
        <a href="<?php echo Url::ajouterNote(); ?>">Ajouter une note</a>
    </p>
</div>

