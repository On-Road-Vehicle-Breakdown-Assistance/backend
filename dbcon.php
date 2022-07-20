<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Auth;

$factory = (new Factory)
            ->withServiceAccount('gear-up-56ec5-firebase-adminsdk-7ifqv-d99c671384.json')
            ->withDatabaseUri('https://gear-up-56ec5-default-rtdb.firebaseio.com/');

            $database = $factory->createDatabase();
            $auth = $factory->createAuth();
?>