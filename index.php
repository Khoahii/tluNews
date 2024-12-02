<?php
// Bao gồm file User.php
require_once __DIR__ . '/models/User.php';

require_once 'models/User.php';

$userModel = new Userr();

print_r($userModel->getAllUsers());

?>
