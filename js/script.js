;(function($) {
    
    /* click on switch */
    $('.btn-switch__radio_yes').on('click', function(e){
        
        var selectedEl = $(this).val();
        $('#panel_no').val( selectedEl );

        $(".btn-switch__radio_yes").each(function( i, el ){
            el.checked = false;
        });
        
        $(".btn-switch__radio_no").each(function( i, el ){
            el.checked = true;
        });

        $(".btn-switch__radio_yes").each(function( i, el ){
            if(selectedEl == el.value){
                el.checked = true;
            }
        });
        
        setTimeout(function(){
            var els = document.querySelectorAll("a[href='#next']");
            if( els[0] ){
                els[0].style.display = 'block';
                els[0].click();
            }
        }, 300);

    })
    
    $('.btn-switch__radio_no').on('click', function(e){
        var tag = false;
        $('#panel_no').val( e.value );

        $(".btn-switch__radio_yes").each(function( i, el ){
            if(el.checked){
                tag = true;
            }
        });

        if(tag){
            let els = document.querySelectorAll("a[href='#next']");
            els[0].style.display = 'block';
        }else{
            let els = document.querySelectorAll("a[href='#next']");
            els[0].style.display = 'none';
        }  
    })

    $('.selectImage').on("click", function(e){
        
        e.preventDefault();   
        
        // Remove active class
        var list;
        list = document.querySelectorAll(".selectImage");
        for (var i = 0; i < list.length; ++i) {
            list[i].classList.remove('active');
        }

        // add active class
        if( !$(this).hasClass('active') ){
            $(this).addClass('active');
        }
        
        $('#property_type').val( $(this).data('pan') );

        if( $(this).data('pan') == 1 ){
            $('#property_details').val("Single storey/bungalow");
        }else if( $(this).data('pan') == 2 ){
            $('#property_details').val('Two storey house');
        }else if( $(this).data('pan') == 3 ){
            $('#property_details').val('Three storey house/townhouse');
        }else if( $(this).data('pan') == 4 ){
            $('#property_details').val( "Others" );
        }

        if( $(this).data('pan') == 4){
            $('#othersArea').removeClass('d-none');
        }else{
            $('#othersArea').addClass('d-none');
        }

        // Visible button
        var els = document.querySelectorAll("a[href='#next']");
        if(els[0]){
            els[0].style.display = 'block';
        }

    });

    // Change Value by textarea
    $('#otherContent').on('keyup', function(e){
        e.preventDefault();
        $('#property_details').val( $(this).val() );
    })

    // Post code checker
    $('#postcode').on('keyup', function(e){
        e.preventDefault();
        var code = $(this).val();
        $.ajax({
            url: "https://api.postcodes.io/postcodes/" + code,
            type: 'GET',
            dataType: 'json', 
            success: function(res) {

                let elFeed = $('#postcodefeed');
                if( res.status == '200' ){

                    if( elFeed.hasClass('text-danger') ){
                        elFeed.removeClass('text-danger');
                    }
                    if( !elFeed.hasClass('text-success') ){
                        elFeed.addClass('text-success');
                    }
                    elFeed.html('Great! Valid code.');
                    let els = document.querySelectorAll("a[href='#next']");
                    if(els[0]) els[0].style.display = 'block';
                }else{
                    
                    if( !elFeed.hasClass('text-danger') ){
                        elFeed.addClass('text-danger');
                    }
                    
                    if( elFeed.hasClass('text-success') ){
                        elFeed.removeClass('text-success');
                    }

                    let els = document.querySelectorAll("a[href='#next']");
                    if(els[0]) els[0].style.display = 'none';

                    elFeed.html('Invalid Postcode.');
                }
            },
            error: function(error){
                let elFeed = $('#postcodefeed');
                if( !elFeed.hasClass('text-danger') ){
                    elFeed.addClass('text-danger');
                }
                
                if( elFeed.hasClass('text-success') ){
                    elFeed.removeClass('text-success');
                }
                elFeed.html('Invalid Postcode.');
                let els = document.querySelectorAll("a[href='#next']");
                    if(els[0]) els[0].style.display = 'none';
            }
        });
    })

    $('#installation_date').datepicker( {
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
        startDate: '+0d',
    } );

})(jQuery);