;(function($) {

    setTimeout(function(){ 
        var els = document.querySelectorAll("a[href='#next']");
        if( els[0] != undefined ){
            els[0].style.display = 'none';
        }
     }, 100);

    var form = $("#signup-form");

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous: 'Prev',
            next: 'Next',
            finish: 'Send your Enquiry',
            current: ''
        },
        titleTemplate: '<h3 class="title">#title#</h3>',
        onStepChanging: function (event, currentIndex, newIndex)
        {
            if(currentIndex === 0) {

                form.find('.content .body .step-current-content').find('.step-inner').removeClass('.step-inner-0');
                form.find('.content .body .step-current-content').find('.step-inner').removeClass('.step-inner-1');
                form.find('.content .body .step-current-content').append('<span class="step-inner step-inner-' + currentIndex + '"></span>');
            }

            if( newIndex === 4 ){
                let els = document.querySelectorAll("a[href='#next']");
                els[0].style.display = 'none';
            }
            
            if( newIndex === 1 ){
                let els = document.querySelectorAll("a[href='#next']");
                els[0].style.display = 'none';
            }

            if( newIndex === 5 ){
                
                var panelprice = 0;
                /* TODO */
                var property_type       = $('#property_type').val();
                var property_details    = $('#property_details').val();
                var panel_no            = $('#panel_no').val();
                var elevation_no        = $('#elevation_no').val();
                var installation_date   = $('#installation_date').val();
                var shading             = $('#shading').val();
                var postcode            = $('#postcode').val();
                var installation        = $('#installation').val();

                var totalCost           = 0;
                var inverterPrice       = 0;
                var installationPrice   = 400;

                if( $('#installation:checked').length > 0 ){
                    installationPrice = 0;
                }
                
                if( panel_no >= 1 && panel_no <= 5 ){
                    
                    totalCost       = 997 + installationPrice;
                    panelprice      = 997;
                    inverterPrice   = 0;

                }else if( panel_no >= 6 && panel_no <= 8 ){

                    totalCost       = ( ( parseInt( panel_no ) ) * 95 ) + 1155 + installationPrice;
                    panelprice      = ( parseInt( panel_no ) ) * 95;
                    inverterPrice   = 1155;


                }else if( panel_no >= 9 && panel_no <= 12 ){
                    
                    totalCost       = ( ( parseInt( panel_no ) ) * 95 ) + 1260 + installationPrice;
                    panelprice      = ( parseInt( panel_no ) ) * 95;
                    inverterPrice   = 1260;

                }else if( panel_no >= 13 && panel_no <= 15 ){
                    
                    totalCost       = ( ( parseInt( panel_no ) ) * 95 ) + 1365 + installationPrice;
                    panelprice      = ( parseInt( panel_no ) ) * 95;
                    inverterPrice   = 1365;
                    
                }else if( panel_no >= 16 && panel_no <= 18 ){
                    
                    totalCost       = ( ( parseInt( panel_no ) ) * 95 ) + 1449 + installationPrice;
                    panelprice      = ( parseInt( panel_no ) ) * 95;
                    inverterPrice   = 1449;
                    
                }

                $('#tbl-total-property').html( property_details );
                $('#tbl-elevation').html( elevation_no );
                $('#tbl-installation-date').html( installation_date );
                $('#tbl-shading').html( shading );
                $('#tbl-postcode').html( postcode );
                $('#tbl-total-panel').html( panel_no );

                $('#tbl-total-panel-price').html( panelprice );
                $('#tbl-inverter-price').html( inverterPrice );
                $('#tbl-installation-price').html( installationPrice );

                $('#total-price').html('£' + totalCost );
                $('#tbl-total').html('£' + totalCost );

            }
            
            return true;
        },
        onFinished: function(event, currentIndex) {
            
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            if( name && email && phone ){

                var data = $('#signup-form').serialize();
                
                $.post( solarc.ajaxurl, data, function( response ) {
                    alert('Data Submited successfully!');
                    location.reload();
                }).fail( function() {
                    alert('request fail');
                });
            }else {
                alert('Please fill all required fields. Name, Email, Phone');
            }

            
        }
    });

    $(".toggle-password").on('click', function() {

        $(this).toggleClass("zmdi-eye zmdi-eye-off");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

})(jQuery);