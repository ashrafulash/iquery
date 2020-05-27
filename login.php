
    <div class="login_panel">
        <p class="loginerror"></p>
        <form action="#" class="login_form" method="POST">
            <label for="usernameEmail">Username or Email</label>
            <input type="text" id="usernameEmail" name="username">

            <label for="usernameEmail">Password</label>
            <input type="password" id="pwd" name="password">
            <button onclick="loginSubmit()" type="button" id="login_submit_btn">Submit</button>
            <button id="forgetPwd">Forget Password</button>
        </form>
    </div>

<script>
    function loginSubmit(){
        var user = $('#usernameEmail').val().trim();
        var pwd  = $('#pwd').val().trim();

        $.post('admin/index.php', {username: user, pwd: pwd}, (data, status) =>{
                if(status == 'success'){
                    $('.loginerror').html(data);
                }else{
                    $('.loginerror').html('<h1>Page Not Found</h1>');
                }
        }); 


        return false;
    }
</script>
