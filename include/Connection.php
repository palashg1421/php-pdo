<?php
/**
 * Main abstract connection class for database connectivity using PDO
 * @author Palash
 * @version 1.0
 */
require_once 'Util.php';

abstract class Connection
{
    private $host, $username, $pass, $db, $dsn;
    public $pdo;
    
    /**
     * Default constructor of the current class
     */
    public function __construct()
    {
        $this->pdo = NULL;
        $this->createConnection();
    }
    
    public function createConnection() {
        $this->host     = 'localhost';
        $this->username = 'root';
        $this->pass     = '';
        $this->db       = 'db_pdo';
        $this->dsn      = "mysql:host=$this->host;dbname=$this->db";
        
        try
        {
            $this->pdo = new PDO($this->dsn, $this->username, $this->pass);
        }
        catch (PDOException $e)
        {
            /**
             * 2002 : invalid host
             * 1044 : access denied for user to access db (invalid username) 
             * 1045 : access denied for user to access db via password (no password required)
             * 1049 : unknown database
             */
            $message = Util::get_messages('DB_UNKNOWN_ERROR');

            $code = $e->getCode();
            switch ($code)
            {
                case 2002:
                    $message = Util::get_messages('DB_INVALID_HOST');
                break;

                case 1044:
                    $message = Util::get_messages('DB_INVALID_USER');
                break;
                
                case 1045:
                    $message = Util::get_messages('DB_INVALID_PASS');
                break;
                
                case 1049:
                    $message = Util::get_messages('DB_INVALID_DB_SELECTED');
                break;
            }
            
            echo "<code><strong>$code</strong>: " . $message . "</code>";
            exit();
        }
    }
}