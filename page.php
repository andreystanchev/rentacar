<?php
    $postarguments = [];
    
    foreach ($_POST as $key => $value) {
	    $postarguments[$key] = $value;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Rent a car</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="css/datepicker.min.css" >
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/datepicker.js"></script>  
	</head>
	<body>
		<div class="container">
			<div class="header">
				<nav>
					<ul>
						<li><a class="active" href="#">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">Contacts</a></li>
						<div class="clear"></div>                  
                    </ul>
                    </nav>
            </div>
            <content>
                <div class="clear"></div>
                <div class="container">   
                    <div class="left_container">
                        <div class="results">
                            <p>Results</p>   
                            <?php
                                if(isset($postarguments["type"])) {
                                    echo getResults($postarguments);
                                } else {
                                    echo getResults();
                                }
                            ?>
                        </div>
                    </div>
                    <div class="right_container">
                        <div class="search_car">
                            <p class="search_car_text">Search car</p>
                            <div class="textbox">
                                
                                <p class="about_us">About us</p>
                                <p class="about_us_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 
                                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and 
                                    scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap 
                                    into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the 
                                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                                    like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <a href="#" class="about_us_link">more...</a>
                            </div>
                            <div class="form_div">
                            <form action="" method="post">
                                <div class='left_form'>
                                    <ul>
                                        <li>
                                            <label for="make" class="form_labels"><span>Make</span></label>
                                            <select name="brand" id="make">
                                                <option value="" disabled selected hidden>Choose make</option>
                                                <?php
                                                   echo getBrand();
                                                ?>
                                            </select>    
                                        </li>
                                        <li>
                                            <label for="registration-number" class="form_labels"><span>Registration Number</span></label>
                                            <input name="reg_num" type="text" id="registration-number" placeholder="Enter Reg.Number"> 
                                        </li>
                                        <li>
                                            <label for="color" class="form_labels"><span>Color</span></label>
                                            <select name="color" id="color">
                                                <option value="" disabled selected hidden>Choose color</option>
                                                <?php
                                                   echo getColors();
                                                ?>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="from_date" class="form_labels"><span>From</span></label>
                                            <input name="from_date" id="from_date" data-toggle="datepicker" placeholder="Choose FROM Date">
                                            <label for="from_date" id="from_date_img"></label>
                                        </li>
                                    </ul>
                                </div>	
                                <div class="right_form">
                                    <ul>
                                        <li>
                                            <label for="model" class="form_labels"><span>Model</span></label>
                                            <select name="model" id="model">
                                                <option value="" disabled selected hidden>Choose model</option>
                                                <?php
                                                   echo getModel();
                                                ?>
                                            </select>    
                                        </li>
                                        <li>
                                            <label for="power" class="form_labels"><span>Power</span></label>
                                            <select name="horse_powers" id="power">
                                                <option disabled selected hidden>Choose power</option>
                                                <option value="1">0 - 100</option>
                                                <option value="2">100 - 200</option>
                                                <option value="3">200 - 300</option>
                                                <option value="4">300+</option>
                                            </select>   
                                        </li>
                                        <li>
                                            <label for="type" class="form_labels"><span>Type</span></label>
                                            <select name="type" id="type">
                                                <option value="" disabled selected hidden>Choose type</option>
                                                <option value="allFreeCars">Show Free Cars</option>
                                                <option value="allRentedCars">Show Rented Cars</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="to_date" class="form_labels"><span>To</span></label>
                                            <input name="to_date" id="to_date" data-toggle="datepicker" placeholder="Choose TO Date">
                                            <label for="to_date" id="to_date_img"></label>
                                        </li>
                                        <li>
                                            <input type="submit" value="Search" id="search-button">
                                        </li>
                                    </ul>
                                </div>
                                <div class="clear"></div>
                            </form>
                        </div>
                        </div>
                        <div class="clear"></div>  
                    </div>
                    <div class="clear"></div>                  
                </div> 
                <span class="all_right">All right reserved solutions.</span>    
			</content>
		</div>
        <script type="text/javascript" src="js/scripts.js"></script> 
	</body>
</html>