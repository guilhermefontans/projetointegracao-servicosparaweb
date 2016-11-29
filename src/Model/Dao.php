<?php

namespace Integrador\model;
use Illuminate\Database\Capsule\Manager as DB;

/**
 * Class Dao
 *
 * @category
 * @package  Model
 * @author   Guilherme Fontans <guilherme.fontans@gmail.com>
 */
abstract class Dao
{
    private $tableName;

    public function __construct($tableName)
    {
        $this->tableName = $tableName;
    }

    public function insert(array $values)
    {
        try{
            DB::beginTransaction();
            DB::table($this->tableName)->insert($values);
            DB::commit();
        } catch (Exception $ex){
            DB::rollback();
            throw $ex;
        }
    }

    public function update($filter = false, array $values)
    {
        try{
            DB::beginTransaction();

            if (empty($filter)) {
                DB::table($this->tableName)->update($values);
            } else {
                DB::table($this->tableName)
                    ->where(
                        $filter[0],
                        $filter[1],
                        $filter[2]
                    )->update($values);
            }

            DB::commit();
        } catch (Exception $ex){
            DB::rollback();
            throw $ex;
        }
    }

    public function find($filter = false)
    {
        try{
            DB::beginTransaction();

            if (empty($filter)) {
                $premios = DB::table($this->tableName)->get();
            } else {
                $premios = DB::table($this->tableName)
                    ->where(
                        "$filter[0]",
                        "$filter[1]",
                        "$filter[2]"
                    )->get();
            }

            DB::commit();
            return $premios;
        } catch (Exception $ex){
            DB::rollback();
            throw $ex;
        }
    }

    public function byId($field, $id)
    {
        try{
            DB::beginTransaction();

            $premio = DB::table($this->tableName)
                ->where($field, $id)
                ->first();
            DB::commit();
            return $premio;
        } catch (Exception $ex){
            DB::rollback();
            throw $ex;
        }
    }

    public function delete($filter = false)
    {
        try{
            DB::beginTransaction();

            if (empty($filter)) {
                DB::table($this->tableName)->delete();
            } else {
                DB::table($this->tableName)
                    ->where(
                        $filter[0],
                        $filter[1],
                        $filter[2]
                    )->delete();
            }

            DB::commit();
        } catch (Exception $ex){
            DB::rollback();
            throw $ex;
        }
    }
}
