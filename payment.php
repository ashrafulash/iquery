



<div class="payment_panel">

<div class="bkash_panel">
    <img src="asset/images/bkash.png" alt="">
    <?php 
        include('template/bkash.php'); 
        echo bkash('01677760308', '10XXXX');
    ?>
</div>

<form action="payment/payment_receive.php" method="POST">
    <input name="student_id" type="text" id="student_id" placeholder="Enter ID">

    <select name="payment_type" name="" id="payment_type">
        <option value="Monthly Fee">Monthly Fee</option>
        <option value="Due Payment">Due Payment</option>
        <option value="Exam Fee">Exam Fee</option>
    </select>

    <input name="amount" type="number" id="pay_amount" placeholder="Amount">
    <input name="trx_id" type="text" id="trx_id" placeholder="TRX ID">
    <input name="phone" type="number" id="phone_number" placeholder="Phone Number">
    <button name="submit" type="submit" id="submit_button"> Submit </button>
</form>
</div>


<script>

    var 
        submit_btn = $('#submit_button');
        submit_btn.click(function(e){
            
            var 
                student_id      = $('#student_id'),
                payment_type    = $('#payment_type'),
                trx_id          = $('#trx_id'),
                Amount          = $('#pay_amount'),
                phone_number    = $('#phone_number');


                function payment_validation(selector){
                    var val = selector.val().trim();
                    
                    if(val.length == 0){
                        selector.css({
                            'border': '2px solid red'
                        })

                        return false;
                    }
                    else{
                        selector.css({
                            'border': '2px solid #101010'
                        })

                        return true;
                    }

                
                }


                var arr = [
                    student_id, payment_type, Amount, phone_number, trx_id 
                ];
                
                
                var submitable = arr.map((item, index) => {
                   return payment_validation(item)
                });


                function checkTrue(val){
                    return val == true;
                }

                
                return submitable.every(checkTrue)
                   
            
        })

</script>