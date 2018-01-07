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

    public function findOneBy($entity, array $conditions)
    {
        return [];
    }

    public function find($entity, $rowId)
    {
        return R::load($entity, $rowId);
    }

    public function findAll($entity)
    {
        return R::findAll($entity);
    }

    public function findBy($entity, $conditions = array(), $order = array(), $limit = null, $offset = null)
    {
        return [];
    }

    public function save($entity)
    {
        return [];
    }

    public function remove($entity)
    {
        return [];
    }

    public function findAllPaginated($entity, $conditions = array(), $order = array(), $limit = 100, $offset = 0)
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