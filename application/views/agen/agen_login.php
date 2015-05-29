<!DOCTYPE HTML>
<html>
<head>    
    <title>Agen Login </title>
</head>
<body>
        <form action='<?php echo base_url(); ?>index.php/c_index/agen_login' method='post' name='process'>
            <h2>Agen Login</h2>
            
            <br />            
            <label for='username'>Username</label>
            <input type='text' name='username' id='username' size='25' /><br />
        
            <label for='password'>Password</label>
            <input type='password' name='password' id='password' size='25' /><br />                            
        
            <input type='Submit' value='Login' />            
        </form>
    </div>
</body>
</html>