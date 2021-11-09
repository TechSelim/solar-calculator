<h3></h3>
<fieldset>
<span class="step-current"> <span class="step-current-content"><span class="step-number">
    <span><?php _e('03', 'solar-calculator'); ?></span>/<?php _e('05', 'solar-calculator'); ?></span></span> 
</span>
<div class="fieldset-flex">
    
    <div class="fieldset-content text-center">
        <h2><?php _e('System Details (Optional)', 'solar-calculator'); ?></h2>
        <p><?php _e('The information you provide here will not impact on the quotation, however it may be helpful in enabling us to assess your suitability for a SolarEdge system and to calculate the potential benefits.', 'solar-calculator'); ?></p>
        <div class="systemDetails">
            <div class="form-row justify-content-center pt-2">
                <div class="col-md-10">
                    <label for=""><?php _e('No. of elevations', 'solar-calculator'); ?></label>
                    <input type="text" name="elevation_no" class="form-control">
                    <small><?php _e('Please specify (if known) the number of elevations of panels you have installed e.g. if you have panels split across two roofs, please specify 2', 'solar-calculator'); ?></small>
                </div>
            </div>
            <div class="form-row justify-content-center pt-4">
                <div class="col-md-10">
                    <label for=""><?php _e('Date of Original Installation', 'solar-calculator'); ?></label>
                    <input type="text" name="installation_date" id="installation_date" class="form-control" >
                    <small><?php _e('The date the system was originally installed (if known).', 'solar-calculator'); ?> </small>
                </div>
            </div>
            <div class="form-row justify-content-center pt-4">
                <div class="col-md-10">
                    <label for=""><?php _e('Shading', 'solar-calculator'); ?></label>
                    <textarea name="shading" id="shading" cols="3" rows="2" class="form-control"></textarea>
                    <small><?php _e('Please describe any shading issues that effect your system. This might be from a chimney stack, trees or neighbouring buildings.', 'solar-calculator'); ?></small>
                </div>
            </div>
        </div>
    </div>
</div>
</fieldset>