<?php
class Controller extends Application{
    
    protected $_controller,$_action;
    public $_view;
    
    public function __construct(){
        parent::__construct();
        $this->_view = new View();
    }
}