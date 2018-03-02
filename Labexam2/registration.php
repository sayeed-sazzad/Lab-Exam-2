<?php
	
	error_reporting(0);
	$con = mysqli_connect("localhost","root","","test");
	if(isset($_POST["submit"]))
	{
		$name = $_POST["name1"];
		$email = $_POST["email"];
		$userName = $_POST["userName"];
		$password = $_POST["password"];
		$confirmPassword = $_POST["confirmPassword"];
		$gender = $_POST["gender"];
		$d = $_POST["d"];
		$m = $_POST["m"];
		$y = $_POST["y"];
		$date = $d."-".$m ."-".$y ;
		
		$target = "images/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
		
		if(isset($name) && isset($email) && isset($userName) && isset($password) && isset($name ) && isset($confirmPassword ) && isset($gender) && isset($d) && isset($m) && isset($y) )
		{
			if($password==$confirmPassword)
			{
				$sql="insert into user (name, email , username , password , gender ,dateofbirth , image) values('".$name."','".$email."','".$userName."', '".$password."','".$gender."','".$date."' ,'".$image."')";
				$query = mysqli_query($con,$sql);
				
				
				if($query && move_uploaded_file($_FILES['image']['tmp_name'],$target))
				{
					echo "success";
				}
				else
				{
					echo "Failed";
				}
				
			}
		}
		else
		{
			echo "<h2> Please Fill up the information</h2>";
		}
		
	}


?>







<fieldset>
    <legend><b>REGISTRATION</b></legend>
	<form action="" method="post" enctype="multipart/form-data">
		<br/>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>Name</td>
				<td>:</td>
				<td><input name="name1" type="text"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td>
					<input name="email" type="text">
					<abbr title="hint: sample@example.com"><b>i</b></abbr>
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>User Name</td>
				<td>:</td>
				<td><input name="userName" type="text"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input name="password" type="password"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Confirm Password</td>
				<td>:</td>
				<td><input name="confirmPassword" type="password"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td colspan="3">
					<fieldset>
						<legend>Gender</legend>    
						<input name="gender" value="Male" type="radio">Male
						<input name="gender" value="Female" type="radio">Female
						<input name="gender" value="Other" type="radio">Other
					</fieldset>
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td colspan="3">
					<fieldset>
						<legend>Date of Birth</legend>    
						<input name="d" type="text" size="2" />/
						<input name="m" type="text" size="2" />/
						<input name="y" type="text" size="4" />
						<font size="2"><i>(dd/mm/yyyy)</i></font>
					</fieldset>
				</td>
				<td></td>
			</tr>
			
			<tr>
				<td colspan="3">
				<fieldset>
					
					<legend>User Image</legend>
					
					<input type="file" name="image">
				
				</fieldset>
				</td>
			</tr>
		</table>
		<hr/>
		<input name="submit" type="submit" value="Submit">
		<input type="reset">
	</form>
</fieldset>