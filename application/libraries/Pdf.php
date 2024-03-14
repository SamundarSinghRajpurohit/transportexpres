<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
require_once(APPPATH . 'libraries/dompdf/autoload.inc.php');
class Pdf {
    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
    }

    public function generate($html, $filename='', $stream=TRUE) {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();
        
        if ($stream) {
            $dompdf->stream($filename . '.pdf', array('Attachment' => 0));
        } else {
            return $dompdf->output();
        }
    }
}