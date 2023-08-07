
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-5">
	<div class="d-flex justify-content-center row">
		<div class="col-md-11 col-lg-11">
			<center><span style="font-size:30px;font-weight:bolder">What's Your Strategy? </span></center>
			<div class="d-flex justify-content-between mt-3">
				<button class="btn btn-primary btn-lg" onclick="displayValues('banking')">Banking</button>
				<button class="btn btn-primary btn-lg" onclick="displayValues('housing')">Housing</button>
				<button class="btn btn-primary btn-lg" onclick="displayValues('retail')">Retail</button>
			</div>


			<?php
			$total_corpus = 1000000; // Set the initial total corpus value

			function randomEvent() {
				return mt_rand(1, 40);
			}
			
			function array_events() {
				$max_events = mt_rand(10, 30);
				$quarter_events = array();
			
				for ($i = 0; $i < $max_events; $i++) {
					$quarter_events[] = randomEvent();
				}
			
				sort($quarter_events);
				return $quarter_events;
			}
			
			$quarter_events = array_events();
			

			for ($i = 1; $i <= 40; $i++) {
				?>
				<div class="border" id="div<?php echo $i; ?>" style="<?php if ($i != 1) echo 'display: none;'; ?>">
					<div class="question bg-white p-3 border-bottom">
						<div class="d-flex flex-row justify-content-between align-items-center mcq">
							<span id="tc<?php echo $i; ?>" style="font-size:16px;font-weight:bold;margin-top:0px;"><?php echo number_format($total_corpus); ?></span>
							<span style="font-size:18px;font-weight:bold;margin-left:-100px;">Quarter <span
										id="q"><?php echo $i; ?></span> out of 40</span>
							Alloted: <span style="font-size:18px;font-weight:bold;">25000</span>
							Used: <span id="qq<?php echo $i; ?>" style="font-size:18px;font-weight:bold;">0</span>
						</div>
					</div>
					<?php
					$arr = array(
						"d1" => "Reduce general operating expenses",
						"d2" => "Meet industry regulatory requirements",
						"d3" => "Prevent cyber attacks and data breaches",
						"d4" => "Mitigate operational risks such as poor access controls and data losses",
						"d5" => "Improve IT infrastructure and reduce data-related costs",
						"d6" => "Streamline back-office systems and processes",
						"d7" => "Improve data quality (completeness, accuracy, timeliness)",
						"d8" => "Rationalize multiple sources of data and information (consolidate and eliminate redundancy)",
						"o1" => "Improve revenue through cross-selling, strategic pricing, and customer acquisition",
						"o2" => "Create new products and services",
						"o3" => "Respond rapidly to competitors and market changes",
						"o4" => "Use sophisticated customer analytics to drive business results",
						"o5" => "Leverage new sources of internal and external data",
						"o6" => "Monetize company data (sell as a product or a service)",
						"o7" => "Optimize existing strong bench of analysts and data scientists",
						"o8" => "Generate return on investments in big data and analytics infrastructure"
					);
					$keys = array_keys($arr);
					shuffle($keys);

					?>
					<div class="question bg-white p-10 border-bottom">
						<div class="d-flex flex-row align-items-center question-title">
							<h3 class="text-danger"></h3>
						</div>
						<?php
						foreach ($keys as $key) {
							?>
							<div class="ans col-md-12">
								<div class="row">
									<div class="col-md-8">
										<label class="checkbox">
											<input type="checkbox" name="s<?php echo $i; ?>" value="<?php echo $key; ?>"
												   onclick="enab_rng(this, <?php echo $i; ?>);">
											<span class="col-md-12"><?php echo $arr[$key]; ?></span>
										</label>
									</div>
									<div class="col-md-4">
										<input type="range" class="form-range" disabled="true" min="1000" max="25000"
											   step="1000" value="5000" oninput="get(this, <?php echo $i; ?>);">
										<span style="font-size:12px;margin-top:-20px;background-color:lightgray;padding:3px 5px;">5000</span>
									</div>
								</div>
							</div>
							<?php
						}
						?>
					</div>
					<div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
						<button class="btn btn-primary d-flex align-items-center btn-primary" type="button" onclick="fun(<?php echo $i; ?>, <?php echo json_encode($quarter_events[$i]);?>);">Next</button>
					</div>
				</div>
				<script type="text/javascript">
					document.getElementById("qq<?php echo $i; ?>").innerHTML = 0;
					<?php
					// if (in_array($i, $quarter_events)) {
					// ?>
					// // Quarter event exists for this quarter number
					// // Perform your desired action for this case
					// event_occurence(<?php echo $i; ?>);
					// <?php
					// }
					?>
				</script>
				<?php
			}
			?>
		</div>
	</div>
</div>

<script>
	window.onbeforeunload = function (event) {
		return "";
	};
</script>

<script type="text/javascript">


////    offensive diffensive selected  ////
	var OffValue = 0; // Variable of offensive value
	var DiffValue = 0;

	function selectSector(sector) {
	if (sector === "banking") {
		OffValue=1;
		DiffValue=3;
	}
	else if (sector === 'housing'){
		OffValue=6;
		DiffValue=1;
	}
	else if (sector ==='retail')
	{
		OffValue=1;
		DiffValue=6;
	}
	
	var sectorValues = {
            offValue: OffValue,
            diffValue: DiffValue
        };
		return sectorValues;
}

