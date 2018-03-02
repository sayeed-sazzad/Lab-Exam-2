<?php

	session_start();
	if(isset($_SESSION["name"]))
		
		{
			$var=$_SESSION["name"];
			
			
			$con = mysqli_connect("localhost","root","","test");
			$sql = "select * from user where username = '".$var."' ";
			
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
                            <img height="48" src="images/<?php echo $row['image'] ; ?>">
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
                <li><a href="#">Dashboard</a></li>
                <li><a href="viewpro.php">View Profile</a></li>
                <li><a href="#">Change Profile Picture</a></li>
                <li><a href="#">Change Password</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </td>
        <td valign="top">
            
			
			
			
			
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