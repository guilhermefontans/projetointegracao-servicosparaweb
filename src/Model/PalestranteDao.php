<?php

namespace Integrador\Model;
use Integrador\Model\Dao;

class PalestranteDao extends Dao
{
    public function __construct()
    {
        parent::__construct("Palestrante");
    }
}
