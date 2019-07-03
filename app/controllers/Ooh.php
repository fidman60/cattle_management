<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 20/03/2019
 * Time: 03:25
 */

class Ooh extends Controller {

    public function page_not_foundAction(){
        $this->_view->render('error/page_not_found');
    }

}