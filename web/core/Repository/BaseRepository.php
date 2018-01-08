<?php declare(strict_types = 1);

namespace Core\Repository;

use Core\Adapter\BaseRepositoryInterface;
use RedBeanPHP\R as R;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct()
    {
        //ToDo: Get this DB credentials from .env file using env package
        /*
        * Since this is the trial project, I've used simple ORM redbean(https://github.com/gabordemooij/redbean). Instead we can use more standatfs & stable one like doctrine or Illuminate
        */
        R::setup("pgsql:dbname=hellofresh;host=postgres", "hellofresh", "hellofresh");
    }

    public function findOneBy($table, array $conditions)
    {
        return [];
    }

    public function find($table, $rowId)
    {
        return R::load($table, $rowId);
    }

    public function findAll($table)
    {
        return R::findAll($table);
    }

    public function findBy($table, $conditions = array(), $order = array(), $limit = null, $offset = null)
    {
        return [];
    }

    public function save($table, $data)
    {
        $entity = R::dispense($table);
        foreach($data as $key => $value) {
            $entity->{$key} = $value;
        }
        $lastId = R::store($entity);
        return $lastId;
    }

    public function remove($table)
    {
        return [];
    }

    public function findAllPaginated($table, $conditions = array(), $order = array(), $limit = 100, $offset = 0)
    {
        return  [];
    }

    public function beginTransaction()
    {}

    public function commitTransaction()
    {}

    public function rollBack()
    {}
}