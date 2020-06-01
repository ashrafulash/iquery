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

    // delete row
    public function delete($table,$field,$value){
        $this->delete_row($table,$field,$value);
    }

    //insert token table
    public function insert_token_id($token, $centre){
        $this->insert_token($token, $centre);
    }

    //update one field
    public function update_one($table, $field,$search ,$set, $value){
        $this->update_oneField($table, $field,$search ,$set, $value);
    }

}