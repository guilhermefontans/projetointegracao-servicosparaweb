<?php

$ctrl = Integrador\Controller\PalestrasAssistidasController::class;

$app->get('/palestras_assistidas/{ra}', "$ctrl::byId");
