
<?php 
session_start();
if(isset($_SESSION['uid'])):

?>
<?php
if(!isset($_POST['inp'])){
    die('Unauthorised Attempt!');
}

include('../includes/class-loader.inc.php');


$cls = new Student();
$data = $cls->one($_POST['inp'])[0];
$file = $_POST['inp']. '.txt';
$myfile = fopen("../uploads/iecc-uplo/".$file, "r") or die("Unable to open file!");
$read = fread($myfile,filesize("../uploads/iecc-uplo/".$file));
?>

<table id="online_application">
    <tr>
        <td>
            <table>
                <tr>
                    <td> <img class="profile_image" src="<?php echo $read ?>" alt="Profile Picture"></td>
                    <td align="right">
                        <time class="date"><?php echo $data['date'] ?></time>
                        <h2 class="online_application">Online Application</h2>
                        <h1 class="centre"><?php echo $data['centre'] ?></h1>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="content">
                <tr>
                    <td>
                        <strong>Full Name</strong>
                        <span><?php echo $data['firstName']. ' '. $data['middleName'] . ' ' . $data['lastName'] ?></span>
                    </td>
                    <td>
                        <strong>Student ID</strong>
                        <span><?php echo $data['student_id'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Father's Full Name</strong>
                        <span><?php echo $data['fatherFirstName']. ' '. $data['fatherMiddleName'] . ' ' . $data['fatherLastName'] ?></span>
                    </td>
                    <td>
                        <strong>Father's Phone Number</strong>
                        <span><?php echo $data['fatherNumber'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Mother's Full Name</strong>
                        <span><?php echo $data['motherFirstName']. ' '. $data['motherMiddleName'] . ' ' . $data['motherLastName'] ?></span>
                    </td>
                    <td>
                        <strong>Mother's Phone Number</strong>
                        <span><?php echo $data['motherNumber'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Institution Name</strong>
                        <span><?php echo $data['institution'] ?></span>
                    </td>
                    <td>
                        <strong>Present House Address</strong>
                        <span><?php echo $data['presentHouse'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Present City</strong>
                        <span><?php echo $data['presentCity'] ?></span>
                    </td>
                    <td>
                        <strong>Present Thana</strong>
                        <span><?php echo $data['presentThana'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Present POST Code</strong>
                        <span><?php echo $data['presentPostCode'] ?></span>
                    </td>
                    <td>
                        <strong>Present Country</strong>
                        <span><?php echo $data['presentCountry'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Nationility</strong>
                        <span><?php echo $data['nationility'] ?></span>
                    </td>
                    <td>
                        <strong>Permanent Address</strong>
                        <span><?php echo $data['permanentAddress'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Personal Number</strong>
                        <span><?php echo $data['personalNumber'] ?></span>
                    </td>
                    <td>
                        <strong>Email Address</strong>
                        <span><?php echo $data['emailAddress'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Facebook Username</strong>
                        <span><?php echo $data['facebookUsername'] ?></span>
                    </td>
                    <td>
                        <strong>Skype ID</strong>
                        <span><?php echo $data['skypeId'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Class</strong>
                        <span><?php echo $data['class'] ?></span>
                    </td>
                    <td>
                        <strong>Study Group</strong>
                        <span><?php echo $data['sgroup'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Blood Group</strong>
                        <span><?php echo $data['blood'] ?></span>
                    </td>
                    <td>
                        <strong>Gender</strong>
                        <span><?php echo $data['gender'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Date of Birth</strong>
                        <span><?php echo $data['birth'] ?></span>
                    </td>
                    <td>
                        <strong>Status</strong>
                        <span><?php echo $data['status'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Religion</strong>
                        <span><?php echo $data['religion'] ?></span>
                    </td>
                    <td align="right">
                        <button  onclick="update_status('active','<?php echo $data['student_id'] ?>')" class="act_btn accept">Active</button>
                        <button onclick="update_status('delete','<?php echo $data['student_id'] ?>')" class="act_btn delete">Delete</button>
                        <button onclick="update_status('block','<?php echo $data['student_id'] ?>')" class="act_btn block">Block</button>
                        <button onclick="update_status('pending','<?php echo $data['student_id'] ?>')" class="act_btn pending">Pending</button>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php else: echo 'page not found'; endif; ?>
<!-- <script>
// Default export is a4 paper, portrait, using millimeters for units
var pdf = document.getElementById('online_application');
var doc = new jsPDF()

doc.fromHTML(pdf, 10, 10)
doc.save('a4.pdf')
</script> -->
