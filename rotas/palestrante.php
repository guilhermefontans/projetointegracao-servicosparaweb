<?php

$ctrl = Integrador\Controller\PalestranteController::class;

$app->get('/palestrantes', "$ctrl::all");
$app->get('/palestrante/{codigo}', "$ctrl::byId");
$app->post('/palestrante/add/{codigo}/{nome}/{minicurriculo}/{foto}', "$ctrl::add");
$app->put('/palestrante/update/{codigo}/{nome}/{minicurriculo}/{foto}', "$ctrl::update");
$app->delete('/palestrante/delete/{codigo}', "$ctrl::delete");
