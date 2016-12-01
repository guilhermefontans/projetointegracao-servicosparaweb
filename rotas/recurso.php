<?php

$ctrl = Integrador\Controller\RecursoController::class;

$app->get('/recursos', "$ctrl::all");
$app->get('/recurso/{codigo}', "$ctrl::byId");
$app->post('/recurso/add/{codigo}/{descricao}/{quantidade}', "$ctrl::add");
$app->put('/recurso/update/{codigo}/{descricao}/{quantidade}', "$ctrl::update");
$app->delete('/recurso/delete/{codigo}', "$ctrl::delete");