function displayValues(sector)
{
        var sectorValues = selectSector(sector);
        alert("Selected Sector: " + sector + "\nOffValue: " + sectorValues.offValue + "\nDiffValue: " + sectorValues.diffValue);
	return sectorValues;
}

//////////////////////////

// Generating random event array for hurdles //

	// var quarter_events = array_events(); 

	// function randomEvent() {
	// 	return Math.floor(Math.random() * 40) + 1;
	// }

	// function array_events() {
	// 	var max_events = Math.floor(Math.random() * (30 - 10)) + 10;
	// 	var quarter_events = [];

	// 	for (var i = 0; i < max_events; i++) {
	// 		quarter_events.push(randomEvent());
	// 	}

	// 	quarter_events.sort(function (a, b) {
	// 		return a - b;
	// 	});

	// 	return quarter_events;   //this contains randomly generated events array from 40 values
	// }

///////////////////////////////////////////////


//// random event occurence ////

function getRandomValueInRow1(events) {


		const row1 = events[0];
		const randomIndex = Math.floor(Math.random() * row1.length);
		var randomValueInRow1 = row1[randomIndex];
		return randomValueInRow1;
	}

	function getRandomValueInRow2(events) {

		
		const row2 = events[1];
		
		const randomIndex = Math.floor(Math.random() * row2.length);
		var randomValueInRow2 = row2[randomIndex];
		return randomValueInRow2;
	}

	function getRandomValueInRow3(events) {
		const row3 = events[2];
		
		const randomIndex = Math.floor(Math.random() * row3.length);
		var randomValueInRow3 = row3[randomIndex];
		return randomValueInRow3;
	}

	

	function event_occurence(quarter) {
		var events = [
			[1000000,500000,250000,1000000,500000,250000,1000000,500000,250000,1000000],
			[1000000, 0,500000, 0,250000, 0, 250000, 0, 500000, 150000],
			[500000, 0, 0, 250000, 0, 0,150000, 0, 0,500000 ]
		];
		
		var amt = quarter * 25000;
		if (amt < 3300000) {
			return getRandomValueInRow1(events);

		} else if (amt >= 3300000 && amt <= 6600000) {
			var rd1 = getRandomValueInRow1(events);
			var rd2 = getRandomValueInRow2(events);
			return rand(rd1,rd2);
		} else {
			return getRandomValueInRow3(events);
		}

}

function calculateDeviation(totalsec,Totalcounts,value_of_initial_corpus) 
{
  const x1 = totalsec[0]; // x (latitude) component of the first coordinate
  const y1 = totalsec[1]; // y (longitude) component of the first coordinate
  const x2 = Totalcounts[0]; // x (latitude) component of the second coordinate
  const y2 = Totalcounts[1]; // y (longitude) component of the second coordinate
  var distance = Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
  console.log(distance);
  return (value_of_initial_corpus*distance);
}










	/////////////////////////////////
	
	///  calculating count of o and d
	var enabledSliders = []; // Array to store enabled sliders' values
	var total_corpus = 1000000; // Set the initial total corpus value
	var used_amounts = new Array(41).fill(0); // Array to store used amounts for each quarter
	var totalO = 0; // Variable to store the total count of opportunities
	var totalD = 0; // Variable to store the total count of difficulties

	// Associative arrays to store the counts of "O" and "D" for each quarter
	var selectedOCounts = {};
	var selectedDCounts = {};
	
	// Helper function to update the counts of "O" and "D" for the current quarter
	function updateSelectedCounts(quarter) {
		selectedOCounts[quarter] = 0;
		selectedDCounts[quarter] = 0;
		$('input:checkbox:checked[name="s' + quarter + '"]').each(function () {
			var value = $(this).val();
			if (value.charAt(0) == 'o') {
				selectedOCounts[quarter]++;
				totalO++;
			} else if (value.charAt(0) == 'd') {
				selectedDCounts[quarter]++;
				totalD++;
			}
		});
		var Totalcounts = {
            TL: totalO,
            TD: totalD
        };
		console.log(Totalcounts);
		return Totalcounts;
	}

//////////////////////////////////

	function fun(quarter,quarterArrayValue) {
		var arr = $('input:checkbox:checked[name="s' + quarter + '"]').map(function () {
			return this.value;
		}).get();

		if (arr.length < 5) {
			alert("Invest more");
			return;
		} else if (arr.length > 5) {
			alert("You cannot invest in more than 5 strategies in a quarter");
			return;
		}

		
		if (quarterArrayValue==quarter)
		{
			var sectorval=selectSector()
			var value_of_initial_corpus = event_occurence(quarter);
			console.log(value_of_initial_corpus);
			var totalTLTD = updateSelectedCounts(quarter);
			var final_value=calculateDeviation(sectorval,totalTLTD,value_of_initial_corpus);
			console.log(final_value);
		}

		updateSelectedCounts(quarter);

		calc(quarter); // working fine till here
		var spentAmount = used_amounts[quarter];
		if (spentAmount < 25000) {
			alert("You must spend exactly 25000 in this quarter before moving to the next quarter.");
			return;
		}

		// var quarter_events = <?php echo json_encode($quarter_events); ?>;

		// if (isQuarterInArray(quarter, quarter_events)) {
		// 	alert("hii");
		// 	// Call event_occurence() only if the quarter is in the quarter_events array
		// 	event_occurence(quarter);
		// }

		if (quarter < 40) {
			var nextQuarter = quarter + 1;
			$("#div" + quarter).hide();
			$("#div" + nextQuarter).show();
			// Update the total corpus for the next quarter
			total_corpus = parseInt($("#tc" + quarter).text().replace(/,/g, '')); // Parse the current total corpus value
			$("#tc" + nextQuarter).text(number_format(total_corpus)); // Update the total corpus for the next quarter
		} 
		else {
			// Redirect to next page or perform final action
			window.location.href = "next_page.html";
		}
	}
	function disableRest(selectedValues, quarter) {
    // Find checkboxes within the current quarter's section
    var checkboxSelector = '#div' + quarter + ' input:checkbox[name^="s"]';
    
    $(checkboxSelector).each(function () {
        var value = $(this).val();

        // Check if the value is in the selectedValues array
        if (selectedValues.indexOf(value) === -1) {
            $(this).prop('disabled', true); // Disable the checkbox
            // $(this).closest('.ans').find('input[type="range"]').prop('disabled', true); // Disable the slider
        }
    });
}

