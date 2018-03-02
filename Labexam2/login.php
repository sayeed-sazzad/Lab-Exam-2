<?php

	session_start();
	$con = mysqli_connect("localhost","root","","test");
	
	if(isset($_POST["submit"]) )
	{
		
		$userName = $_POST["userName"];
		$password = $_POST["password"];
		
		if(!empty($userName) && !empty($password))
		{
			
			$sql = "select * from user where username = '".$userName."' and password = '".$password."' ";
			
			$query = mysqli_query($con,$sql);
			
			if(mysqli_num_rows($query) > 0)
			{
				while($row=mysqli_fetch_assoc($query))
				{
					if($row['username']==$userName && $row['password']==$password)
					{
						$_SESSION["name"] = $row['username'];
						
						if(!empty($_POST["remember"]))
						{
							setcookie("username", $userName ,time()+(24*60*60));
							setcookie("password", $password ,time()+(24*60*60));
						}
						else
						{
							if(isset($COOKIE["username"]))
							{
								setcookie("user","");
							}
							
							if(isset($COOKIE["password"]))
							{
								setcookie("pass","");
							}
						}
						
						header("Location:loggedin_layout.php");
						
					}
				}
				
				
				
			}
			else{
				
				echo "<h2>user name and password not matched</h2>";
			}
			
		}
		else
		{
			echo "<h1>Fill up the information first</h2>";
		}
		
	}
	
	
	

?>



<fieldset>
    <legend><b>LOGIN</b></legend>
    <form action="" method="post">
        <table>
            <tr>
                <td>User Name</td>
				<td>:</td>
                <td><input name="userName" type="text" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"];}?>"></td>
            </tr>
            <tr>
                <td>Password</td>
				<td>:</td>
                <td><input name="password" type="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"];}?>"></td>
            </tr>
        </table>
        <hr />
		<input name="remember" type="checkbox" <?php if(isset($_COOKIE["username"])) { ?>checked<?php } ?> >Remember Me
		<br/><br/>
        <input type="submit" name="submit" value="Submit">        
		<a href="forgot_password.php">Forgot Password?</a>
    </form>
</fieldset>