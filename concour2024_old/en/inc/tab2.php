<div class="wizard-input-section">
	  <div class="form-group">
      <div class="col-sm-12">
      	<label class="control-label">First name and surmames<span>*</span></label>
      </div>
      <div class="col-sm-12">				      	
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" autocomplete="off" id="name" class="form-control" >
        </div>
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-sm-6">
      	<label class="control-label">Date of Birth <span>*</span></label>
      </div>				      
      <div class="col-sm-6">
      	<label class="control-label">Place of Birth <span>*</span></label>
      </div>
      <div class="col-sm-6">          
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input type="datable" id="date_n" value="11/02/1987" data-datable="ddmmyyyy" data-datable-divider="/" class="form-control datecheck check" >
        </div>
      </div>
      <div class="col-sm-6">          
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input type="text" id="lieu_n" autocomplete="off" class="form-control" >
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
      	<label class="control-label">Sex</label>
      </div>				      
      <div class="col-sm-6">
      	<label class="control-label">Country (Nationality)</label>
      </div>
      <div class="col-sm-6">          
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>			              
            <select id="civilite" class="form-control selectpicker" data-container="body" data-size="5">
	          <option>Male</option>
	          <option>Female</option>					          
	        </select>
        </div>
      </div>
      <div class="col-sm-6">          
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-globe"></i></span>			              
            <select id="pays" class="form-control selectpicker" data-container="body"  data-dropup-auto="false" data-size="4">
	          <option>Cameroon</option>
	          <option>Gabon</option>
	          <option>RCA</option>
	          <option>RDC</option>
	          <option>Guinée Equatoriale</option>
	          <option>Tchad</option>
	          <option>Others</option>
	        </select>
        </div>
      </div>
    </div>
    <div class="form-group" id="regionDepart">
      <div class="col-sm-6">
      	<label class="control-label">Region of origine</label>
      </div>				      
      <div class="col-sm-6">
      	<label class="control-label">Division of origine</label>
      </div>
      
      <div class="col-sm-6">          
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
            <select id="region" class="form-control selectpicker dropdown" data-container="body" data-dropup-auto="false" data-size="4">
	          <option value="litt">Littoral</option>
	          <option value="cent">Centre</option>
	          <option value="oues">Ouest</option>
	          <option value="n_ou">Nord-Ouest</option>
	          <option value="sud">Sud</option>
	          <option value="est">Est</option>
	          <option value="s_ou">Sud-Ouest</option>					          
	          <option value="adam">Adamaoua</option>
	          <option value="e_nor">Extrême-Nord</option>
	          <option value="nord">Nord</option>
	          <option value="Etranger">Etranger</option>
            </select>
        </div>
      </div>
      <div class="col-sm-6">          
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
            <select id="departement" class="form-control selectpicker" data-dropup-auto="false" data-container="body" data-size="4"></select>
        </div>
      </div>
    </div>
	<div class="form-group">
      <div class="col-sm-12">
      	<label class="control-label">Residential status / I will be living : </label>
      </div>
	  <div class="col-sm-6">          
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-home"></i></span>
            <select id="residence" class="form-control selectpicker dropdown" data-container="body" data-dropup-auto="false" data-size="4">
	          <option value="famille">In the familly</option>
	          <option value="location">In rent</option>
	          <option value="colocation">In roommate</option>
	          <option value="autre">Other</option>
	        </select>
        </div>
      </div>
	</div>  
</div>