<?php
    // ---------------------------------------------
    // Wiseman Financial Services
    // Online Financial Advice Service
    // User input form
    // Author: Glenn Harris (glenn.harris@gmail.com)
    // Repository: http://github.com/glennharris/wfs
    // ----------------------------------------------
    
    include('wfshead.php');	
?>

<div id="page_content" class="editable" ng-controller="wfsController" style="max-width: 626px;">
<h1>Personal Details</h1>
    <form role="form" ng-submit="processForm()" novalidate>
        <div class="form-group">
            <label>First Name</label>
            <input class="form-control" type="text" name="fname" ng-model="wfsForm.fname" required>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input class="form-control" type="text" name="lname" ng-model="wfsForm.lname" required>
        </div>
        <div class="form-group">
            <div id="locationField">
		<label>Address</label>
                <input class="form-control" id="autocomplete" onFocus="geolocate()" type="text" />
            </div>
        </div>
	    <div class="form-group" style="display:block;">
	        <input class="form-control" type="text" name="subpremise" id="subpremise" ng-model="wfsForm.unum" />
	        <input class="form-control" type="text" name="street_number" id="street_number" ng-model="wfsForm.snum" />
            <input class="form-control" type="text" name="route" id="route" ng-model="wfsForm.sname" />
            <input class="form-control" type="text" name="locality" id="locality" ng-model="wfsForm.suburb"/>
	        <input class="form-control" type="text" name="administrative_area_level_1" id="administrative_area_level_1" ng-model="wfsForm.state" />
            <input class="form-control" type="text" name="postal_code" id="postal_code" ng-model="wfsForm.pcode" />
            <input class="form-control" type="text" name="country" id="country" ng-model="wfsForm.country" />
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
                    <input id="gender" type="radio" ng-model="wfsForm.gender" ng-value="n.id"  />{{n.name}}
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
            <input class="form-control" type="text" ng-model="wfsForm.jobtitle" ng-disabled="employed == '0'" ng-="employed == '1'" id="jobtitle" name="jobtitle" />
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
            <input class="form-control" type="text" ng-model="wfsForm.depnum" ng-disabled="dependant === '0'" ng-="dependant == '1'" id="depnum" name="depnum" />
        </div>
        <div class="form-group">
            <label>Are you a smoker?</label>
            <div class="radio" ng-repeat="n in wfsForm.yesno | orderBy : 'id' : reverse=true">
                <label>
                    <input type="radio" id="smoker" name="smoker" ng-model="wfsForm.smoker" ng-value="n.id"  />{{n.name}}
                </label>
            </div>
        </div>
	<div class="form-group">
           <label>Do you have any health issues?</label>
           <textarea class="form-control" ng-model="wfsForm.healthissue" rows="3"></textarea>
        </div>  
        <h1>Assets</h1>
	<div class="form-group"> 
	    <select class="form-control" ng-model="addAssetType" ng-options="as.name as as.name for as in as_options" >
	        <option value="" selected disabled style="display:none">Select from the list</option>	            
	    </select>
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input class="form-control" type="text" ng-model="wfsForm.addAssetValue" />
                <span class="input-group-btn">
                    <button class="btn btn-default" ng-click="wfsForm.addAsset()" ng-disabled="wfsForm.addAssetType.$invalid">Add an Asset</button>
                </span>
            </div>
        </div>
        <div class="table">   
        <table class="table table-striped">
            <thead><tr><th>Asset Type</th><th>Value</th></tr></thead>
            <tbody>
                <tr ng-repeat="asset in assets">
                    <td>{{asset.type}}</td>
                    <td>{{asset.value | currency}}</td>
                </tr>
            </tbody>
        </table>
        </div>
        <h1>Liabilities</h1>
        <div class="form-group">
            <select class="form-control" ng-model="wfsForm.addLiabilityType" ng-options="li.name as li.name for li in li_options" >
            <option value="" selected disabled style="display:none">Select from the list</option>	            
            </select>
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input class="form-control" type="text" ng-model="wfsForm.addLiabilityValue" />
                <span class="input-group-btn">
                    <button class="btn btn-default" ng-click="wfsForm.addLiability()">Add a Liability</button>
                </span>
            </div>
        </div>
    <div class="table">  
	<table class="table table-striped" >
            <thead><tr><th>Liability Type</th><th>Value</th></tr></thead>
            <tbody>
                <tr ng-repeat="liability in wfsForm.liabilities">   
                    <td>{{liability.type}}</td>
                    <td>{{liability.value | currency}}</td>
                </tr>
            </tbody>
        </table>
      </div>                
       <button type="submit" class="btn btn-default btn-block" >Submit!</button>
    </form>
    <div id="messages" class="form-group" ng-show="message">{{ message }}</div> 
