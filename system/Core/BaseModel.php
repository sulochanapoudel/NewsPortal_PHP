<?php
namespace System\Core;

use System\DB\Mysql;
use System\Exceptions\DataNotLoadedException;

abstract class BaseModel //aru model class le inherite garos bhanera banako
{

    protected $table;
    protected $pk = 'id';
    protected $db;

    protected $select = '*';
    protected $conditions;
    protected $orderBy;
    protected $offset = 0;
    protected $limit;
    protected $sql;
    protected $related = [];

    public function __construct($id = null)
    {
        $this->db = new Mysql;

        if(!is_null($id)) {
            $this->load($id);
        }
    }

    public function getTable()
    {
        return $this->table;
    }
    public function getPK()
    {
        return $this->pk;
    }
  public function select($columns)
  {
      $this->select = $columns;
      return $this;
  }

  public function where($column, $value, $operators = '=')
  {
      if(empty($this->conditions)){
          $this->conditions = "{$column} {$operators} '{$value}'";
      }
      else {
          $this->conditions .= "AND {$column} {$operators} '{$value}'";
      }
      return $this;
  }
    public function orWhere($column, $value, $operators = '=')
    {
        $this->conditions .= "OR {$column} {$operators} '{$value}'";
        return $this;
    }
    public function orderBy($column, $direction = "ASC")
    {
        if(empty($this->orderBy)){
            $this->orderBy = "{$column} {$direction}";
        }
        else {
            $this->orderBy .=", {$column} {$direction}";
        }
        return $this;
    }
    public function offset($value)
    {
        $this->offset=$value;
        return $this;
    }
    public function limit($value)
    {
        $this->limit = $value;
        return $this;
    }
    public function get()
    {
        $this->buildSelectQuery();
        $data = [];

        if($this->db->run($this->sql)){
            $result = $this->db->fetch();

            if(!empty($this->related)){
                $classname = get_class($this->related['class']);
            }
            else{
                $classname = get_class($this);
            }

            foreach($result as $value){
                $obj = new $classname;

                foreach($value as $k => $v){
                    $obj->{$k} = $v;
                }
                $data[] = $obj;
            }
        }
        $this->resetVars();
        return $data;
    }

    private function buildSelectQuery()
    {
       if(!empty($this->related)) {
           $tablename = $this->related['class']->getTable();

           if($this->related['relation'] == 'child'){
               $this->where($this->related['fk'], $this->{$this->pk});
           }
           else{
               $this->where($this->related['class']->getPK(),$this->{$this->related['fk']});
           }
       }
       else {
           $tablename = $this->table;
       }

        $this->sql = "SELECT {$this->select} FROM {$tablename}";

        if(!empty($this->conditions)){
            $this->sql .=" WHERE {$this->conditions}";
        }

        if(!empty($this->orderBy)){
            $this->sql .=" ORDER BY {$this->orderBy}";
        }

        if(!empty($this->limit)){
            $this->sql .=" LIMIT {$this->offset}, {$this->limit}";
        }
    }
    public function first()
            {
                $data = $this->get();

                if(!empty($data)) {
                    return $data[0];
        }
    }

    private function resetVars() {
        $this->select = '*';
        $this->conditions = null;
        $this->orderBy = null;
        $this->offset = 0;
        $this->limit = null;
        $this->sql = null;
    }
    public function load($id)
    {
        $this->sql = "SELECT * FROM {$this->table} WHERE {$this->pk} = '{$id}'";
        if($this->db->run($this->sql)){
          $data= $this->db->fetch();

          if(!empty($data)){
            foreach($data[0] as $k =>$v) {
                $this->{$k} = $v;
            }
            $this->resetVars();//reset gareko, if not reset garda SQL pani aauchha.
          }
          else{
              $classname = get_class($this);

              throw new DataNotLoadedException("Unable to find data for the class '{$classname}' with following conditions:'{$this->pk} = {$id}'");
          }
        }
    }

    public function save()
    {
       $data = $this->getDataArray();

       $set = [];

       foreach($data as $k => $v) {
           if(is_null($v) || empty($v)){
               $set[] = "{$k} = NULL";
           }
           else {

               $set[] = "{$k} = '{$v}'";
           }
       }
            if(isset($this->{$this->pk}) && !empty($this->{$this->pk})) {
                $this->sql = "UPDATE {$this->table} SET ".implode( ",", $set)." WHERE {$this->pk} = '{$this->{$this->pk}}'";
                $flg = 0;
            }
            else {
                $this->sql = "INSERT INTO {$this->table} SET ".implode( ", ", $set);
                $flg = 1;
                }
            if($this->db->run($this->sql)){
                if($flg == 1){
                    $this->{$this->pk} = $this->db->insert_id();
                }
            }
    }
    private function getDataArray()
    {
        $predefined = get_class_vars(get_class($this));
        $all = get_object_vars($this);

        return array_diff_key($all, $predefined);
    }
    public function delete()
    {
        $this->sql = "DELETE FROM {$this->table} WHERE {$this->pk} = '{$this->{$this->pk}}'";

        if($this->db->run($this->sql))
        {
            $data = $this->getDataArray();
            foreach($data as $k => $v) {
                unset($this->{$k});
            }
            $this->resetVars();
        }
    }
    public function related($classname, $fk, $relation)
    {
        $obj = new $classname;
        $this->related = [
            'class' => $obj,
            'fk' => $fk,
            'relation' => $relation
        ];
        return $this;
    }

    public function paginate($limit = 10)
    {
        if(isset($_GET['page']) && !empty($_GET['page']))
        {
            $pageno = $_GET['page'];
        }
        else
        {
            $pageno = 1;
        }
        // dd($this);
        $classname = get_class($this);

        $class = new $classname;

        $count = $class->select('id');
        if(!empty($this->conditions)){
            $count = $count->whereRaw($this->conditions);
        }

        $count = $count->get();
        $total = count($count);
        $pages = ceil($total / $limit); //ceil is the function for ceiling. it gives total number of pages.

        if($pages <=1) {
            $pages = 1;
        }

       if($pageno > $pages){
           $pageno = $pages;
       }

        $offset = $limit * $pageno - $limit;
        $this->offset = $offset;
        $this->limit = $limit;

        $data = $this->get();
        return compact('data', 'total', 'pages', 'pageno', 'offset', 'limit');
    }

  public function whereRaw($condition)
  {
      $this->conditions = $condition;

      return $this;
  }

}