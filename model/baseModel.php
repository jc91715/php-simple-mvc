<?php

class baseModel
{
    public $model;
    public $dbh;
    public $config;
    public $queryString;
    public $execString;

    public function __construct()
    {
        $this->config = include 'config/database.php';
        $this->dbh = new PDO(
            "mysql:host=localhost;dbname={$this->config['dbname']}", $this->config['username'], $this->config['password']
            , [PDO::ATTR_PERSISTENT => true]
        );
    }

    public function all()
    {
        $queryString = 'select * from '.$this->model;

        return $this->query($queryString);


    }

    public function find($id)
    {
        $queryString = 'select * from '.$this->model.' where id='.$id;

        return $this->query($queryString)[0];


    }

    public function delete($id){
        $execString='delete from '.$this->model.'where id='.$id;

        return $this->exec($execString);

    }

    public function create($array)
    {

        $kstr = "";
        $vstr = "";
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

        $execString = sprintf("insert into %s (%s)values(%s)", $this->model, $kstr, $vstr);
        try {
            $this->exec($execString);

        } catch (Exception $e) {
            die("Error!:".$e->getMessage().'<br>');
        }


    }

    public function update($array, $id)
    {
        $str = "";
        foreach ($array as $k => $v) {
            if (is_string($v)) {

                $str .= $k.'='.'"'.$v.'"'.",";

            } else {

                $str .= $k.'='.$v.",";

            }
        }
        $str = rtrim($str, ",");

        $execString = sprintf("update  %s set %s where id=%u", $this->model, $str, $id);

        return $this->exec($execString);

    }

    public function exec($execString)
    {
        $this->execString = $this->dbh->prepare($execString)->queryString;
        $count = $this->dbh->exec($this->execString);

        return $count;
    }

    public function query($queryString)
    {
        $this->queryString = $this->dbh->prepare($queryString)->queryString;
        $data = $this->dbh->query($this->queryString);
        while ($row = $data->fetch()) {
            $arr[] = $row;
        }

        return $arr;
    }

}