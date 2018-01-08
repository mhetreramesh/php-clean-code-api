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
        return R::findAll($table, ' name LIKE ? ORDER BY id DESC LIMIT 5', ['%Jae%'] );
    }

    public function findBy($table, $query = NULL, $order = NULL, $orderDirection = 'DESC', $limit = null, $offset = null)
    {
        $sql = '';
        $params = [];
        if($query) {
            $sql .= ' name LIKE ?';
            $params[] = '%'.$query.'%';
        }
        if($order) {
            $sql .= ' ORDER BY ? '.$orderDirection;
            $params[] = $order;
        }
        if($offset) {
            $sql .= ' OFFSET ?';
            $params[] = $offset;
        }
        if($limit) {
            $sql .= ' LIMIT ?';
            $params[] = $limit;
        }
        return R::findAll($table, $sql, $params);
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

    public function update($entity, $data)
    {
        foreach($data as $key => $value) {
            if($key && $value) continue;
            $entity->{$key} = $value;
        }
        $lastId = R::store($entity);
        return $lastId;
    }

    public function remove($entity)
    {
        R::trash($entity);
    }

    public function beginTransaction()
    {}

    public function commitTransaction()
    {}

    public function rollBack()
    {}
}