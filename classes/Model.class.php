<?php 
class Model extends Dbh{

    // fetch all data from table
    protected function get_data($table){
        $sql    = 'SELECT * FROM ' . $table;
        $stmt   = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }
    //fetch one row
    protected function get_one_row($table, $field, $target){
        $sql    = 'SELECT * FROM ' . $table . ' WHERE ' . $field . ' = ?';
        $stmt   = $this->connect()->prepare($sql);
        $stmt->execute([$target]);
        return $stmt->fetchAll();
    }

    //search from student table
    protected function search($table, $col, $input){
        $sql    = 'SELECT * FROM '. $table .' WHERE '. $col .' like '. $input;
        $stmt   = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }


    // fetch data with targeted value
    protected function get_data_with($table, $field, $target){
        $sql    = 'SELECT * FROM ' . $table . ' WHERE ' . $field . ' = ?';
        $stmt   = $this->connect()->prepare($sql);
        $stmt->execute([$target]);
        return $stmt->fetchAll();
    }

    //update status field
    protected function update_status($table, $field,$id , $status){
        $sql = 'UPDATE '. $table .' SET status = ? WHERE '. $field . ' = ?'; 
        $stmt  = $this->connect()->prepare($sql);
        $stmt->execute([$status, $id]);
    }

    //update status field
    protected function update_oneField($table, $field,$search ,$set, $value){
        $sql = 'UPDATE '. $table .' SET '.$set.' = ? WHERE '. $field . ' = ?'; 
        $stmt  = $this->connect()->prepare($sql);
        $stmt->execute([$value, $search]);
    }

    //insert payment table
    protected function insert_payment($arr){  
        $sql = "INSERT INTO payment(student_id, trx_id, purpose, amount, date, status, centre, month) VALUES (? , ? , ? , ? , ? , ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$arr['student_id'], $arr['trx_id'], $arr['purpose'], $arr['amount'], $arr['date'], $arr['status'], $arr['centre'], $arr['month']]); 
    }


    //insert to student Table
    protected function insert_student($arr){
        $sql  = 'INSERT INTO student_tb(centre, student_id, firstName, middleName, lastName, fatherFirstName, fatherMiddleName, fatherLastName,motherFirstName, motherMiddleName, motherLastName,  institution, presentHouse, presentCity, presentThana, presentPostCode, presentCountry, permanentAddress, nationility, personalNumber, fatherNumber, motherNumber, emailAddress, facebookUsername, skypeId, class, sgroup, blood, religion, gender, birth, date, status) VALUES (?, ?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ?)';
        $stmt   = $this->connect()->prepare($sql);
        $stmt->execute([$arr['centre'], $arr['student_id'], $arr['firstName'], $arr['middleName'], $arr['lastName'], $arr['fatherFirstName'], $arr['fatherMiddleName'], $arr['fatherLastName'], $arr['motherFirstName'], $arr['motherMiddleName'], $arr['motherLastName'], $arr['institution'], $arr['presentHouse'], $arr['presentCity'], $arr['presentThana'], $arr['presentPostCode'], $arr['presentCountry'], $arr['permanentAddress'], $arr['nationility'],$arr['personalNumber'],$arr['fatherNumber'],$arr['motherNumber'],$arr['emailAddress'],$arr['facebookUsername'],$arr['skypeId'],$arr['class'],$arr['group'], $arr['blood'],$arr['religion'],$arr['gender'],$arr['birth'], $arr['date'], $arr['status']]);
    }

    //insert to token Table
    protected function insert_token($token, $centre){
        $sql  = 'INSERT INTO token_tb (token, center, status, date) VALUES (?, ? , ?, ?)';
        $stmt   = $this->connect()->prepare($sql);
        $date = date("j-m-Y");
        $stmt->execute([$token, $centre,'available',$date]);
    }

    //delte row
    protected function delete_row($table,$field,$value){
        $sql = 'DELETE FROM '.$table.' WHERE '.$field.' = ?';
        $stmt  = $this->connect()->prepare($sql);
        $stmt->execute([$value]);

    }




}