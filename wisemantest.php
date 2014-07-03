<?php
include('wfshead.php');	
include ("db.php"); 
include ("wfsfunc.php");		
?>
<!-- Move this into the header file after test-->
<script src="wfsval.js"></script>
<link rel="stylesheet" media="screen,print" href="wfsform.css" />
<!------------------------------------>
<div id="page_content" class="editable"><h1></h1>
<p></p>

<div >
    <form action="procform.php" method="POST">
    <div id="cdetails">  
	    <label>First Name</label><input id="fname" name="fname" type="text" onChange="valField(this, 'string');" /><br />
	    <label>Last Name</label><input id="lname" name="lname" type="text" onChange="valField(this, 'string');" /><br />
	    <div id="locationField">
		    <label>Address</label>
		    <input id="autocomplete" onFocus="geolocate()" type="text" /><br />
        </div>
	    <div style="display:block;">
	    <input class="field" name="subpremise" id="subpremise"/>
	    <input class="field" name="street_number" id="street_number" />
        <input class="field" name="route" id="route" />
        <input class="field" name="locality" id="locality" />
	    <input class="field" name="administrative_area_level_1" id="administrative_area_level_1" />
        <input class="field" name="postal_code" id="postal_code" />
        <input class="field" name="country" id="country" />
	    </div>
	    <label>Email</label><input id="email" name="email" type="text" placeholder="E.g. name@company.com" onChange="valField(this, 'email');"/><br />
	    <label>Phone</label><input id="phone" name="phone" type="tel" placeholder="Home, work or mobile" onChange="valField(this, 'phone');" /></br>
	    <label>Date of Birth</label><input id="dob" name="dob" type="date" /><br />
	    <label>Gender</label><input type="radio" id="gender" name="gender" value="1" / >Male
	        <input type="radio" id="gender" name="gender" value="2" / >Female<br />
	    <label style="clear:both;">Marital Status</label>
	    <select id="mstatus" name="mstatus">
	        <option value="" selected disabled style="display:none">Select from the list</option>
		    <?php 
	            $query = "SELECT * FROM MARITAL_STATUS";
                $result = $mysqli->query($query);
                while ($row = $result->fetch_array()) {
	                 echo "<option value=" . $row['MARITAL_STATUS_ID'] . ">" . $row['DESCRIPTION'] . "</option>";
	            }
	        ?>
	    </select>
	</div>
	<div id="cemp" style="clear:both;">
	    <label style="clear:both;">Are you employed?</label>
	    <input type="radio" id="curremp" name="curremp" value="1" onChange="toggleField(this, 'jt');" />Yes
	    <input type="radio" id="curremp" name="curremp" value="0" onChange="toggleField(this, 'jt');" />No<br />
	    <div id="jt" style="display:none; float:left;"><label>Current Job</label><input id="jobtitle" name="jobtitle" type=text /></div>
	</div>
	<div id="cass">
	    <label style="clear:both;">Assets</label><select id="astype" name="astype">
	        <option value="" selected disabled style="display:none">Select from the list</option>
	        <?php 
	            $query = "SELECT * FROM ASSET_TYPES";
                $result = $mysqli->query($query);
                while ($row = $result->fetch_array()) {
	                 echo "<option value=" . $row['ASSET_TYPE_ID'] . ">" . $row['DESCRIPTION'] . "</option>";
	            }
	        ?>
	    </select>
	    <div id="assets">
	    <input type="text" id="myInputs[]" name="myInputs[]" />
	    <input type="button" value="Add another" onClick="addField('assets');">
	    </div>
	</div>
	    <input type="submit" value="submit" />
	</form>
</div>
</div>

<?php 
//include('wfsfoot.php');
?>
