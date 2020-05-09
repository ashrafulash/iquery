<?php
class View extends Model{
    //show token 
    protected function show_center_token($target){
        if($target != 'all'){
            return  $this->get_data_with('token_tb', 'center', $target);
        }
        else{
            return  $this->get_data('token_tb');
        }
    }

    // show payment
    protected function show_payment_details($target){
        if($target != 'all'){
            return  $this->get_data_with('payment', 'trx_id', $target);
        }
        else{
            return  $this->get_data('payment');
        }
    }

    // show students
    protected function show_students($target){
        if($target != 'all'){
            return  $this->get_data_with('student_tb', 'centre', $target);
        }
        else{
            return  $this->get_data('student_tb');
        }
    }

    //get one row 
    protected function one_row($table, $field, $target){
        return $this->get_one_row($table, $field, $target);
    }




    



}