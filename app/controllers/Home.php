<?php
class Home extends Controller{

    public function indexAction(){
        return (new Bovins())->getAction("all","all");
    }

}