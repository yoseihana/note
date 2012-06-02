<?php

ini_set('display_errors', 1);

include_once 'config/DB.php';

include ('./config/config.php');
include ('./helpers/Url.php');
require_once './controlleur/MainController.php';

$view = MainController::route();

include('./vue/layout.php');