<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Printpdf {

	public function create_pdf($data){ //var_dump($data['template']['template']);die;
		$this->ci =& get_instance();
	    $this->ci->load->library("pdf");// set default header data
		$this->ci->pdf->setPageOrientation('L');
        $this->ci->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $this->ci->pdf->SetHeaderData('honda-logo.jpg', 15, 'Dealer Honda ', 'Jl.Cipinang No.100');
        
        // set header and footer fonts
        $this->ci->pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 8));
        $this->ci->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $this->ci->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        
        
        $this->ci->pdf->setPrintHeader(true);
        $this->ci->pdf->setPrintFooter(true);

        // set margins
        $this->ci->pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $this->ci->pdf->SetHeaderMargin(10);
        $this->ci->pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $this->ci->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // ???????????????????
        
        // set font
        $this->ci->pdf->SetFont("times", "", 11);
            
        // add a page
        $this->ci->pdf->AddPage("P","A4",false,false);
		
        //$data=array();
        $html = $this->ci->load->view($data['template']['template'],$data,true);
        
        $this->ci->pdf->writeHTML($html, true, false, true, false, '');
        $this->ci->pdf->Output($data['template']['filename'].".pdf", "I");
	}

}
