<?php
session_start();
if(isset($_SESSION['uid'])):
if(!isset($_POST['inp'])){
    die('Unauthorised Attempt!');
}

?>

<?php include('../includes/class-loader.inc.php'); ?>
<table border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <th>No</th>
                <th>Full Name</th>
                <th>Student ID</th>
                <th>Centre</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php 
                $student = new Student;
                if(!empty($_POST['inp'])){
                    $rows = $student->searchData('student_id',$_POST['inp']);
                    $i=1;
                    foreach($rows as $item){
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $item['firstName'] . ' ' . $item['middleName'] . ' ' . $item['lastName'] ?></td>
                            <td><?php echo $item['student_id'] ?></td>
                            <td><?php echo $item['centre'] ?></td>
                            <td><?php echo $item['status'] ?></td>
                            <td><?php echo $item['date'] ?></td>
                            <td>
                                <button onclick="videApplication(this)" id="accept_btn" data-id="<?php echo $item['student_id'] ?>">View</button>
                            </td>
                        </tr>

                        <?php
                        $i++;
                    }

                }
                else{
                    $rows = $student->get_students('pending', 'all');
                    $i=1;
                    foreach($rows as $item){
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $item['firstName'] . ' ' . $item['middleName'] . ' ' . $item['lastName'] ?></td>
                            <td><?php echo $item['student_id'] ?></td>
                            <td><?php echo $item['centre'] ?></td>
                            <td><?php echo $item['status'] ?></td>
                            <td><?php echo $item['date'] ?></td>
                            <td>
                                <button onclick="videApplication(this)" id="accept_btn" data-id="<?php echo $item['student_id'] ?>">View</button>
                            </td>
                        </tr>

                        <?php
                        $i++;
                    }
                }
                
            ?>
        </tbody>
</table>

<?php else: echo 'page not found'; endif; ?>