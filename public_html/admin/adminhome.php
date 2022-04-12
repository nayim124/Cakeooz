<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cakeooz</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link href="../css/index.css" rel="stylesheet">
</head>
<body>
	<?php
	include "adminheader.php";
	?>
		<div class="banner-area">
			<h2><?php
				session_start();
                if(isset($_SESSION["Staff_ID"])) {
					?>
                    Welcome <?php echo $_SESSION["FirstName"]; ?>
					<?php
                    }elseif(!isset($_SESSION["Staff_ID"])) {
						header("Location:../entrance/login.php");
						};
					?></h2>
		</div>
		<div class="content-area">
			<div class="wrapper">
				<p>Admin Panel.</p>
                    </div>
                    </div>
                    </div>
                    </body>
                    </html>