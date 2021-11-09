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
            console.log('New: ' + newIndex);
            console.log('Current: ' + currentIndex);
            if( newIndex === 1 ) {
                
                var tag = false;
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

            }
            
            if( newIndex === 3 ){
                let els = document.querySelectorAll("a[href='#next']");
                els[0].style.display = 'none';
            }
            
            if( newIndex === 2 ){
                let els = document.querySelectorAll("a[href='#next']");
                els[0].style.display = 'block';
            }

            if( newIndex === 4 ){
                /* TODO */
            }
            
            return true;
        },
        onFinished: function(event, currentIndex) {
            console.log( $('#signup-form').serialize() );
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