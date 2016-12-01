<?php

$ctrl = Integrador\Controller\EventoController::class;

$app->get('/eventos', "$ctrl::all");
$app->get('/evento/{codigo}', "$ctrl::byId");
$app->post('/evento/add/{codigo}/{nome}/{inscricaoinicio}/{inscricaofim}/{execucaoinicio}/{execucaofim}/{disponibilidadeinicio}/{disponibilidadefim}/{status}', "$ctrl::add");
$app->put('/evento/update/{codigo}/{nome}/{inscricaoinicio}/{inscricaofim}/{execucaoinicio}/{execucaofim}/{disponibilidadeinicio}/{disponibilidadefim}/{status}', "$ctrl::update");
$app->delete('/evento/delete/{codigo}', "$ctrl::delete");
