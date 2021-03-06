<?php
namespace Core;

/**
 * 模型基类，应用模型继承于此类
 * Class Model
 * @package Core
 */
class Model
{
    /**
     * @var Medoo 数据库对象
     */
    protected $db;

    /**
     * @var string
     */
    public $tableName;

    public function __construct($dbServiceName = 'db')
    {
        $this->getDb($dbServiceName);
    }

    public function getTablePrefix(){
        return $this->db->getPrefix();
    }

    /**
     * @param string $dbServiceName
     * @return Medoo
     */
    public function getDb($dbServiceName = 'db')
    {
        return $this->db = ServiceLocator::getInstance()->get($dbServiceName);
    }

    public function getTable()
    {
        return $this->tableName;
    }

    public function get($join = null, $column = null, $where = null)
    {
        return $this->db->get($this->getTable(), $join, $column, $where);
    }

    public function select($join, $columns = null, $where = null)
    {
        return $this->db->select($this->getTable(), $join, $columns, $where);
    }

    public function insert($datas)
    {
        return $this->db->insert($this->getTable(), $datas);
    }

    public function update($data, $where = null)
    {
        return $this->db->update($this->getTable(), $data, $where);
    }

    public function count($join = null, $column = null, $where = null)
    {
        return $this->db->count($this->getTable(), $join, $column, $where);
    }

    public function delete($where)
    {
        return $this->db->delete($this->getTable(), $where);
    }

    public function action($actions)
    {
        return $this->db->action($actions);
    }

}