<?php
include('wfshead.php');	

?>
<!---<!doctype html>
<html lang="en" class="no-js">
<head>		
    <link rel="stylesheet" media="screen,print" href="wfsform.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.6/angular.min.js"></script>
<script type="text/javascript" src="address.js"></script>


<body onload="initialize()" ng-app="wfsApp">
-->
<div id="contact_content" ng-controller="wfsController">
<h1>Personal Details</h1>
    <form role="form" ng-submit="processForm()">
        <div class="form-group">
            <label>First Name</label>
            <input class="form-control" type="text" name="firstName" ng-model="wfsForm.firstName" >
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input class="form-control" type="text" name="lastName" ng-model="wfsForm.lastName" >
        </div>
        <div class="form-group">
            <div id="locationField">
		<label>Address</label>
                <input class="form-control" id="autocomplete" onFocus="geolocate()" type="text" />
            </div>
        </div>
	    <div style="display:none;">
	        <input class="field" name="subpremise" id="subpremise"/>
	        <input class="field" name="street_number" id="street_number" />
            <input class="field" name="route" id="route" />
            <input class="field" name="locality" id="locality" />
	        <input class="field" name="administrative_area_level_1" id="administrative_area_level_1" />
            <input class="field" name="postal_code" id="postal_code" />
            <input class="field" name="country" id="country" />
	    </div>
        <div class="form-group">
	    <label>Email</label>
            <input class="form-control" id="email" name="email" type="email" ng-model="wfsForm.email" >
        </div>
        <div class="form-group">
	    <label>Phone</label>
            <input class="form-control" id="phone" name="phone" type="tel" ng-model="wfsForm.phone"  />
        </div>
        <div class="form-group">
	    <label>Date of Birth</label>
            <input class="form-control" type="date" id="dob" name="dob" ng-model="wfsForm.dob"  />
        </div>
        <div class="form-group">
            <label>Gender</label>
            <div class="radio" ng-repeat="n in wfsForm.g_options">
                <label>
                    <input type="radio" ng-model="wfsForm.gender" ng-value="n.id"  />{{n.name}}
                </label>
            </div>
        </div>
        <div class="form-group">
	    <label>Marital Status</label>
	    <select class="form-control" id="mstatus" name="mstatus" ng-model="wfsForm.mstatus" ng-options="obj.id as obj.name for obj in wfsForm.ms_options"  >
	        <option value="" selected disabled style="display:none">Select from the list</option>	            
	    </select>
        </div>
        <div class="form-group">
	    <label>Are you employed?</label>
            <div class="radio" ng-repeat="n in wfsForm.yesno | orderBy : 'id' : reverse=true">
                <label>
                    <input type="radio" ng-model="wfsForm.employed" ng-value="n.id"  />{{n.name}}
                </label>
            </div>
        </div>
        <div class="form-group">
	    <label>Job Title</label>
            <input class="form-control" type="text" ng-model="wfsForm.jobtitle" ng-disabled="wfsForm.employed == '0'" ng-="wfsForm.employed == '1'" id="jobtitle" name="jobtitle" />
        </div>
        <div class="form-group">
	    <label>Do you have a will?</label>
            <div class="radio" ng-repeat="n in wfsForm.yesno | orderBy : 'id' : reverse=true">
                <label> 
                    <input type="radio" id="will" name="will" ng-model="wfsForm.will" ng-value="n.id"  />{{n.name}}
                </label>
            </div>
        </div>
        <div class="form-group">
	    <label>Do you have a power of attorney?</label>
            <div class="radio" ng-repeat="n in wfsForm.yesno | orderBy : 'id' : reverse=true">
                <label>
                    <input type="radio" id="poa" name="poa" ng-model="wfsForm.poa" ng-value="n.id"  />{{n.name}}
                </label>
            </div>
        </div>
        <div class="form-group">
	    <label>Do you have any dependants?</label>
            <div class="radio" ng-repeat="n in wfsForm.yesno | orderBy : 'id' : reverse=true">
                <label>
                    <input type="radio" id="dependant" name="dependant" ng-model="wfsForm.dependant" ng-value="n.id"  />{{n.name}}
                </label>
            </div>
        </div>
        <div class="form-group">
	    <label>How many?</label>
            <input class="form-control" type="text" ng-model="wfsForm.depnum" ng-disabled="wfsForm.dependant === '0'" ng-="wfsForm.dependant == '1'" id="depnum" name="depnum" />
        </div>
        <div class="form-group">
            <label>Are you a smoker?</label>
            <div class="radio" ng-repeat="n in wfsForm.yesno | orderBy : 'id' : reverse=true">
                <label>
                    <input type="radio" id="smoker" name="smoker" ng-model="wfsForm.smokerl" ng-value="n.id"  />{{n.name}}
                </label>
            </div>
        </div>
	<div class="form-group">
           <label>Do you have any health issues?</label>
           <textarea class="form-control" ng-model="wfsForm.health"  rows="3"></textarea>
        </div>  
        <h1>Assets</h1>
	<div class="form-group"> 
	    <select class="form-control" ng-model="wfsForm.addAssetType" ng-options="obj.name as obj.name for obj in wfsForm.as_options" >
	        <option value="" selected disabled style="display:none">Select from the list</option>	            
	    </select>
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input class="form-control" type="text" ng-model="wfsForm.addAssetValue" />
                <span class="input-group-btn">
                    <button class="btn btn-default" ng-click="addAsset()">Add an Asset</button>
                </span>
            </div>
        </div>
            
        <table class="table table-striped">
            <thead><tr><th>Asset Type</th><th>Value</th></tr></thead>
            <tbody>
                <tr ng-repeat="asset in assets">
                    <td>{{asset.type}}</td>
                    <td>{{asset.value}}</td>
                </tr>
            </tbody>
        </table>
        
        <h1>Liabilities</h1>
        <div class="form-group">
            <select class="form-control" ng-model="wfsForm.addLiabilityType" ng-options="li.name as li.name for li in wfsForm.li_options" >
            <option value="" selected disabled style="display:none">Select from the list</option>	            
            </select>
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input class="form-control" type="text" ng-model="wfsForm.addLiabilityValue" />
                <span class="input-group-btn">
                    <button class="btn btn-default" ng-click="addLiability()">Add a Liability</button>
                </span>
            </div>
        </div>

	<table class="table table-striped">
            <thead><tr><th>Liability Type</th><th>Value</th></tr></thead>
            <tbody>
                <tr ng-repeat="liability in liabilities">   
                    <td>{{liability.type}}</td>
                    <td>{{liability.value}}</td>
                </tr>
            </tbody>
        </table>
                      
       <button type="submit" class="btn btn-primary">Submit!</button>
    </form>
