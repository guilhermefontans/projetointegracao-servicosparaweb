<?php

$ctrl = Integrador\Controller\SalaController::class;

$app->get('/salas', "$ctrl::all");
