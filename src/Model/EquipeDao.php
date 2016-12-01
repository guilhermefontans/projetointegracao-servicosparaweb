<?php

namespace Integrador\Model;
use Integrador\Model\Dao;

class EquipeDao extends Dao
{
    public function __construct()
    {
        parent::__construct("Equipe");
    }
}
