<?php

require_once 'DB.php';
require_once './controlleur/MainController.php';
require_once './controlleur/NoteController.php';

define(DB::DRIVER, 'mysql');
define(DB::HOST, 'localhost');
define(DB::NAME, 'notes');
define(DB::USER, 'root');
define(DB::PASSWORD, 'root');

define(MainController::DEFAULT_CONTROLLER, NoteController::getName());
define(MainController::DEFAULT_ACTION, NoteController::getDefaultAction());