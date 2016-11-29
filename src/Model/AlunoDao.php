<?php

namespace Integrador\Model;
use Integrador\Model\Dao;

class AlunoDao extends Dao
{
    public function __construct()
    {
        parent::__construct("Aluno");
    }
}
