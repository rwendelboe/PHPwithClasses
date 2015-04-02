<!DOCTYPE html> 
<!-- http://cs2610.cs.usu.edu/~romankuzmin/hw9/payRoll.php -->
<html lang="en">
	<head>
		<meta charset="utf-8">
        <title>Pay Roll</title>	
        <link href="style.css" rel="stylesheet" type="text/css" />	
    </head>
    <body>
		<h1>Pay Roll Calculator</h1>

		<?php
			require_once('Employee.php');
			$picture = new Employee();
			$employees = array();
          	$employees[] = new Employee("Harold Wilson",28.50,6);
           	$employees[] = new Employee("Carl Walters",42.95);
           	$employees[] = new Employee("Walter Scott",7.25,2);       
           	$employees[] = new Employee("Carol Knighton",42.95);
           	$employees[] = new Employee("Andrew Sawyer",28.75,8);
           	$employees[] = new Employee("Caroline Johnson");
           	$employees[] = new Employee("Anthony Meyer",2.75,8);
           	$employees[] = new Employee("Drew Carlson",23,12);        
           	$employees[] = new Employee("Mary Johnson",31.5,-2);
           	$letterError = false;
           	$negativeError = false;
           	$hours0 = "";
           	$hours1 = "";
           	$hours2 = "";
           	$hours3 = "";
           	$hours4 = "";
           	$hours5 = "";
           	$hours6 = "";
           	$hours7 = "";
           	$hours8 = "";
           	$error0 = "";
			$error1 = "";
			$error2 = "";
			$error3 = "";
			$error4 = "";
			$error5 = "";
			$error6 = "";
			$error7 = "";
			$error8 = "";
			$amoutnToPay0 = "";
			$amoutnToPay1 = "";
			$amoutnToPay2 = "";
			$amoutnToPay3 = "";
			$amoutnToPay4 = "";
			$amoutnToPay5 = "";
			$amoutnToPay6 = "";
			$amoutnToPay7 = "";
			$amoutnToPay8 = "";

		if(isset($_POST['submit'])){

			for($i=0; $i<count($_POST['hours']); $i++) {
				
			
				if(is_numeric($_POST['hours'][$i]) && $_POST['hours'][$i] >= 0){
						$qtyName = "hours$i";
						$$qtyName = htmlentities($_POST['hours'][$i]);
				}
				else{
				
					if(is_numeric($_POST['hours'][$i]) == false && !empty($_POST['hours'][$i])){
						$letterError = true;
						$qtyName = "hours$i";
						$$qtyName = htmlentities($_POST['hours'][$i]);
						$errorMsg = "error$i";
						$$errorMsg = "Letters are not allowed for time input";
					}
					if(htmlentities($_POST['hours'][$i]) < 0 && !empty($_POST['hours'][$i])){
						$negativeError = true;
						$qtyName = "hours$i";
						$$qtyName = htmlentities($_POST['hours'][$i]);
						$errorMsg = "error$i";
						$$errorMsg = "Please enter a positive number";
					}
				}
			}	
			if ( !$negativeError && !$letterError){
					
				$amoutnToPay0= $employees[0] -> computePay($hours0);
				$amoutnToPay1= $employees[1] -> computePay($hours1);
				$amoutnToPay2= $employees[2] -> computePay($hours2);
				$amoutnToPay3= $employees[3] -> computePay($hours3);
				$amoutnToPay4= $employees[4] -> computePay($hours4);
				$amoutnToPay5= $employees[5] -> computePay($hours5);
				$amoutnToPay6= $employees[6] -> computePay($hours6);
				$amoutnToPay7= $employees[7] -> computePay($hours7);
				$amoutnToPay8= $employees[8] -> computePay($hours8);
			}
		}
		?>

			<form action="payRoll.php" method="post">
			<fieldset><legend>Tax Calculator </legend>
				
					<table >
						<tr>
   							<th> Name of Employee</th>
    						<th> Hours Worked</th>		
    						<th> Amount to be Paid</th>
  						</tr>
					</table>
					<div class = "work"><label for="hoursworked0"><?php echo $employees[0] ?></label><input type="text" id="hoursworked0" name="hours[]" value="<?php echo $hours0 ?>" /><span><?php echo $error0 ?></span> <?php if (!$letterError && ! $negativeError && !empty($_POST['hours'])) printf("&nbsp; $ %.2f", $amoutnToPay0) ?></div>

					<div class = "work"><label for="hoursworked1"><?php echo $employees[1] ?></label><input type="text" id="hoursworked1" name="hours[]" value="<?php echo $hours1 ?>" /><span><?php echo $error1 ?></span> <?php if (!$letterError && ! $negativeError && !empty($_POST['hours'])) printf("&nbsp; $ %.2f", $amoutnToPay1) ?></div>

					<div class = "work"><label for="hoursworked2"><?php echo $employees[2] ?></label><input type="text" id="hoursworked2" name="hours[]" value="<?php echo $hours2 ?>" /><span><?php echo $error2 ?></span> <?php if (!$letterError && ! $negativeError && !empty($_POST['hours'])) printf("&nbsp; $ %.2f", $amoutnToPay2)  ?> </div>

					<div class = "work"><label for="hoursworked3"><?php echo $employees[3] ?></label><input type="text" id="hoursworked3" name="hours[]" value="<?php echo $hours3 ?>" /><span><?php echo $error3 ?></span> <?php if (!$letterError && ! $negativeError && !empty($_POST['hours'])) printf("&nbsp; $ %.2f", $amoutnToPay3)  ?> </div>

					<div class = "work"><label for="hoursworked4"><?php echo $employees[4] ?></label><input type="text" id="hoursworked4" name="hours[]" value="<?php echo $hours4 ?>" /><span><?php echo $error4 ?></span> <?php if (!$letterError && ! $negativeError && !empty($_POST['hours'])) printf("&nbsp; $ %.2f", $amoutnToPay4)  ?> </div>

					<div class = "work"><label for="hoursworked5"><?php echo $employees[5] ?></label><input type="text" id="hoursworked5" name="hours[]" value="<?php echo $hours5 ?>" /><span><?php echo $error5 ?></span> <?php if (!$letterError && ! $negativeError && !empty($_POST['hours'])) printf("&nbsp; $ %.2f", $amoutnToPay5)  ?> </div>

					<div class = "work"><label for="hoursworked6"><?php echo $employees[6] ?></label><input type="text" id="hoursworked6" name="hours[]" value="<?php echo $hours6 ?>" /><span><?php echo $error6 ?></span> <?php if (!$letterError && ! $negativeError && !empty($_POST['hours'])) printf("&nbsp; $ %.2f", $amoutnToPay6)  ?> </div>

					<div class = "work"><label for="hoursworked7"><?php echo $employees[7] ?></label><input type="text" id="hoursworked7" name="hours[]" value="<?php echo $hours7 ?>" /><span><?php echo $error7 ?></span> <?php if (!$letterError && ! $negativeError && !empty($_POST['hours'])) printf("&nbsp; $ %.2f", $amoutnToPay7)  ?> </div>

					<div class = "work"><label for="hoursworked8"><?php echo $employees[8] ?></label><input type="text" id="hoursworked8" name="hours[]" value="<?php echo $hours8 ?>" /><span><?php echo $error8 ?></span> <?php if (!$letterError && ! $negativeError && !empty($_POST['hours'])) printf("&nbsp; $ %.2f", $amoutnToPay8)  ?> </div>

				
				<div><input type="submit" value="Submit" name="submit" /></div>
			</fieldset>
		</form>	
    </body>
</html> 