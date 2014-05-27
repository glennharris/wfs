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
	    <label>Phone</label><input id="phone" name="phone" type="tel" placeholder="Home, work or mobile" onChange="valField(this, 'phone');" /></br>
	    <label>Date of Birth</label><input id="dob" name="dob" type="date" /><br />
	    <label>Marital Status</label>
	    <select id="mstatus" name="mstatus">
		    <option value="" selected disabled style="display:none">Select from the list</option>
		    <option value="0">Single</option>
		    <option value="1">Married</option>
		    <option value="2">Divorced</option>
		    <option value="3">Other</option>
	    </select><br />
	    <label>Gender</label><input type="radio" id="gender" name="gender" value="1" / >Male
	        <input type="radio" id="gender" name="gender" value="2" / >Female<br />
	    <label style="clear:both;">Assets</label><select id="astype" name="astype">
	        <option value="" selected disabled style="display:none">Select from the list</option>
	        <option value="1">Cash</option>
	        <option value="2">Home</option>
	        <option value="3">Shares</option>
	        <option value="4">Term Deposit</option>
	        <option value="5">Managed Fund</option>
	        <option value="6">Superannuation Fund</option>
	        <option value="7">Pension</option>
	    </select>
	    <div id="assets">
	    <input type="text" id="myInputs[]" name="myInputs[]" />
	    <input type="button" value="Add another" onClick="addField('assets');">
	    </div>
	    <input type="submit" />
	</form>
</div>
</div>
<?php  
include ("wfsfunc.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    echo var_dump(is_string($_POST['fname']));
    echo var_dump(fCheck($_POST['phone'], 'string', 255));
    echo $_POST['phone'];
    //echo 
}

?>
<?php 
//include('wfsfoot.php');
?>
