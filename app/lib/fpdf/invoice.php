<?php
require('fpdf.php');

class PDF extends FPDF{
    public function header(){
        $this->setFont('arial','B','9');
        //we have 4 lines (4*5(height line))
        $yImage = 40/2;
        $this->image("http://www.shoppia.com".SROOT ."public/images/websiteImages/logo.png",10,$yImage,32);
        $this->setx(50);
        $this->cell(100,5,"   ".COMPANY_NAME,"L",2);
        $this->setFont("arial","","9");
        $this->cell(100,5,"   ".COMPANY_ADDR,"L",2);
        $this->cell(100,5,"   ".COMPANY_CITY,"L",2);
        $this->cell(100,5,"   ".COMPANY_COUNTRY,"L",2);
        $this->cell(100,5,"   ".COMPANY_PHONE,"L",2);
        $this->cell(100,5,"   ".COMPANY_EMAIL,"L",2);
        $this->ln(10);
    }
    
    public function footer(){
        $this->setY(-20);
        $this->setFont('arial','','8');
        $txt="Please feel free to contact us if you have any question about your order,Thanks. | Shoppia Store";
        $this->multicell(0,10,$txt,"T");
    }
}