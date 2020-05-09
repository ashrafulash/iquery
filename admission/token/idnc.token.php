<?php
include('../../includes/class-loader.inc.php');

$token = new Token();
$rows  = $token->get_token('Invitation day and night care', 'pending');
$available = $token->get_token('Invitation day and night care', 'available');

foreach($available as $item){
    array_push($rows, $item);
}

?>

<ul class="token_list">
<?php
for($i = 0; $i < count($rows); $i++){
    
?>
    <li class="<?php echo $rows[$i]['status']; ?>">
        <span class="no"><?php echo $i + 1; ?></span>
        <span class="id">
            <strong class="copy-id-<?php echo $rows[$i]['id']; ?>">
                <?php echo $rows[$i]['token'] ?>
            </strong></span>
        <span class="status"><?php echo $rows[$i]['status'] ?></span>

        <span class="copy"><button onclick="copyToClipboard('.copy-id-<?php echo $rows[$i]['id']; ?>', this)">COPY</button></span>
    </li>


<?php } ?>
</ul>

<?php 

if(count($rows) == 0){
    include('sit-full.php');
}

?>



