<?php
class Admin extends Model{

    public function match($username, $pwd){
        $data = $this->get_data('admin');
        if($username == $data[0]['username'] && $pwd == $data[0]['password']){
            return 'true';
        }
        else{
            return 'false';
        }
    }

}