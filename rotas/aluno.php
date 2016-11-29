<?php

$ctrl = Integrador\Controller\AlunoController::class;

$app->get('/alunos', "$ctrl::all");
