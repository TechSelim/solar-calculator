<h3></h3>
        <fieldset>
            <span class="step-current">
                <span class="step-current-content">
                    <span class="step-number">
                        <span><?php _e('05', 'solar-calculator'); ?></span>/<?php _e('/05', 'solar-calculator'); ?></span>
                    </span>
                </span>
            <div class="fieldset-flex">
                <div class="fieldset-content">
                    <h2 class="mb-4"><?php _e('Final cost including VAT (VAT typically charged at 5%)', 'solar-calculator'); ?></h2>
                    <div class="estimatedPrice mb-4">
                        <p class="p-0 m-0"><?php _e('The final estimated price is', 'solar-calculator'); ?></p>
                        <div class="price"><?php _e('£1,972.25', 'solar-calculator'); ?></div>
                    </div>
                    <section class="contactInfo">

                        <div class="form-row">     
                            <div class="col">
                                <label class="sr-only" for="email"><?php _e('Email', 'solar-calculator'); ?></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="email" >
                                </div>
                            </div>  
                            <div class="col">
                                <label class="sr-only" for="name"><?php _e('Full Name', 'solar-calculator'); ?></label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="name" >
                                </div>
                            </div> 
                        </div>

                        <div class="form-row">     
                             
                            <div class="col">
                                <label class="sr-only" for="post_code"><?php _e('Post Code', 'solar-calculator'); ?></label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-map-marker"></i></div>
                                </div>
                                <input type="text" class="form-control" id="post_code" >
                                </div>
                            </div>
                            <div class="col">
                                <label class="sr-only" for="phone"><?php _e('Telephone No.', 'solar-calculator'); ?></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="phone">
                                </div>
                            </div> 

                        </div>
                        <div class="form-row">     
                             
                            <div class="col">
                                <label class="sr-only" for="address"><?php _e('Address', 'solar-calculator'); ?></label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-home"></i></div>
                                </div>
                                <input type="text" class="form-control" id="address">
                                </div>
                                <small>
                                <?php _e('Optional - we always reply to enquiries by email and will not call under any circumstances unless you specifically request a callback.', 'solar-calculator'); ?> 
                                </small>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="message"><?php _e('Message (Optional)', 'solar-calculator'); ?> </label>
                                <textarea class="form-control" name="message" id="message" cols="3" rows="2"></textarea>
                            </div>
                        </div>


                    </section>
                    <section class="summary">
                        <h3><?php _e('Summary', 'solar-calculator'); ?></h3>
                        <div class="summaryTable">
                            <table class="table table-bordered">
                                <tr class="bg-primary text-white">
                                    <th><?php _e('Description', 'solar-calculator'); ?></th>
                                    <th><?php _e('Information', 'solar-calculator'); ?></th>
                                    <th><?php _e('Price', 'solar-calculator'); ?></th>
                                </tr>
                                <tr class="text-center bg-dark  text-white">
                                    <th colspan="3"><?php _e('No. of Panels', 'solar-calculator'); ?></th>
                                </tr>
                                <tr>
                                    <td><?php _e('Your Solar Panels', 'solar-calculator'); ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="table-dark">
                                    <th colspan="3"><?php _e('System Details (Optional)', 'solar-calculator'); ?></th>
                                </tr>
                                <tr>
                                    <td><?php _e('No. of elevations', 'solar-calculator'); ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><?php _e('Date of Original Installation', 'solar-calculator'); ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><?php _e('Shading', 'solar-calculator'); ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><?php _e('No', 'solar-calculator'); ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="table-dark">
                                    <th colspan="3"><?php _e('Location', 'solar-calculator'); ?></th>
                                </tr>
                                <tr>
                                    <td><?php _e('Your Post Code', 'solar-calculator'); ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><?php _e('Total', 'solar-calculator'); ?></td>
                                    <td class="table-secondary"><?php _e('£1,972.25', 'solar-calculator'); ?></td>
                                </tr>

                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </fieldset>