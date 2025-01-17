<?php declare(strict_types = 1);

namespace Core\Adapter;

interface BaseRepositoryInterface
{
    public function findOneBy($table, array $conditions);
    public function find($table, $rowId);
    public function findAll($table);
    public function findBy($table, $query = NULL, $order = NULL, $orderDirection = 'DESC', $limit = null, $offset = null);
    public function save($table, $data);
    public function update($entiry, $data);
    public function remove($entity);
}
