<?php 

class Token extends View{

    //show token
    public function get_token($center, $status){
        $arr    = array(); 
        $token  = $this->show_center_token($center);

        foreach($token as $item){
            if($status == 'all'){
                array_push($arr, $item);
            }
            else{
                if($item['status'] == $status){
                    array_push($arr, $item);
                }
            }
        }

        return $arr;
        
    }

     //find token
    public function find_token($center, $status, $token){
        $ar_token = array();
        $st_token = $this->get_token($center, $status);

        foreach($st_token as $item){
            array_push($ar_token, $item['token']);
        }

        if(in_array($token, $ar_token)){
            return 'true';
        }
        else{
            return 'false';
        }

    }



}