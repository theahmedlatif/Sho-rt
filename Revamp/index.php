<?php

require_once ('src/User.php');
use Short\User;

$newUser = new User;
$newUser->createUser('test_rev', '123', 'test_email@test.test');