<?php
/**
 * Util class of project contains all the utility fuiinction
 * @author Palash
 * @version 1.0
 */

class Util
{
    /**
     * Public static method to print any data easily and in formated form
     * @version 1.0
     * @param any $data Print the data in any data type format
     * @return null
     */
    public static function printer($data){
        echo '<pre>';
        if($data) print_r($data);
        else var_dump ($data);
        echo '</pre>';
    }
    
    /**
     * Public static method to get base url of the site
     * @version 1.0
     * @param null
     * @return string Returns base url of the site
     */
    public static function get_base_url() {
        return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/pdo/';
    }

    /**
     * Public static method to get main ajax url of the site
     * @version 1.0
     * @param null
     * @return string Return the ajax file path
     */
    public static function get_ajax_url(){
        return self::get_base_url() . 'include/Ajax.php';
    }

    /**
     * Public static method to get base url of the site
     * @version 1.0
     * @param null
     * @return string Returns base url of the site
     */
    public static function redirect($path){
        header("Location: $path");
    }
    
    /**
     * Public static method to get the name of current page
     * @version 1.0
     * @param null
     * @return string Returns current page name
     */
    public static function get_page_name(){
        $self = basename($_SERVER['PHP_SELF']);
        return explode('.', $self)[0];
    }
    
    /**
     * Public static method to get notification message
     * @version 1.0
     * @param string Receives a key of message
     * @return string Returns the message on key
     */
    public static function get_messages($key){
        $messages = array();

        /* DB Errors */
        $messages['DB_UNKNOWN_ERROR']       = "Unown error occured. Please contact with service provider.";
        $messages['DB_INVALID_HOST']        = "Invalid host name. Plase check the host name of your database.";
        $messages['DB_INVALID_USER']        = "Invalid username. Plase check the username of your database.";
        $messages['DB_INVALID_PASS']        = "Invalid password. Plase check the username of your database. Either password is not required or invalid.";
        $messages['DB_INVALID_DB_SELECTED'] = "Invalid database selected. Please check database exists or correct database selected.";
        
        /* CRUD errors */
        $messages['NO_RECORD_FOUND'] = "<strong>Sorry!</strong> No records availalbe right now";

        if(isset($messages[$key]))
            return ($messages[$key]);
        else
            return 'Invalid Message Key';
    }
    
}
