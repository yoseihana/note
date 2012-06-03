<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xml:lang="fr-BE"
      lang="fr-BE">

<head>
    <meta http-equiv="Content-Type"
          content="text/html; charset=utf-8"/>
    <meta http-equiv="Content-Style-Type"
          content="text/css"/>
    <meta http-equiv="Content-Language"
          content="fr"/>

    <title>
        Carnet de notes
    </title>

    <link rel="stylesheet"
          type="text/css"
          href="./vue/screen.css"
          media="screen"
          title="Normal"/>
</head>
<body>
<div class="header">
    <?php if (MainController::isAuthenticated()): ?>
    <p>
        Mes notes : vous êtes connecté

    </p>
    <?php else: ?>
    <p>Mes notes: vous n'êtes pas conecté</p>
    <?php endif; ?>
</div>
<div class="content">
    <?php include($view['html']); ?>
</div>
<div class="footer">
    <?php if (!MainController::isAuthenticated()): ?>
    <p>
        <a href="<?php echo Url::connexionMembre(); ?>">Connexion</a> - Annabelle Buffart - Mai 2012
    </p>
    <?php else: ?>
    <p>
        <a href="<?php echo Url::deconnexionMembre(); ?>">Deconnexion</a> - Annabelle Buffart - Mai 2012
    </p>
    <?php endif; ?>
</div>
</body>

</html>