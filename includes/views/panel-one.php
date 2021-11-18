<h3></h3>
<fieldset>
    <span class="step-current"> <span class="step-current-content"><span class="step-number">
        <span><?php _e('01', 'solar-calculator'); ?></span>/<?php _e('06', 'solar-calculator'); ?></span></span> 
    </span>
    <div class="fieldset-flex" >
        
        <div class="fieldset-content text-center">
            <h2><?php _e('Select your property type.', 'solar-calculator'); ?> </h2>
            <div class="propertyList">
                <div class="row">
                    <div class="col-md-3">
                        <div class="selectImage" data-pan="1" style="height:180px;" >
                            <img width="100" src="<?php echo SOLARC_PLUGIN_URL.'/images/one.svg'; ?>" alt="">
                            <p><?php _e('Single storey/bungalow', 'solar-calculator'); ?></p>
                        </div>
                    </div>
                    <div class="col-md-3" >
                        <div class="selectImage" data-pan="2" style="height:180px;">
                            <img width="100" src="<?php echo SOLARC_PLUGIN_URL.'/images/two.svg'; ?>" alt="">
                            <p><?php _e('Two storey house', 'solar-calculator'); ?></p>
                        </div>
                    </div>
                    <div class="col-md-3" >
                        <div class="selectImage" data-pan="3" style="height:180px;">
                            <img width="100" src="<?php echo SOLARC_PLUGIN_URL.'images/three.svg'; ?>" alt="">
                            <p><?php _e('Three storey house/townhouse', 'solar-calculator'); ?></p>
                        </div>
                    </div>
                    <div class="col-md-3" >
                        <div class="selectImage" data-pan="4" style="height:180px; padding-top: 70px;">
                            <h4><?php _e('Others', 'solar-calculator'); ?></h4>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-md-8">
                        <div id="othersArea" class="d-none"  >
                            <label for="othersArea"><?php _e('Please specify', 'solar-calculator'); ?></label>
                            <textarea name="" id="otherContent" class="form-control" cols="30" rows="3" ></textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="property_type" id="property_type"  >
                <input type="hidden" name="property_details" id="property_details"  >
            </div>
        </div>
    </div>
</fieldset>