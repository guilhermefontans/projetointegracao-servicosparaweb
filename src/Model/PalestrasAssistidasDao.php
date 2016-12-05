<?php

namespace Integrador\Model;
use Integrador\Model\Dao;
use Illuminate\Database\Capsule\Manager as DB;

class PalestrasAssistidasDao extends Dao
{
    public function __construct()
    {
        parent::__construct("Participa");
    }

    public function getLectureList($ra)
    {
        try{
            DB::beginTransaction();
            $results = DB::select(
                'SELECT
                    pa.Titulo,
                    pa.DataHora
                FROM
                    Aluno AS a
                    JOIN Participa AS p ON p.ra = a.ra
                    JOIN Palestra AS pa ON pa.Id_Palestra = p.Id_PAlestra
                WHERE a.RA ='. $ra
            );

            DB::commit();
            return $results;
        } catch (Exception $ex){
            DB::rollback();
            throw $ex;
        }
    }
}
