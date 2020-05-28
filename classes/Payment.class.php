<?php

class Payment extends View{


      //show trxID
        public function get_trx($target_trx, $centre){
            $arr    = array(); 
            $trx  = $this->show_payment_details($target_trx);

            foreach($trx as $item){
                if($centre == 'all'){
                    array_push($arr, $item);
                }
                else{
                    if($item['centre'] == $centre){
                        array_push($arr, $item);
                    }
                }
            }

        return $arr;
        
    }

     //find token
    public function find_trx($trx){
        $ar_trx = array();
        $st_trx = $this->get_trx('all', 'all');

        foreach($st_trx as $item){
            array_push($ar_trx, $item['trx_id']);
        }

        if(in_array($trx, $ar_trx)){
            return 'true';
        }
        else{
            return 'false';
        }

    }



}