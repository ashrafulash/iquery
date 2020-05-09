<?php 
class Model extends Dbh{

    // fetch all data from table
    protected function get_data($table){
        $sql    = 'SELECT * FROM ' . $table;
        $stmt   = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }

    protected function get_one_row($table, $field, $target){
        $sql    = 'SELECT * FROM ' . $table . ' WHERE ' . $field . ' = ?';
        $stmt   = $this->connect()->prepare($sql);
        $stmt->execute([$target]);
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

    //insert payment table
    protected function insert_payment($arr){  
        $sql = "INSERT INTO payment(student_id, trx_id, purpose, date, status, centre) VALUES (? , ? , ? , ? , ? , ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$arr['student_id'], $arr['trx_id'], $arr['purpose'], $arr['date'], $arr['status'], $arr['centre']]); 
    }


    //insert to student Table
    protected function insert_student($arr){
        $sql  = 'INSERT INTO student_tb(centre, student_id, firstName, middleName, lastName, fatherFirstName, fatherMiddleName, fatherLastName,motherFirstName, motherMiddleName, motherLastName,  institution, presentHouse, presentCity, presentThana, presentPostCode, presentCountry, permanentAddress, nationility, personalNumber, fatherNumber, motherNumber, emailAddress, facebookUsername, skypeId, class, sgroup, blood, religion, gender, birth, date, status) VALUES (?, ?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ?)';

        $stmt   = $this->connect()->prepare($sql);
        $stmt->execute([$arr['centre'], $arr['student_id'], $arr['firstName'], $arr['middleName'], $arr['lastName'], $arr['fatherFirstName'], $arr['fatherMiddleName'], $arr['fatherLastName'], $arr['motherFirstName'], $arr['motherMiddleName'], $arr['motherLastName'], $arr['institution'], $arr['presentHouse'], $arr['presentCity'], $arr['presentThana'], $arr['presentPostCode'], $arr['presentCountry'], $arr['permanentAddress'], $arr['nationility'],$arr['personalNumber'],$arr['fatherNumber'],$arr['motherNumber'],$arr['emailAddress'],$arr['facebookUsername'],$arr['skypeId'],$arr['class'],$arr['group'], $arr['blood'],$arr['religion'],$arr['gender'],$arr['birth'], $arr['date'], $arr['status']]);
    }



}