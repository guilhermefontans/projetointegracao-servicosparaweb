<?php

$ctrl = Integrador\Controller\AlunoController::class;

$app->get('/alunos', "$ctrl::all");
$app->get('/aluno/{ra}', "$ctrl::byId");
$app->post('/aluno/add/{ra}/{nome}/{email}/{telefone}/{senha}', "$ctrl::add");
$app->put('/aluno/update/{ra}/{nome}/{email}/{telefone}/{senha}', "$ctrl::update");
$app->delete('/aluno/delete/{ra}', "$ctrl::delete");
