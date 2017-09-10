<?php

abstract class baseModel
{
    public $table;
    public $dbh;
    public $attribute;

    public function __construct(Array $array=[])
    {
       $config = include 'config/database.php';
        $this->dbh = new PDO(
            "mysql:host=localhost;dbname={$config['dbname']}", $config['username'], $config['password']
            , [PDO::ATTR_PERSISTENT => true]
        );

        if(!empty($array)){
            $this->attribute=$array;
//            $this->model=$this->attribute;
        }



        $this->init();
    }

    public function init(){}

    public function get()
    {
        $queryString = 'select * from '.$this->table;

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
        $queryString = 'select * from '.$this->table;

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

        $data=$this->query($queryString);

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



        $execString = sprintf("insert into %s (%s)values(%s)", $this->table, $kstr, $vstr);
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
        $this->update($this->attribute,$this->attribute['id']);
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
        if(count($arr)==1){
            return $arr[0];
        }
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
        // TODO: Implement __clone() method.
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


        $val=$this->attribute[$key]?:null;

        if($val==null){

                return null;
        }

        $getmethoad='get'.ucwords($key);
        if(method_exists($this,$getmethoad)){
            return $this->$getmethoad($val);
        }

        return $this->attribute[$key];
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.

        $this->attribute[$name]=$value;
//        $this->model=$this->attribute;

        return $this;
    }

}