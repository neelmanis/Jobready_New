<?php 
include('header.php');  
?>
<form class="form-horizontal" _lpchecked="1">
    <div class="control-group">
        <label class="control-label" for="mDrugAmount">Amount </label>
        <div class="controls">
            <input class="input-mini" data-bind="value: Dose" type="text">
            <select class="input-mini"><option value="">  </option><option value="">mg</option><option value="">mL</option></select>
            <select class="input-mini"><option value="">  </option><option value="">IM</option><option value="">IV</option><option value="">subcut</option></select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="mDrugFrequency">Frequency </label>
        <div class="controls" class="input-xlarge">
            <select><option value="">  </option><option value="">4 hourly</option><option value="">6 hourly</option><option value="">8 hourly</option><option value="">alto die</option><option value="">bd</option><option value="">bd</option><option value="">daily</option><option value="">infusion</option><option value="">mane</option><option value="">nocte</option><option value="">qid</option><option value="">tds</option><option value="">weekly</option></select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="mCommenceDate">Commence </label>
        <div class="controls">
            <input type="text" class="input-xlarge" >
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="mPrescriptionDate">Until </label>
        <div class="controls">
            <input type="text" value="" class="input-xlarge">
        </div>
    </div>
	
	<div class="control-group">
        <label class="control-label" for="mCommenceDate" >Commence </label>
        <div class="controls">
            <input type="text" > &nbsp;
			Commence &nbsp; <input type="text" value="">
        </div>		
    </div>
	<div class="control-group">
        <label class="control-label" for="mCommenceDate">Commence </label>
        <div class="controls">
            <input type="text" > &nbsp;
			Commence &nbsp; <input type="text" value="">
        </div>		
    </div>
	<div class="control-group">
        <label class="control-label" for="mDrugFrequency">Frequency </label>
        <div class="controls">
            <select><option value="">  </option><option value="">4 hourly</option><option value="">6 hourly</option><option value="">8 hourly</option><option value="">alto die</option><option value="">bd</option><option value="">bd</option><option value="">daily</option><option value="">infusion</option><option value="">mane</option><option value="">nocte</option><option value="">qid</option><option value="">tds</option><option value="">weekly</option></select> &nbsp;
			
			Commence &nbsp; <input type="text" value="">
        </div>
    </div>
	

        <div class="control-group  ">
            <label class="control-label large" for="searchInput">Label text:</label>
            <div class="controls search">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-search"></i></span>
                    <input type="text" id="searchInput" />
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    <div class="control-group submit-row">
        <div class="control-label">
            <a href="#" class="btn" data-dismiss="modal" aria-hidden="true" data-bind="    click: $parent.changePrescription">Submit</a>
        </div>
        <div class="control-label">
            <a href="#" class="btn" data-dismiss="modal" aria-hidden="true" data-bind="click: $parent.ceasePrescription">Cease</a>
        </div>

        <div class="control">
        </div>
    </div>
</form>

