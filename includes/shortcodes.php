<?php 

trait shortcodeTrait{

    function panelWrapBegin(){
        return '<div class="solaorc">
                    <div class="container">
                        <div id="feed" class="alert alert-success d-none"></div>
                        <form method="POST" id="signup-form" class="signup-form" >';
    }
    
    function panelWrapEnd(){
        return '</form>
            </div>
        </div>';
    }

    function panelOne(){
        ob_start();
        include_once 'views/panel-one.php';
        return ob_get_clean();   
    }
    
    function needIntallation(){
        ob_start();
        include_once 'views/nedd-installation.php';
        return ob_get_clean();   
    }
    
    function panelTwo(){
        ob_start();
        include_once 'views/panel-two.php';
        return ob_get_clean();
    }
    
    function panelThree(){
        ob_start();
        include_once 'views/panel-three.php';
        return ob_get_clean();
    }
    
    function panelFour(){
        ob_start();
        include_once 'views/panel-four.php';
        return ob_get_clean();
    }
    
    function panelFive(){
        ob_start();
        include_once 'views/panel-five.php';
        return ob_get_clean();
    }
    
}