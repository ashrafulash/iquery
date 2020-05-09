<?php 
class Student extends View{

    //show students
    public function get_students($status, $centre){
        $arr    = array(); 
        $stu  = $this->show_students($centre); //receive data accoridng to centre [all || specific]
        foreach($stu as $item){
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

    //show one student
    public function one($id){
        return $this->one_row('student_tb', 'student_id', $id);
    }




 //find students
public function find_student($stu_id){
    $ar_students = array();
    $st_ids = $this->get_students('all', 'all');

    foreach($st_ids as $item){
        array_push($ar_students, $item['student_id']);
    }

    if(in_array($stu_id, $ar_students)){
        return 'true';
    }
    else{
        return 'false';
    }

}

}