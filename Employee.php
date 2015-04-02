
<?php
	
	class Employee{

		private $name ;
		private $wages ;
		private $dependents;

		public function __construct(){
			$numArgs = func_num_args();

			if ($numArgs == 0){
				$this -> setName("");
				$this -> setWages(7.25);
				$this -> setDependents(0);
			}
			if ($numArgs == 1){
				$this -> setName(func_get_arg(0));
				$this -> setWages(7.25);
				$this -> setDependents(0);
			}
			if ($numArgs == 2){
				$this -> setName(func_get_arg(0));
				$this -> setWages(func_get_arg(1));
				$this -> setDependents(0);
			}
			if ($numArgs == 3){
				$this -> setName(func_get_arg(0));
				$this -> setWages(func_get_arg(1));
				$this -> setDependents(func_get_arg(2));
			}
		}
		public function getName(){
			return $this -> name;


		}

		public function getWages(){
			return $this -> wages;
		}

		public function getDependents(){
			return $this -> dependents;
		}

		public function setName($name){
			$this -> name = $name;
		}

		public function setWages( $wages){
			if ($wages <= 7.25){
				$this -> wages = 7.25;
			}else{
				$this -> wages= $wages;
			}
		}

		public function setDependents( $dependents){
			if ($dependents < 0){
				$this -> dependents = 0;
			}
			elseif($dependents > 9){
				$this -> dependents = 9;
			}
			else{
				$this -> dependents = $dependents;
			}
		}

		public function __toString(){
			return $this -> name ;
		}

		public function computePay($hoursWorked){
			$grossPay = 0;
			$socialTax = 0;
			$medicareTax = 0; 
			$afterdeduction = 0;
			$netPay = 0;
			$withholdingA = 0;

			if ($hoursWorked < 0 ){
				$hoursWorked = 0;
				$grossPay = 0;
			}
			elseif($hoursWorked > 40 ){
				$betterPay;
				$OverHoursPay;
				$betterPay = $hoursWorked - 40;
				$OverHoursPay = ($this -> wages * 1.5) * $betterPay;
				$grossPay = (40 * $this -> wages) + $OverHoursPay;
				$socialTax = $grossPay * .062;
				$medicareTax = $grossPay * .0145;
				$afterdeduction = $grossPay - $socialTax - $medicareTax;
				$withholdingA = $grossPay - ($this -> dependents * 75);
				if($withholdingA <= 160){
					$netPay = $afterdeduction;
				}
				if($withholdingA > 160 && $withholdingA <= 503){
					$netPay = $afterdeduction - (($withholdingA - 160) * .10);
				}
				if($withholdingA > 503 && $withholdingA <= 1554){
					$netPay = $afterdeduction - ((($withholdingA - 503) * .15) + 34.30);
				}
				if($withholdingA > 1554 && $withholdingA <= 2975){
					$netPay = $afterdeduction - ((($withholdingA - 1554) * .25) + 191.95);
				}
				if($withholdingA > 2975 && $withholdingA <= 4449){
					$netPay = $afterdeduction - ((($withholdingA - 2975) * .28) + 547.20);
				}
				if($withholdingA > 4449 && $withholdingA <= 7820){
					$netPay = $afterdeduction - ((($withholdingA - 4449) * .33) + 959.92);
				}
				if($withholdingA > 7820 && $withholdingA <= 8813){
					$netPay = $afterdeduction - ((($withholdingA - 7820) * .35) + 2072.35);
				}
				if($withholdingA > 8813 ){
					$netPay = $afterdeduction - ((($withholdingA - 8813) * .396) + 2419.90);
				}

			}
			else{
				$grossPay = $hoursWorked * $this -> wages;
				$socialTax = $grossPay * .062;
				$medicareTax = $grossPay * .0145;
				$afterdeduction = $grossPay - $socialTax - $medicareTax;
				$withholdingA = $grossPay - ($this -> dependents * 75);
				if($withholdingA <= 160){
					$netPay = $afterdeduction;
				}
				if($withholdingA > 160 && $withholdingA <= 503){
					$netPay = $afterdeduction - (($withholdingA - 160) * .10);
				}
				if($withholdingA > 503 && $withholdingA <= 1554){
					$netPay = $afterdeduction - ((($withholdingA - 503) * .15) + 34.30);
				}
				if($withholdingA > 1554 && $withholdingA <= 2975){
					$netPay = $afterdeduction - ((($withholdingA - 1554) * .25) + 191.95);
				}
				if($withholdingA > 2975 && $withholdingA <= 4449){
					$netPay = $afterdeduction - ((($withholdingA - 2975) * .28) + 547.20);
				}
				if($withholdingA > 4449 && $withholdingA <= 7820){
					$netPay = $afterdeduction - ((($withholdingA - 4449) * .33) + 959.92);
				}
				if($withholdingA > 7820 && $withholdingA <= 8813){
					$netPay = $afterdeduction - ((($withholdingA - 7820) * .35) + 2072.35);
				}
				if($withholdingA > 8813 ){
					$netPay = $afterdeduction - ((($withholdingA - 8813) * .396) + 2419.90);
				}
			}
			return $netPay;
		}
	}
