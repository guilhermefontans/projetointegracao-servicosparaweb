<?php

$ctrl = Integrador\Controller\SalaController::class;

$app->get('/salas', "$ctrl::all");
$app->get('/sala/{codigo}', "$ctrl::byId");
$app->post('/sala/add/{codigo}/{descricao}/{adaptada}', "$ctrl::add");
$app->put('/sala/update/{codigo}/{descricao}/{adaptada}', "$ctrl::update");
$app->delete('/sala/delete/{codigo}', "$ctrl::delete");
