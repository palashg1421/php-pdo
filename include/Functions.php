<?php
/**
 * Function class to implement all the function related with CRUD operations
 * @author Palash
 * @version 1.0
 */
require_once 'connection.php';
require_once 'Util.php';

class Functions extends Connection
{
    private $sql, $statement;

    /**
     * Default constructor of the current class
     */
    public function __construct() {
        parent::__construct();
        define('LIMIT', '10');
    }

    /**
     * Public method to save record in database.
     * @version 1.0
     * @param array $data Receives an array of user data in key value format having the same keys used in database e.g. ['key'=>'value']
     * @return int Return number of rows affected after insert
     */
    public function create($data)
    {
        $this->sql = "INSERT INTO user (user_name, user_phone, user_email, user_city) VALUES (:user_name, :user_phone, :user_email, :user_city)";
        $this->statement = $this->pdo->prepare($this->sql);
        $this->statement->execute([
            ':user_name'    => $data['user_name'],
            ':user_phone'   => $data['user_phone'],
            ':user_email'   => $data['user_email'],
            ':user_city'    => $data['user_city']
        ]);
        return $this->statement->rowCount();
    }
    
    /**
     * Public method to read data from database. If no id provided then return all the records.
     * @version 1.0
     * @param int $id Receive an user ID which is optional
     * @return array Return the user object
     */
    public function read($id='', $data=array())
    {
        if($id)
        {
            $this->sql = 'SELECT * FROM user WHERE user_id = :user_id';
            $this->statement = $this->pdo->prepare($this->sql);
            $this->statement->execute(['user_id'=>$id]);
            $data = $this->statement->fetch(PDO::FETCH_ASSOC);
        }
        else
        {
            $where = array();
            if( isset($data['name']) && !empty($data['name']) )
            {
                array_push($where, "user_name LIKE '{$data['name']}%'");
            }
            if( isset($data['phone']) && !empty($data['phone']) )
            {
                array_push($where, "user_phone LIKE '{$data['phone']}%'");
            }
            if( isset($data['email']) && !empty($data['email']) )
            {
                array_push($where, "user_email LIKE '{$data['email']}%'");
            }
            if( isset($data['city']) && !empty($data['city']) )
            {
                array_push($where, "user_city LIKE '{$data['city']}%'");
            }
            if(empty($where))
            {
                array_push ($where, 1);
            }

            $limit = LIMIT;
            $order = 'ASC';
            if( isset($data['sortBy']) && $data['sortBy'] == 'latest')
                $order = 'DESC';

            $this->sql = "SELECT * FROM user AS u LEFT JOIN user_address AS ua ON u.user_id = ua.fk_user_id WHERE " . implode(' AND ', $where) . " ORDER BY u.user_created $order LIMIT {$limit} OFFSET {$data['offset']}";

            $this->statement = $this->pdo->prepare($this->sql);
            $this->statement->execute();
            $data = $this->statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    
    /**
     * Public method to update the record in database.
     * @version 1.0
     * @param array $id Receive the user data need to be updated
     * @param int $id Receive an user ID
     * @return int Return the number of row affected after the successful edit
     */
    public function update($data, $id)
    {
        $this->sql = 'UPDATE user SET user_name = :user_name, user_phone = :user_phone, user_email = :user_email WHERE user_id = :user_id';
        $this->statement = $this->pdo->prepare($this->sql);
        $this->statement->execute([
            ':user_id'      => $id,
            ':user_name'    => $data['user_name'],
            ':user_phone'   => $data['user_phone'],
            ':user_email'   => $data['user_email']
        ]);
        return $this->statement->rowCount();
    }
    
    public function updateAddress($data, $id)
    {
        
    }

    /**
     * Public method to delete a record form the database
     * @version 1.0
     * @param int $id Id of the record need to be deleted
     * @return int Return the number of row affected
     */
    public function delete($id)
    {
        $this->sql = 'DELETE FROM user WHERE user_id = :user_id';
        $this->statement = $this->pdo->prepare($this->sql);
        $this->statement->execute([
            ':user_id' => $id
        ]);
        return $this->statement->rowCount();
    }
    
    public function getPagination()
    {
        $paginate = array();

        $this->sql = 'SELECT COUNT(*) AS count FROM user';
        $this->statement = $this->pdo->prepare($this->sql);
        $this->statement->execute();
        $data = $this->statement->fetch(PDO::FETCH_ASSOC);
        
        $paginate['total']      = $data['count'];
        $paginate['per_page']   = LIMIT;
        $paginate['total_page'] = ceil($paginate['total'] / $paginate['per_page']);

        return $paginate;
    }
}

$app = new Functions();