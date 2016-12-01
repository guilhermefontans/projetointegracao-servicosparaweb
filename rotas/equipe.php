<?php

$ctrl = Integrador\Controller\EquipeController::class;

$app->get('/equipes', "$ctrl::all");
$app->get('/equipe/{id}', "$ctrl::byId");
$app->post('/equipe/add/{id}/{nome}/{email}/{telefone}/{senha}', "$ctrl::add");
$app->put('/equipe/update/{id}/{nome}/{email}/{telefone}/{senha}', "$ctrl::update");
$app->delete('/equipe/delete/{id}', "$ctrl::delete");
