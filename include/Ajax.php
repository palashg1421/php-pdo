<?php

class Ajax
{
    private $app;

    public function __construct() {
        include 'Functions.php';
        $this->app = $app;
    }

    public function get_user_list($post)
    {
        $data = array();
        foreach( $post['form'] as $key => $value )
            $data[$value['name']] = $value['value'];
        include '../templates/_user_list.php';
    }
    
    public function delete_user($post)
    {
        $uid = $post['uid'];
        echo $this->app->delete($uid);
    }
    
    public function get_user_popup($post)
    {
        include '../templates/_user_form.php';
    }
    
    public function process_user($post){
        $data = array();
        foreach ( $post['form'] as $key => $value )
            $data[$value['name']] = $value['value'];

        if( $data['mode'] == 'edit' )
            echo $this->app->update($data, $data['uid']);
        else
            echo $this->app->create($data);
    }
}
$action = $_POST['action'];
$ajaxObj = new Ajax();
$ajaxObj->$action($_POST);
