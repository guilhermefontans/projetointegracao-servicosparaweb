<?php

namespace Integrador\Model;
use Integrador\Model\Dao;

class SalaDao extends Dao
{
    public function __construct()
    {
        parent::__construct("Sala");
    }
}
