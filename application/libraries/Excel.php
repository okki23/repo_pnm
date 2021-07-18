<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 *  =======================================
 *  Author     : Muhammad Surya Ihsanuddin
 *  License    : Protected
 *  Email      : surya.kejawen@gmail.com 
 *
 *  Dilarang merubah, mengganti dan mendistribusikan
 *  ulang tanpa sepengetahuan Author
 *  =======================================
 */

require_once APPPATH . "/third_party/phpexcel/PHPExcel.php";

class Excel extends PHPExcel {

    public function __construct() {
        parent::__construct();
    }

}
