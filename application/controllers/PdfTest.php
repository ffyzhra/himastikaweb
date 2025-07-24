<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class PdfTest extends CI_Controller {

    public function index() {
        // Buat instance Dompdf
        $dompdf = new Dompdf();
        $html = "<h1>Test PDF Dompdf Berhasil!</h1>";
        $dompdf->loadHtml($html);

        // Atur ukuran dan orientasi
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output PDF ke browser
        $dompdf->stream("test.pdf", array("Attachment" => false));
    }
}