<?php 
class Controller extends Model{

    //insert data to student table
    public function insert_student_data($arr){
        $this->insert_student($arr);
    }

    //insert data to payment table
    public function insert_payment_data($arr){
        $this->insert_payment($arr);
    }

    //update status
    public function status_update($table, $field,$id , $status){
        $this->update_status($table, $field,$id , $status);
        
    }

}