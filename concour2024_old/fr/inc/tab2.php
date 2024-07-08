<div class="wizard-input-section">
	  <div class="form-group">
      <div class="col-sm-12">
      	<label class="control-label">Nom et prénoms <span>*</span></label>
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
      	<label class="control-label">Date de naissance <span>*</span></label>
      </div>				      
      <div class="col-sm-6">
      	<label class="control-label">Lieu de naissance <span>*</span></label>
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
      	<label class="control-label">Sexe</label>
      </div>				      
      <div class="col-sm-6">
      	<label class="control-label">Pays</label>
      </div>
      <div class="col-sm-6">          
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>			              
            <select id="civilite" class="form-control selectpicker" data-container="body" data-size="5">
	          <option>Masculin</option>
	          <option>Feminin</option>					          
	        </select>
        </div>
      </div>
      <div class="col-sm-6">          
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-globe"></i></span>			              
            <select id="pays" class="form-control selectpicker" data-container="body"  data-dropup-auto="false" data-size="4">
	          <option>Cameroun</option>
	          <option>Gabon</option>
	          <option>RCA</option>
	          <option>RDC</option>
	          <option>Guinée Equatoriale</option>
	          <option>Tchad</option>
	          <option>Autres</option>
	        </select>
        </div>
      </div>
    </div>
    <div class="form-group" id="regionDepart">
      <div class="col-sm-6">
      	<label class="control-label">Région d'origine</label>
      </div>				      
      <div class="col-sm-6">
      	<label class="control-label">Département d'origine</label>
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
      	<label class="control-label">Condition de résidence / Je vivrai : </label>
      </div>
	  <div class="col-sm-6">          
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-home"></i></span>
            <select id="residence" class="form-control selectpicker dropdown" data-container="body" data-dropup-auto="false" data-size="4">
	          <option value="famille">En famille</option>
	          <option value="location">En location (seul)</option>
	          <option value="colocation">En colocation</option>
	          <option value="autre">Autre</option>
	        </select>
        </div>
      </div>
	</div> 
</div>