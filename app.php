<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('FUNC', 'functions');

// bdd connexion
require_once FUNC . '/connection.php';

// Other function
require_once FUNC . '/includer.php';
require_once FUNC . '/database.php';
require_once FUNC . '/dumper.php';
require_once FUNC . '/utils.php';
require_once FUNC . '/router.php';
require_once FUNC . '/template.php';
require_once FUNC . '/alert.php';
require_once FUNC . '/validation.php';
require_once FUNC . '/calculations.php';