<div id="messages" ng-show="message">{{ wfsForm.message }}</div> 
</div>


<script>
    angular.module("wfsApp", [])
            .controller("wfsController", function($scope, $http) {
                $scope.wfsForm = {};
                
                $scope.wfsForm.ms_options = [
                    { id : "1", name : "Never Married" },
                    { id : "2", name : "Married" },
                    { id : "3", name : "Separated" },
                    { id : "4", name : "Divorced" },
                    { id : "5", name : "Widowed" }
                ];
                
                $scope.wfsForm.as_options = [
                    { id : "1", name : "Cash" },
                    { id : "2", name : "Home" },
                    { id : "3", name : "Shares" },
                    { id : "4", name : "Term Deposit" },
                    { id : "5", name : "Managed Fund" },
                    { id : "6", name : "Superannuation Fund" },
                    { id : "7", name : "Pension / Annuity" }
                ];
                
                $scope.wfsForm.li_options = [
                    { id : "1", name : "Mortgage" },
                    { id : "2", name : "Car Loan" },
                    { id : "3", name : "Personal Loan" },
                    { id : "4", name : "Credit Card" }
                ];
                
                $scope.wfsForm.g_options = [
                    { id : "1", name : "Male" },
                    { id : "2", name : "Female" }
                ];
                
                $scope.wfsForm.yesno = [
                    { id: "0", name : "No" },
                    { id: "1", name : "Yes" }
                ];
                
                $scope.assets = [
                    {type : "Cash", value : "100" },
                    {type : "Shares", value : "500" },
                    {type : "Managed Fund", value : "1000" }
                ];

                $scope.healthissues = [
                    {type : "", value : "" }
                ];
                
                $scope.liabilities = [
                    {type : "", value : "" }
                ];
                
                
                $scope.addAsset = function() {
                    $scope.assets.push(
                        {type : $scope.wfsForm.addAssetType, value: $scope.wfsForm.addAssetValue}
                    );
                };
                
                $scope.addLiability = function() {
                    $scope.liabilities.push(
                        {type : $scope.wfsForm.addLiabilityType, value: $scope.wfsForm.addLiabilityValue}
                    );
                };
                
                $scope.addHealthIssue = function() {
                    $scope.healthissues.push(
                        {type : $scope.wfsForm.addHealthIssueType, value: $scope.wfsForm.addHealthIssueValue}
                    );
                };
                
                $scope.processForm = function() {
                    $http({
                        method: 'POST',
                        url: 'form.php',
                        data: $.param($scope.wfsForm),
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    })
                        .success(function(data) {
                            console.log(data);
                            
                            if (!data.success) {
                                $scope.errorfirstName = data.errors.firstName;
                                $scope.errorlastName = data.errors.lastName;
                            } else {
                                $scope.message = data.message;
                            }
                        });
                };
            } );
</script>
<?php include("wfsfoot.php"); ?>

