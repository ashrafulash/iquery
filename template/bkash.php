<?php
    function bkash($number, $fee){
        return '<div class="bkash"><p class="bkash__title">You need to pay from bKash Account to our <strong>Personal</strong> account using <strong>bKash Payment</strong></p><ol><li>Go to your bKash Menu by dailing <strong>*247#</strong></li><li>Now go to <strong>Send Money</strong></li><li>Enter our <strong>Personal</strong> bKash Account Number <span> ' . $number . '</span></li><li>Enter the amount <span>' . $fee . 'Tk. </span></li><li>Enter the reference <strong>2020</strong></li><li>Now enter your bKash Mobile Menu <strong>PIN</strong> to confirm</li><li>You will receive a confirmation message with <strong>TrxID</strong> code</li><li>Please provide us with the <strong>TrxID</strong> code given by <strong>bKash</strong></li></ol></div>';
    }
?>