var sumOfEnabledSliders = 0;
	function calc(quarter) {
		enabledSliders = [];

		$("#div" + quarter + " input[type='range']:enabled").each(function () {
			var sliderValue = $(this).val();
			enabledSliders.push(sliderValue);
		});

		sumOfEnabledSliders = enabledSliders.reduce((a, b) => parseInt(a) + parseInt(b), 0);
		var x = document.getElementById('qq' + quarter);
		var nv = 25000 - sumOfEnabledSliders;
		x.innerHTML = nv;

		// Subtract used value from the total corpus for this quarter
		total_corpus -= (sumOfEnabledSliders - used_amounts[quarter]);
		console.log("Total corpus:", sumOfEnabledSliders);
	// 	if (nv == 0) {

    //     alert("Total corpus has gone negative. Please adjust your investments.");
	// 	disableRest(enabledSliders, quarter);
	// 	return;

    // }
		var t = document.getElementById('tc' + quarter);
		t.innerText = number_format(total_corpus);

		// Update the used amount for this quarter
		used_amounts[quarter] = sumOfEnabledSliders;

		// Update counts of O and D for the current quarter
		updateSelectedCounts(quarter);
	}

	function enab_rng(checkbox, quarter) {
		$(checkbox).closest(".ans").find("input[type='range']").prop("disabled", !checkbox.checked);
		calc(quarter);
	}

	function get(slider, quarter) {
		var sliderValue = $(slider).val();
		$(slider).next("span").html(sliderValue);
		calc(quarter);
	}

	// Helper function to format numbers with commas (e.g., 1,000,000)
	function number_format(number) {
		return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
</script>
</body>
</html>












<!-- <!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-5">
		<div class="d-flex justify-content-center row">
			<div class="col-md-11 col-lg-11">
				<center><span style="font-size:30px;font-weight:bolder">What's Your Strategy? </span></center>
				
				<div class="d-flex justify-content-between mt-3">
					<button class="btn btn-primary btn-lg" onclick="selectSector('banking')">Banking</button>
					<button class="btn btn-primary btn-lg" onclick="selectSector('housing')">Housing</button>
					<button class="btn btn-primary btn-lg" onclick="selectSector('retail')">Retail</button>
				</div>
				
				<?php
            // $total_corpus = 1000000; // Set the initial total corpus value
			// function randomEvent() {
			// 	return mt_rand(1, 40);
			// }
			// function isQuarterInArray($quarter, $quarterEventsArray) {
			// 	return in_array($quarter, $quarterEventsArray);
			// }
			
            // function array_events() {
            //     $max_events = mt_rand(10, 30);
            //     $quarter_events = array();

            //     for ($i = 0; $i < $max_events; $i++) {
            //         $quarter_events[] = mt_rand(1, 40);
            //     }

            //     sort($quarter_events);
            //     return $quarter_events;
            //}
            $quarter_events = array_events();		
				for ($i = 1; $i <= 40; $i++){
				?>
					<div class="border" id="div<?php echo $i; ?>" style="<?php if ($i != 1) echo 'display: none;'; ?>">
						<div class="question bg-white p-3 border-bottom">
							<div class="d-flex flex-row justify-content-between align-items-center mcq">
								<span id="tc<?php echo $i; ?>" style="font-size:16px;font-weight:bold;margin-top:0px;"><?php echo number_format($total_corpus); ?></span>
								<span style="font-size:18px;font-weight:bold;margin-left:-100px;">Quarter <span id="q"><?php echo $i; ?></span> out of 40</span>
								Alloted: <span style="font-size:18px;font-weight:bold;">25000</span>
								Used: <span id="qq<?php echo $i; ?>" style="font-size:18px;font-weight:bold;">0</span>
							</div>
						</div>
						<?php
						$arr = array(
							"d1" => "Reduce general operating expenses",
							"d2" => "Meet industry regulatory requirements",
							"d3" => "Prevent cyber attacks and data breaches",
							"d4" => "Mitigate operational risks such as poor access controls and data losses",
							"d5" => "Improve IT infrastructure and reduce data-related costs",
							"d6" => "Streamline back-office systems and processes",
							"d7" => "Improve data quality (completeness, accuracy, timeliness)",
							"d8" => "Rationalize multiple sources of data and information (consolidate and eliminate redundancy)",
							"o1" => "Improve revenue through cross-selling, strategic pricing, and customer acquisition",
							"o2" => "Create new products and services",
							"o3" => "Respond rapidly to competitors and market changes",
							"o4" => "Use sophisticated customer analytics to drive business results",
							"o5" => "Leverage new sources of internal and external data",
							"o6" => "Monetize company data (sell as a product or a service)",
							"o7" => "Optimize existing strong bench of analysts and data scientists",
							"o8" => "Generate return on investments in big data and analytics infrastructure"
						);
						$keys = array_keys($arr);
						shuffle($keys);

						?>
						<div class="question bg-white p-10 border-bottom">
							<div class="d-flex flex-row align-items-center question-title">
								<h3 class="text-danger"></h3>
							</div>
							<?php
							foreach ($keys as $key) {
								?>
								<div class="ans col-md-12">
									<div class="row">
										<div class="col-md-8">
											<label class="checkbox">
												<input type="checkbox" name="s<?php echo $i; ?>" value="<?php echo $key; ?>" onclick="enab_rng(this, <?php echo $i; ?>);">
												<span class="col-md-12"><?php echo $arr[$key]; ?></span>
											</label>
										</div>
										<div class="col-md-4">
											<input type="range" class="form-range" disabled="true" min="1000" max="25000" step="1000" value="5000" oninput="get(this, <?php echo $i; ?>);">
											<span style="font-size:12px;margin-top:-20px;background-color:lightgray;padding:3px 5px;">5000</span>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
						<div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
							<button class="btn btn-primary d-flex align-items-center btn-primary" type="button" onclick="fun(<?php echo $i; ?>);">Next</button>
						</div>
					</div>
					<script type="text/javascript">
						document.getElementById("qq<?php echo $i; ?>").innerHTML = 0;
						<?php
						if (in_array($i, $quarter_events)) 
						{ ?>


						// Quarter event exists for this quarter number
						// Perform your desired action for this case
						event_occurence(<?php echo $i; ?>);


						<?php }?>
					</script>
				<?php 
			
			} 
			
			?>
				
			</div>
		</div>
	</div>

	<script>
		window.onbeforeunload = function (event) {
			return "";
		};
	</script>

	
<script type="text/javascript">
	var enabledSliders = []; // Array to store enabled sliders' values
	var total_corpus = 1000000; // Set the initial total corpus value
	var used_amounts = new Array(41).fill(0); // Array to store used amounts for each quarter
	
	function randomEvent(){
		return Math.floor(Math.random() * 40);
	}

	function isQuarterInArray(quarter, quarterEventsArray) {
    return quarterEventsArray.includes(quarter);
  }

	function array_events(){
	var max_events=Math.floor(Math.random() * (30-10) ) + 10;
	
	const quarter_events=[max_events];

	for (let i = 0; i < max_events; i++) 
	{
		quarter_events[i]=randomEvent();
	}
	quarter_events.sort();

}

function getRandomValueInRow1(events) {
  const row1 = events[0];
  const numericValues = row1.filter((value) => typeof value === 'number');
  const randomIndex = Math.floor(Math.random() * numericValues.length);
  const randomValue = numericValues[randomIndex];
  return randomValue1;
}
function getRandomValueInRow2(events) {
  const row2 = events[1];
  const numericValues = row1.filter((value) => typeof value === 'number');
  const randomIndex = Math.floor(Math.random() * numericValues.length);
  const randomValue = numericValues[randomIndex];
  return randomValue2;
}
function getRandomValueInRow3(events) {
  const row3 = events[2];
  const numericValues = row1.filter((value) => typeof value === 'number');
  const randomIndex = Math.floor(Math.random() * numericValues.length);
  const randomValue = numericValues[randomIndex];
  return randomValue3;
}

	function event_occurence(quarter) {
		let events = [
			['A','B','C','D','E','F','G','H','I','J'], 
			['K',0,'L',0,'M',0,'N',0,'O','P'],
			['Q',0,0,'R',0,0,'S',0,0,'T']
			];


			var amt=$i*25000;
			if(amt<3300000)
			{
				const rd1 = getRandomValueInRow1(events);
			}
			var amt=$i*25000;
			if(amt>=3300000 && amt<=6600000)
			{
				const rd1 = getRandomValueInRow1(events);
				const rd2 = getRandomValueInRow2(events);
			}
			if(amt>6600000)
			{
				const rd3 = getRandomValueInRow3(events);
			}
	}
	// <script>
	// 	var totalO = 0; // Variable to store the total count of opportunities
	// 	var totalD = 0; // Variable to store the total count of difficulties

	// 	// Associative arrays to store the counts of "O" and "D" for each quarter
	// 	var selectedOCounts = {};
	// 	var selectedDCounts = {};

	// 	// Helper function to update the counts of "O" and "D" for the current quarter
		function updateSelectedCounts(quarter) {
			selectedOCounts[quarter] = 0;
			selectedDCounts[quarter] = 0;

			$('input:checkbox:checked[name="s'+quarter+'"]').each(function () {
				var value = $(this).val();
				if (value.charAt(0) == 'o') {
					selectedOCounts[quarter]++;
					totalO++;
				} else if (value.charAt(0) == 'd') {
					selectedDCounts[quarter]++;
					totalD++;
				}
			});

			// Display the count of O and D for the current quarter
			$("#counts").html("Quarter " + quarter + " Counts - O: " + selectedOCounts[quarter] + ", D: " + selectedDCounts[quarter]);

			// Display the total count of O and D across all quarters
			$("#totalCount").html("Total Counts - O: " + totalO + ", D: " + totalD);
		}

	function fun(quarter) {
		var arr = $('input:checkbox:checked[name="s'+quarter+'"]').map(function () {
			return this.value;
		}).get();

		if (arr.length < 5) {
			alert("Invest more");
			return;
		} else if (arr.length > 5) {
			alert("You cannot invest in more than 5 strategies in a quarter");
			return;
		}

		calc(quarter);
		var spentAmount = used_amounts[quarter];
		if (spentAmount < 25000) {
			alert("You must spend exactly 25000 in this quarter before moving to the next quarter.");
			return;
		}

		if (isQuarterInArray(quarter, quarter_events)) {
			// Call event_occurence() only if the quarter is in the quarter_events array
			event_occurence(quarter);
		}

		if (quarter < 40) {
			var nextQuarter = quarter + 1;
			$("#div" + quarter).hide();
			$("#div" + nextQuarter).show();
			// Update the total corpus for the next quarter
			total_corpus = parseInt($("#tc" + quarter).text().replace(/,/g, '')); // Parse the current total corpus value
			$("#tc" + nextQuarter).text(number_format(total_corpus)); // Update the total corpus for the next quarter
		} else {
			// Redirect to next page or perform final action
			window.location.href = "next_page.html";
		}
	}

	function calc(quarter) {
		enabledSliders = [];

		$("#div" + quarter + " input[type='range']:enabled").each(function() {
			var sliderValue = $(this).val();
			enabledSliders.push(sliderValue);
		});

		var sumOfEnabledSliders = enabledSliders.reduce((a, b) => parseInt(a) + parseInt(b), 0);
		var x = document.getElementById('qq' + quarter);
		var nv = 25000 - sumOfEnabledSliders;
		x.innerHTML = nv;

		// Subtract used value from the total corpus for this quarter
		total_corpus -= (sumOfEnabledSliders - used_amounts[quarter]);
		var t = document.getElementById('tc' + quarter);
		t.innerText = number_format(total_corpus);

		// Update the used amount for this quarter
		used_amounts[quarter] = sumOfEnabledSliders;
	}

	function enab_rng(checkbox, quarter) {
			$(checkbox).closest(".ans").find("input[type='range']").prop("disabled", !checkbox.checked);
			calc(quarter);
		}

		function get(slider, quarter) {
			var sliderValue = $(slider).val();
			$(slider).next("span").html(sliderValue);
			calc(quarter);
		}

		// Helper function to format numbers with commas (e.g., 1,000,000)
		function number_format(number) {
			return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}
</script>
</body>
</html> -->



<!-- 

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="container mt-5">
		<div class="d-flex justify-content-center row">
			<div class="col-md-11 col-lg-11">
				<center><span style="font-size:30px;font-weight:bolder">What's Your Strategy? </span></center>
				<?php
				$total_corpus = 1000000; // Set the initial total corpus value
				for ($i = 1; $i <= 40; $i++) {
					?>
					<div class="border" id="div<?php echo $i; ?>" style="<?php if ($i != 1) echo 'display: none;'; ?>">
						<div class="question bg-white p-3 border-bottom">
							<div class="d-flex flex-row justify-content-between align-items-center mcq">
								<span id="tc<?php echo $i; ?>" style="font-size:16px;font-weight:bold;margin-top:0px;"><?php echo number_format($total_corpus); ?></span>
								<span style="font-size:18px;font-weight:bold;margin-left:-100px;">Quarter <span id="q"><?php echo $i; ?></span> out of 40</span>
								Alloted: <span style="font-size:18px;font-weight:bold;">25000</span>
								Used: <span id="qq<?php echo $i; ?>" style="font-size:18px;font-weight:bold;">0</span>
							</div>
						</div>
						<?php
						$arr = array(
							"d1" => "Reduce general operating expenses",
							"d2" => "Meet industry regulatory requirements",
							"d3" => "Prevent cyber attacks and data breaches",
							"d4" => "Mitigate operational risks such as poor access controls and data losses",
							"d5" => "Improve IT infrastructure and reduce data-related costs",
							"d6" => "Streamline back-office systems and processes",
							"d7" => "Improve data quality (completeness, accuracy, timeliness)",
							"d8" => "Rationalize multiple sources of data and information (consolidate and eliminate redundancy)",
							"o1" => "Improve revenue through cross-selling, strategic pricing, and customer acquisition",
							"o2" => "Create new products and services",
							"o3" => "Respond rapidly to competitors and market changes",
							"o4" => "Use sophisticated customer analytics to drive business results",
							"o5" => "Leverage new sources of internal and external data",
							"o6" => "Monetize company data (sell as a product or a service)",
							"o7" => "Optimize existing strong bench of analysts and data scientists",
							"o8" => "Generate return on investments in big data and analytics infrastructure"
						);
						$keys = array_keys($arr);
						shuffle($keys);
						
						


						?>
						<div class="question bg-white p-10 border-bottom">
							<div class="d-flex flex-row align-items-center question-title">
								<h3 class="text-danger"></h3>
							</div>
							<?php
							foreach ($keys as $key) {
								?>
								<div class="ans col-md-12">
									<div class="row">
										<div class="col-md-8">
											<label class="checkbox">
												<input type="checkbox" name="s<?php echo $i; ?>" value="<?php echo $key; ?>" onclick="enab_rng(this, <?php echo $i; ?>);">
												<span class="col-md-12"><?php echo $arr[$key]; ?></span>
											</label>
										</div>
										<div class="col-md-4">
											<input type="range" class="form-range" disabled="true" min="1000" max="25000" step="1000" value="5000" oninput="get(this, <?php echo $i; ?>);">
											<span style="font-size:12px;margin-top:-20px;background-color:lightgray;padding:3px 5px;">5000</span>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
						<div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
							<button class="btn btn-primary d-flex align-items-center btn-primary" type="button" onclick="fun(<?php echo $i; ?>);">Next</button>
						</div>
					</div>
					<script type="text/javascript">
						document.getElementById("qq<?php echo $i; ?>").innerHTML = 0;
					</script>
				<?php 
				} 
				?>
				
			</div>
		</div>
	</div>

	<script>
		window.onbeforeunload = function (event) {
			return "";
		};
	</script>

	
<script type="text/javascript">
	var enabledSliders = []; // Array to store enabled sliders' values
	var total_corpus = 1000000; // Set the initial total corpus value
	var used_amounts = new Array(41).fill(0); // Array to store used amounts for each quarter
	
	function randomEvent(){
		return Math.floor(Math.random() * 40);
	}

	function isQuarterInArray(quarter, quarterEventsArray) {
    return quarterEventsArray.includes(quarter);
  }

	function array_events(){
	var max_events=Math.floor(Math.random() * (30-10) ) + 10;
	
	const quarter_events=[max_events];

	for (let i = 0; i < max_events; i++) 
	{
		quarter_events[i]=randomEvent();
	}
	quarter_events.sort();

 return _________;
}

function getRandomValueInRow1(events) {
  const row1 = events[0];
  const numericValues = row1.filter((value) => typeof value === 'number');
  const randomIndex = Math.floor(Math.random() * numericValues.length);
  const randomValue = numericValues[randomIndex];
  return randomValue1;
}
function getRandomValueInRow2(events) {
  const row2 = events[1];
  const numericValues = row1.filter((value) => typeof value === 'number');
  const randomIndex = Math.floor(Math.random() * numericValues.length);
  const randomValue = numericValues[randomIndex];
  return randomValue2;
}
function getRandomValueInRow3(events) {
  const row3 = events[2];
  const numericValues = row1.filter((value) => typeof value === 'number');
  const randomIndex = Math.floor(Math.random() * numericValues.length);
  const randomValue = numericValues[randomIndex];
  return randomValue3;
}



	function event_occurence()
	{

		let events = [
			['A','B','C','D','E','F','G','H','I','J'], 
			['K',0,'L',0,'M',0,'N',0,'O','P'],
			['Q',0,0,'R',0,0,'S',0,0,'T']
			];


			var amt=$i*25000;
			if(amt<3300000)
			{
				const rd1 = getRandomValueInRow1(events);
			}
			var amt=$i*25000;
			if(amt>=3300000 && amt<=6600000)
			{
				const rd1 = getRandomValueInRow1(events);
				const rd2 = getRandomValueInRow2(events);
			}
			if(amt>6600000)
			{
				const rd3 = getRandomValueInRow3(events);
			}



	}


	function fun(quarter) {
		var arr = $('input:checkbox:checked[name="s'+quarter+'"]').map(function () {
			return this.value;
		}).get();

		if (arr.length < 5) {
			alert("Invest more");
			return;
		}

		else if(arr.length > 5) {
			alert("You cannot invest in more than 5 strategies in a quarter");
			return;
		}

		calc(quarter);
		var spentAmount = used_amounts[quarter];
		if (spentAmount < 25000) {
		alert("You must spend exactly 25000 in this quarter before moving to the next quarter.");
		return;
		}

		if (isQuarterInArray(quarter + 1, quarter_events))
		{
		if (quarter < 40) {
			var nextQuarter = quarter + 1;
			$("#div" + quarter).hide();
			$("#div" + nextQuarter).show();
			// Update the total corpus for the next quarter
			total_corpus = parseInt($("#tc" + quarter).text().replace(/,/g, '')); // Parse the current total corpus value
			$("#tc" + nextQuarter).text(number_format(total_corpus)); // Update the total corpus for the next quarter
		} else {
			// Redirect to next page or perform final action
			window.location.href = "next_page.html";
		}
	}

	function calc(quarter) {
		enabledSliders = [];

		$("#div" + quarter + " input[type='range']:enabled").each(function() {
			var sliderValue = $(this).val();
			enabledSliders.push(sliderValue);
		});

		var sumOfEnabledSliders = enabledSliders.reduce((a, b) => parseInt(a) + parseInt(b), 0);
		var x = document.getElementById('qq' + quarter);
		var nv = 25000 - sumOfEnabledSliders;
		x.innerHTML = nv;

		// Subtract used value from the total corpus for this quarter
		total_corpus -= (sumOfEnabledSliders - used_amounts[quarter]);
		var t = document.getElementById('tc' + quarter);
		t.innerText = number_format(total_corpus);

		// Update the used amount for this quarter
		used_amounts[quarter] = sumOfEnabledSliders;
	}

	function enab_rng(checkbox, quarter) {
			$(checkbox).closest(".ans").find("input[type='range']").prop("disabled", !checkbox.checked);
			calc(quarter);
		}

		function get(slider, quarter) {
			var sliderValue = $(slider).val();
			$(slider).next("span").html(sliderValue);
			calc(quarter);
		}

		// Helper function to format numbers with commas (e.g., 1,000,000)
		function number_format(number) {
			return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}
</script>
</body>
</html>





 -->





<!-- 
individual selection desecltion of particular slider working -->


<!-- <!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="container mt-5">
		<div class="d-flex justify-content-center row">
			<div class="col-md-11 col-lg-11">
				<center><span style="font-size:30px;font-weight:bolder">What's Your Strategy? </span></center>
				<?php
				$total_corpus = 1000000; // Set the initial total corpus value
				for ($i = 1; $i <= 40; $i++) {
					?>
					<div class="border" id="div<?php echo $i; ?>" style="<?php if ($i != 1) echo 'display: none;'; ?>">
						<div class="question bg-white p-3 border-bottom">
							<div class="d-flex flex-row justify-content-between align-items-center mcq">
								<span id="tc<?php echo $i; ?>" style="font-size:16px;font-weight:bold;margin-top:0px;"><?php echo number_format($total_corpus); ?></span>
								<span style="font-size:18px;font-weight:bold;margin-left:-100px;">Quarter <span id="q"><?php echo $i; ?></span> out of 40</span>
								Alloted: <span style="font-size:18px;font-weight:bold;">25000</span>
								Used: <span id="qq<?php echo $i; ?>" style="font-size:18px;font-weight:bold;">0</span>
							</div>
						</div>
						<?php
						$arr = array(
							"d1" => "Reduce general operating expenses",
							"d2" => "Meet industry regulatory requirements",
							"d3" => "Prevent cyber attacks and data breaches",
							"d4" => "Mitigate operational risks such as poor access controls and data losses",
							"d5" => "Improve IT infrastructure and reduce data-related costs",
							"d6" => "Streamline back-office systems and processes",
							"d7" => "Improve data quality (completeness, accuracy, timeliness)",
							"d8" => "Rationalize multiple sources of data and information (consolidate and eliminate redundancy)",
							"o1" => "Improve revenue through cross-selling, strategic pricing, and customer acquisition",
							"o2" => "Create new products and services",
							"o3" => "Respond rapidly to competitors and market changes",
							"o4" => "Use sophisticated customer analytics to drive business results",
							"o5" => "Leverage new sources of internal and external data",
							"o6" => "Monetize company data (sell as a product or a service)",
							"o7" => "Optimize existing strong bench of analysts and data scientists",
							"o8" => "Generate return on investments in big data and analytics infrastructure"
						);
						$keys = array_keys($arr);
						shuffle($keys);
						?>
						<div class="question bg-white p-10 border-bottom">
							<div class="d-flex flex-row align-items-center question-title">
								<h3 class="text-danger"></h3>
							</div>
							<?php
							foreach ($keys as $key) {
								?>
								<div class="ans col-md-12">
									<div class="row">
										<div class="col-md-8">
											<label class="checkbox">
												<input type="checkbox" name="s<?php echo $i; ?>" value="<?php echo $key; ?>" onclick="enab_rng(this, <?php echo $i; ?>);">
												<span class="col-md-12"><?php echo $arr[$key]; ?></span>
											</label>
										</div>
										<div class="col-md-4">
											<input type="range" class="form-range" disabled="true" min="1000" max="25000" step="1000" value="5000" oninput="get(this, <?php echo $i; ?>);">
											<span style="font-size:12px;margin-top:-20px;background-color:lightgray;padding:3px 5px;">5000</span>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
						<div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
							<button class="btn btn-primary d-flex align-items-center btn-primary" type="button" onclick="fun(<?php echo $i; ?>);">Next</button>
						</div>
					</div>
					<script type="text/javascript">
						document.getElementById("qq<?php echo $i; ?>").innerHTML = 0;
					</script>
				<?php } ?>
				
			</div>
		</div>
	</div>

	<script>
		window.onbeforeunload = function (event) {
			return "";
		};
	</script>

	<script type="text/javascript">
		var enabledSliders = []; // Array to store enabled sliders' values
		var total_corpus = 1000000; // Set the initial total corpus value
		var used_amounts = new Array(41).fill(0); // Array to store used amounts for each quarter

		function fun(quarter) {
			var arr = $('input:checkbox:checked[name="s'+quarter+'"]').map(function () {
				return this.value;
			}).get();

			if (arr.length > 5) {
				alert("You cannot invest in more than 5 strategies in a quarter");
				return;
			}
			
			calc(quarter);

			if (quarter < 40) {
				var nextQuarter = quarter + 1;
				$("#div" + quarter).hide();
				$("#div" + nextQuarter).show();
			} else {
				// Redirect to next page or perform final action
				window.location.href = "next_page.html";
			}
		}

		function calc(quarter) {
			enabledSliders = [];

			$("#div" + quarter + " input[type='range']:enabled").each(function() {
				var sliderValue = $(this).val();
				enabledSliders.push(sliderValue);
			});

			var sumOfEnabledSliders = enabledSliders.reduce((a, b) => parseInt(a) + parseInt(b), 0);
			var x = document.getElementById('qq' + quarter);
			var nv = 25000 - sumOfEnabledSliders;
			x.innerHTML = nv;

			// Subtract used value from the total corpus for this quarter
			total_corpus -= (sumOfEnabledSliders - used_amounts[quarter]);
			var t = document.getElementById('tc' + quarter);
			t.innerText = number_format(total_corpus);

			// Update the used amount for this quarter
			used_amounts[quarter] = sumOfEnabledSliders;
		}

		function enab_rng(checkbox, quarter) {
			$(checkbox).closest(".ans").find("input[type='range']").prop("disabled", !checkbox.checked);
			calc(quarter);
		}

		function get(slider, quarter) {
			var sliderValue = $(slider).val();
			$(slider).next("span").html(sliderValue);
			calc(quarter);
		}

		// Helper function to format numbers with commas (e.g., 1,000,000)
		function number_format(number) {
			return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}
	</script>
</body>
</html> -->















































<!-- 

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="container mt-5">
		<div class="d-flex justify-content-center row">
			<div class="col-md-11 col-lg-11">
				<center><span style="font-size:30px;font-weight:bolder">What's Your Strategy? </span></center>
				
				<?php for ($i = 1; $i <= 40; $i++) { ?>
					<div class="border" id="div<?php echo $i; ?>" style="<?php if ($i != 1) echo 'display: none;'; ?>">
						<div class="question bg-white p-3 border-bottom">
							<div class="d-flex flex-row justify-content-between align-items-center mcq">
								<span id="tc <?php echo $i; ?>" style="font-size:16px;font-weight:bold;margin-top:0px;">1000000</span>
								<span style="font-size:18px;font-weight:bold;margin-left:-100px;">Quarter <span id="q"><?php echo $i; ?></span> out of 40</span>
								Alloted: <span style="font-size:18px;font-weight:bold;">25000</span>
								Used: <span id="qq<?php echo $i; ?>" style="font-size:18px;font-weight:bold;">0</span>
							</div>
						</div>
						<?php
						$arr = array(
							"d1" => "Reduce general operating expenses",
							"d2" => "Meet industry regulatory requirements",
							"d3" => "Prevent cyber attacks and data breaches",
							"d4" => "Mitigate operational risks such as poor access controls and data losses",
							"d5" => "Improve IT infrastructure and reduce data-related costs",
							"d6" => "Streamline back-office systems and processes",
							"d7" => "Improve data quality (completeness, accuracy, timeliness)",
							"d8" => "Rationalize multiple sources of data and information (consolidate and eliminate redundancy)",
							"o1" => "Improve revenue through cross-selling, strategic pricing, and customer acquisition",
							"o2" => "Create new products and services",
							"o3" => "Respond rapidly to competitors and market changes",
							"o4" => "Use sophisticated customer analytics to drive business results",
							"o5" => "Leverage new sources of internal and external data",
							"o6" => "Monetize company data (sell as a product or a service)",
							"o7" => "Optimize existing strong bench of analysts and data scientists",
							"o8" => "Generate return on investments in big data and analytics infrastructure"
						);
						$keys = array_keys($arr);
						shuffle($keys);
						?>
						<div class="question bg-white p-10 border-bottom">
							<div class="d-flex flex-row align-items-center question-title">
								<h3 class="text-danger"></h3>
							</div>
							<?php
							foreach ($keys as $key) {
								?>
								<div class="ans col-md-12">
									<div class="row">
										<div class="col-md-8">
											<label class="checkbox">
												<input type="checkbox" name="s<?php echo $i; ?>" value="<?php echo $key; ?>" onclick="enab_rng(this, <?php echo $i; ?>);">
												<span class="col-md-12"><?php echo $arr[$key]; ?></span>
											</label>
										</div>
										<div class="col-md-4">
											<input type="range" class="form-range" disabled="true" min="1000" max="25000" step="1000" value="5000" oninput="get(this, <?php echo $i; ?>);">
											<span style="font-size:12px;margin-top:-20px;background-color:lightgray;padding:3px 5px;">5000</span>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
						<div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
							<button class="btn btn-primary d-flex align-items-center btn-primary" type="button" onclick="fun(<?php echo $i; ?>);">Next</button>
						</div>
					</div>
					<script type="text/javascript">
						document.getElementById("qq<?php echo $i; ?>").innerHTML = 0;
					</script>
				<?php } ?>
				
			</div>
		</div>
	</div>

	<script>
		window.onbeforeunload = function (event) {
			return "";
		};
	</script>

	<script type="text/javascript">
		var enabledSliders = []; // Array to store enabled sliders' values

		function fun(quarter) {
			var arr = $('input:checkbox:checked[name="s'+quarter+'"]').map(function () {
				return this.value;
			}).get();

			if (arr.length > 5) {
				alert("You cannot invest in more than 5 strategies in a quarter");
				return;
			}
			
			calc(quarter);

			if (quarter < 40) {
				var nextQuarter = quarter + 1;
				$("#div" + quarter).hide();
				$("#div" + nextQuarter).show();
			} else {
				// Redirect to next page or perform final action
				window.location.href = "next_page.html";
			}
		}

		function calc(quarter) {
			enabledSliders = [];

			$("#div" + quarter + " input[type='range']:enabled").each(function() {
				var sliderValue = $(this).val();
				enabledSliders.push(sliderValue);
			});

			var sumOfEnabledSliders = enabledSliders.reduce((a, b) => parseInt(a) + parseInt(b), 0);
			var x = document.getElementById('qq' + quarter);
			var nv = 25000 - sumOfEnabledSliders;
			x.innerHTML = nv;
			var t = document.getElementById('tc' + quarter);
			var nc = t - sumOfEnabledSliders;
			t.innerText=nc;
		}

		function enab_rng(checkbox, quarter) {
			$(checkbox).closest(".ans").find("input[type='range']").prop("disabled", !checkbox.checked);
			calc(quarter);
		}

		function get(slider, quarter) {
			var sliderValue = $(slider).val();
			$(slider).next("span").html(sliderValue);
			calc(quarter);
		}
	</script>
</body>
</html> --> -->
