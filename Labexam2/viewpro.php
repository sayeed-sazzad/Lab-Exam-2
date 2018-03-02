<?php

	session_start();
	if(isset($_SESSION["name"]))
		
		{
			$var = $_SESSION["name"] ;
			$con = mysqli_connect("localhost","root","","test");
			
			
			$sql = "select * from user where username = '".$var."'";
			
			$query = mysqli_query($con,$sql);
			
			
			if(mysqli_num_rows($query) > 0)
			{
				while($row=mysqli_fetch_assoc($query))
				{
					
				
				
				
				
			



?>


<table width="100%" align="center" cellspacing="0" cellpadding="10" border="1">
    <tr>
        <td colspan="2" valign="middle" height="70">
            <table width="100%">
                <tr>
                    <td>
                        <a href="#">
                            <img height="48" src="images/<?php echo $row['image'];?>">
                        </a>
                    </td>
                    <td align="right">
                        Logged in as <a href="#"><?php echo $row['username'];?></a>&nbsp;|
                        <a href="logout.php">Logout</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="190" valign="top">
            <b>&nbsp;Account</b><hr />
            <ul>
                <li><a href="loggedin_layout.php">Dashboard</a></li>
                <li><a href="viewpro.php">View Profile</a></li>
                <li><a href="#">Change Profile Picture</a></li>
                <li><a href="#">Change Password</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </td>
        <td valign="top">
            
			<fieldset>
			
			 <legend><b>PROFILE</b></legend>
	<form>
		<br/>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td>Name</td>
				<td>:</td>
				<td><?php echo $row['name'];?></td>
				<td rowspan="7" align="center">
					<img width="128"  src="images/<?php echo $row['image'];?>">
                    <br/>
                    <a href="../write/picture.html">Change</a>
				</td>
			</tr>		
			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?php echo $row['email'];?></td>
			</tr>		
			<tr><td colspan="3"><hr/></td></tr>			
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td><?php echo $row['gender'];?></td>
			</tr>
			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Date of Birth</td>
				<td>:</td>
				<td><?php echo $row['dateofbirth'];?></td>
			</tr>
		</table>	
        <hr/>
        <a href="../write/edit_profile.html">Edit Profile</a>	
	</form>
</fieldset>
			
			
        </td>
    </tr>
	
	
	
    <tr>
        <td colspan="2" align="center">
            Copyright &copy; 2017
        </td>
    </tr>
</table>

<?php 

				}
			}
	
		}
		else
		{
			header("Location:login.php");
		}

?>