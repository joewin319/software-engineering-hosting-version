			<?php
				$server="sql202.epizy.com";
				$username="epiz_30089770";
				$password="0ApFzY0pcMj5";
				$dbname="epiz_30089770_wt1_database";
				
				$conn = mysqli_connect($server, $username, $password, $dbname) 
				if(!$conn){
					die("Connection Failed: ".mysqli_connect_error())
				}
				?>