<?php

$ctrl = Integrador\Controller\AlunoController::class;

$app->get('/alunos', "$ctrl::all");
$app->get('/aluno/{ra}', "$ctrl::byId");
