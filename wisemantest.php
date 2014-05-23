<?php
//include('wfshead.php');			
?>
<!-- Move this into the header file -->
<script src="wfsval.js"></script>
<link rel="stylesheet" media="screen,print" href="wfsform.css" />
<!------------------------------------>
<div id="page_content" class="editable"><h1></h1>
<p></p>
<div >
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        
	    <label>First Name</label><input id="fname" name="fname" type="text" onChange="valField(this, 'string');" /><br />
	    <label>Last Name</label><input id="lname" name="lname" type="text" onChange="valField(this, 'string');" /><br />
	    <div id="locationField">
		    <label>Address</label>
		    <input id="autocomplete" onFocus="geolocate()" type="text" /><br />
        </div>
	    <div style="display:none;">
	    <input class="field" name="street_number" disabled="true" />
        <input class="field" name="route" disabled="true" />
        <input class="field" name="locality" disabled="true" />
	    <input class="field" name="administrative_area_level_1" disabled="true" />
        <input class="field" name="postal_code" disabled="true" />
        <input class="field" name="country" disabled="true" />
	    </div>
	    <label>Email</label><input id="email" name="email" type="text" placeholder="E.g. name@company.com" onChange="valField(this, 'email');"/><br />
	    <label>Phone</label><input id="phone" name="phone" type="tel" placeholder="Home, work or mobile"/></br>
	    <label>Date of Birth</label><input id="dob" name="dob" type="date" /><br />
	    <label>Marital Status</label>
	    <select id="mstatus" name="mstatus">
		    <option value="" selected disabled style="display:none">Select from the list</option>
		    <option value="0">Single</option>
		    <option value="1">Married</option>
		    <option value="2">Divorced</option>
		    <option value="3">Other</option>
	    </select><br />
	    <input type="submit" />
	</form>
</div>
</div>
<?php  
include ("wfsfunc.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
/*
    // Form validation
    if (isset($_POST["fname"]) && fCheck($_POST["fname"], 'string', 25) != FALSE) {
        $fname = $_POST["fname"];  
    } else {
        echo "Enter a first name!\n";
    }
    
    if (isset($_POST["lname"]) && fCheck($_POST["lname"], 'string', 25) != FALSE) {
        $fname = $_POST["lname"];  
    } else {
        echo "Enter a last name!\n";
    }*/
    
    echo filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    echo var_dump(fCheck($_POST['email'], 'email', 255));
}

?>
<?php 
//include('wfsfoot.php');
?>
