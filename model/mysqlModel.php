<?php

class mysqlModel
{
    protected static $instance;

    /**
     * Create a new instance of this singleton.
     */
    final public static function instance()
    {
        return isset(static::$instance)
            ? static::$instance
            : static::$instance = self::getMysqlConnect();
    }

    final protected  static function getMysqlConnect()
    {
        $config = include 'config/database.php';
       return  new PDO(
            "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8", $config['username'], $config['password']
            , [PDO::ATTR_PERSISTENT => true]
        );
    }

    /**
     * Constructor.
     */
    final protected function __construct()
    {
        $this->init();
    }

    /**
     * Initialize the singleton free from constructor parameters.
     */
    protected function init() {}

    public function __clone()
    {
        trigger_error('Cloning '.__CLASS__.' is not allowed.', E_USER_ERROR);
    }

    public function __wakeup()
    {
        trigger_error('Unserializing '.__CLASS__.' is not allowed.', E_USER_ERROR);
    }
}