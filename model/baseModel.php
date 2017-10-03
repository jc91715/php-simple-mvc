<?php

abstract class baseModel
{
    public $table;
    public $dbh;
    public $attribute;
    public $condition='';
    public $orderBy='';
    public $queryString;

    public $limit='';

    public function __construct(Array $array=[])
    {
       $config = include 'config/database.php';
        $this->dbh = new PDO(
            "mysql:host=localhost;dbname={$config['dbname']};charset=utf8", $config['username'], $config['password']
            , [PDO::ATTR_PERSISTENT => true]
        );

        if(!empty($array)){
            $this->attribute=$array;
//            $this->model=$this->attribute;
        }



        $this->init($this);
    }

    public function init($query){
        $this->extendQuery($query);
    }

    public function get()
    {


        $queryString= 'select * from '.$this->table.$this->orderBy.$this->limit;
        if($this->condition){
            $queryString = 'select * from '.$this->table.$this->condition.$this->orderBy.$this->limit;

        }
        if($this->queryString){
            $queryString=$this->queryString.$this->orderBy.$this->limit;

            if($this->condition){
                $queryString=$this->queryString.$this->condition.$this->orderBy.$this->limit;
            }
        }
        var_dump($queryString);
        $data=$this->query($queryString);
        if($data==null){
            return null;
        }
        $arr=[];
        foreach ($data as $model){
            $arr[]=(new static($model));
        }

        return $arr;


    }

    public function all()
    {
        $queryString = 'select * from '.$this->table.$this->limit;
        if($this->condition){
            $queryString = 'select * from '.$this->table.$this->condition.$this->orderBy.$this->limit;

        }
        $data=$this->query($queryString);
        if($data==null){
            return null;
        }
        $arr=[];
        foreach ($data as $model){
            $arr[]=(new static($model));
        }

        return new static($arr);


    }


    public function find($id)
    {
        $queryString = 'select * from '.$this->table.' where id='.$id;

        $data=$this->query($queryString)[0];


        if($data==null){
            return null;
        }
        return new static($data);


    }

    public function first(){
        return $this->attribute[0];
    }

    public function superUpdateOne()
    {
        $queryString='select * from '.$this->table.' order by id desc limit 1';
        $data=$this->query($queryString)[0];
        if($data==null){
            return null;
        }
        return new static($data);
    }
    public function delete($id){
        $execString='delete from '.$this->table.'where id='.$id;

        return $this->exec($execString);

    }

    public function create($array)
    {

        $kstr = "";
        $vstr = "";
        foreach ($array as $k => $v){
            $setmethoad='set'.ucwords($k);

            if(method_exists($this,$setmethoad)){
                $array[$k]=$this->$setmethoad($v);
            }
        }
        foreach ($array as $k => $v) {
            $kstr .= $k.",";
            if (is_string($v)) {
                $vstr .= '"'.$v.'"'.",";
            } else {
                $vstr .= $v.",";
            }
        }
        $kstr = rtrim($kstr, ",");
        $vstr = rtrim($vstr, ",");



        $execString = sprintf("insert into %s (%s) values(%s)", $this->table, $kstr, $vstr);
        $this->exec($execString);

        return new static($array);



    }



    public function update($array, $id=null)
    {
        if($id==null){
            $id=$this->attribute['id']?:  null;

            if($id==null){

                return '请限定数据';
            }
        }
        $str = "";

        foreach ($array as $k => $v){
            $setmethoad='set'.ucwords($k);

            if(method_exists($this,$setmethoad)){
                $array[$k]=$this->$setmethoad($v);
                $this->attribute[$k]=$this->$setmethoad($v);
            }
        }
        foreach ($array as $k => $v) {
            if (is_string($v)) {

                $str .= $k.'='.'"'.$v.'"'.",";

            } else {

                $str .= $k.'='.$v.",";

            }
        }
        $str = rtrim($str, ",");

        $execString = sprintf("update  %s set %s where id=%u", $this->table, $str, $id);

       $this->exec($execString);

       return $this;

    }

    public function save(){
        return $this->update($this->attribute,$this->attribute['id']);
    }

