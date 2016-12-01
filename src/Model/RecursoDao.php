<?php

namespace Integrador\Model;
use Integrador\Model\Dao;

class RecursoDao extends Dao
{
    public function __construct()
    {
        parent::__construct("Recurso");
    }
}