</div>


<script>
    var wfsApp = angular.module("wfsApp", []);
            
    wfsApp.controller("wfsController", function($scope, $http) {
                $scope.wfsForm = {};
                
                $scope.wfsForm.ms_options = [
                    { id : "1", name : "Never Married" },
                    { id : "2", name : "Married" },
                    { id : "3", name : "Separated" },
                    { id : "4", name : "Divorced" },
                    { id : "5", name : "Widowed" }
                ];
                
                $scope.as_options = [
                    { id : "1", name : "Cash" },
                    { id : "2", name : "Home" },
                    { id : "3", name : "Shares" },
                    { id : "4", name : "Term Deposit" },
                    { id : "5", name : "Managed Fund" },
                    { id : "6", name : "Superannuation Fund" },
                    { id : "7", name : "Pension / Annuity" }
                ];
                
                $scope.li_options = [
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

                $scope.wfsForm.healthissues = [
                    {type : "", value : "" }
                ];
                
                $scope.wfsForm.liabilities = [
                    {type : "", value : "" }
                ];
                
                
                $scope.wfsForm.addAsset = function() {
                    $scope.wfsForm.assets.push(
                        {type : $scope.wfsForm.addAssetType, value: $scope.wfsForm.addAssetValue}
                    );
                };
                
                $scope.wfsForm.addLiability = function() {
                    $scope.wfsForm.liabilities.push(
                        {type : $scope.wfsForm.addLiabilityType, value: $scope.wfsForm.addLiabilityValue}
                    );
                };
                
                $scope.errors = [];
                $scope.msgs = [];
                
                $scope.processForm = function() {
                    $scope.errors.splice(0, $scope.errors.length);
                    $scope.msgs.splice(0, $scope.msgs.length);
                    
                    $http.post('form.php', 
                    {
                        'fname': $scope.wfsForm.fname, 
                        'lname': $scope.wfsForm.lname,
                        'unum': $scope.wfsForm.unum,
                        'snum': $scope.wfsForm.snum,
                        'sname': $scope.wfsForm.sname,
                        'suburb': $scope.wfsForm.suburb,
                        'pcode': $scope.wfsForm.pcode,
                        'state': $scope.wfsForm.state,
                        'country': $scope.wfsForm.country,
                        'email': $scope.wfsForm.email,
                        'phone': $scope.wfsForm.phone,
                        'dob': $scope.wfsForm.dob,
                        'gender': $scope.wfsForm.gender,
                        'mstatus': $scope.wfsForm.mstatus,
                        'employed': $scope.wfsForm.employed,
                        'jobtitle': $scope.wfsForm.jobtitle,
                        'will': $scope.wfsForm.will,
                        'poa': $scope.wfsForm.poa,
                        'dependant': $scope.wfsForm.dependant,
                        'depnum': $scope.wfsForm.depnum,
                        'smoker': $scope.wfsForm.smoker,
                        'healthissue': $scope.wfsForm.healthissue   
                    }
                    ).success(function(data, status, headers, config){
                        if(data.msg != '') {
                            $scope.msgs.push(data.msg);
                        } else {
                            $scope.errors.push(data.error);
                        }
                     }).error(function(data, status) {
                        $scope.errors.push(status);
                     });
            }
           });
</script>
<?php include("wfsfoot.php"); ?>