    public function exec($execString)
    {
        $count = $this->dbh->exec($execString);

        return $count;
    }

    public function query($queryString)
    {
        $arr=[];
        $data = $this->dbh->query($queryString);
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            $arr[] = $row;
        }
        if(empty($arr)){
            return null;
        }
//        if(count($arr)==1){
//            return $arr[0];
//        }
        return $arr;
    }

    public function toArray(){
        if (isset($this->attribute[0]) && is_object($this->attribute[0]))
        {
            $arr=[];
            foreach ($this->attribute as $obj){
                $arr[]=$obj->toArray();
            }
            $this->attribute=$arr;
        }
        return $this->attribute;
    }
    public function toJson(){
        if (isset($this->attribute[0]) && is_object($this->attribute[0]))
        {
            return json_encode($this->toArray());
        }
        return json_encode($this->attribute);
    }
    public function __call($name,$arguments)
    {
        $before=substr($name,0,3);
        $A=substr($name,3);
        $a=lcfirst($A);
        switch ($before)
        {
            case 'get':
                return $this->attribute[$a] ?:$this->attribute[$A];
        }

    }


    public function __get($key)
    {

        return $this->getAttribute($key);



    }

    public function __set($name, $value)
    {

        return $this->setAttribute($name,$value);
    }



    public function getAttribute($key)
    {

        if(array_key_exists($key,$this->attribute)){
            $val=$this->attribute[$key]?:null;

        };

        if($val==null){

            return null;
        }

        $getmethoad='get'.ucwords($key);
        if(method_exists($this,$getmethoad)){
            return $this->$getmethoad($val);
        }

        return $val;

    }


    public function setAttribute($name,$value)
    {

        $this->attribute[$name]=$value;


        return $value;

    }


    public function selectHasMany($hasManyId,$id)
    {
        $queryString = 'select * from '.$this->table.' where '.$hasManyId.' ='.$id;

        if($this->condition){
            $queryString = 'select * from '.$this->table.' where '.$hasManyId.' ='.$id.' and '.$this->condition;

        }
        $data=$this->query($queryString);


        if($data==null){
            return null;
        }

        $arr=[];
        foreach ($data as $model){
            $arr[]=(new static($model));
        }
        return $arr;
    }


    public function hasMany($model,$hasManyId)
    {
        $m=new $model;
        $id=$this->id;
        $m->condition=' where '.$hasManyId.' ='.$id;
        return $m;

    }

    public function belongsTo($model,$belongsToId)
    {
        $m=new $model;
        $id=$this->$belongsToId;
        return $m->find($id);

    }



    public function where($name,$val,$condition=null)
    {
        if($condition==null){
            $condition='=';
        }else{
            $temp=$condition;
            $condition=$val;
            $val=$temp;

        }
        if($this->condition || $this->queryString){
            $this->condition.= ' and '.$name.$condition.$val;

        }else{
            $this->condition.= ' where '.$name.$condition.$val;

        }

        return $this;
    }

    public function orderBy($column){
        $this->orderBy.=" order by {$column} desc ";

        return $this;
    }


    public function belongsToMany($model,$middle,$modelId,$parentId)
    {
        $m=new $model;

        $parent_id=$this->id;
        $m->queryString="select ".$m->table.'.*'." from ".$m->table." left join ".$middle." on ".$m->table.'.id'."= ".$middle.'.'.$modelId." where ".$middle.'.'.$parentId ." = ".$parent_id;
        return $m;
    }


    public function queryString($query=null)
    {



        return $this->queryString;

    }

    public function count(){
        $queryString = 'select COUNT(*) from '.$this->table;
        if($this->condition){
            $queryString = 'select * from '.$this->table.$this->condition.$this->orderBy;

        }
        $data=$this->query($queryString);

        return count($data);

    }

    public function painate($number=3)
    {


        $this->limit=" limit 1,".$number;
        if(isset($_GET['page'])){
            $start=$_GET['page']*$number-$number+1;
            $end=$_GET['page']*$number;
            $this->limit=' limit '.$start.','.$number;

        }
        return $this->get();
    }




}