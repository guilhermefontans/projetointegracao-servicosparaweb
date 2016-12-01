<?php

namespace Integrador\Model;
use Integrador\Model\Dao;

class EventoDao extends Dao
{
    public function __construct()
    {
        parent::__construct("Evento");
    }
}
