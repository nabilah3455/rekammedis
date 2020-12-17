<?php

defined('BASEPATH') or exit('No direct script access allowed');


use Dompdf\Dompdf;
use Dompdf\Options;


class Pdfgenerator
{
  public function generate($html, $filename = '', $stream = TRUE, $paper = 'Letter', $orientation = "portrait")
  {
    $options = new Options();
    $dompdf = new DOMPDF($options);
    $dompdf->load_html($html);
    $dompdf->set_paper($paper, $orientation);
    //$options->set('isHtml5ParserEnabled', true);
    $options->setIsRemoteEnabled(true);
    $dompdf->render();
    if ($stream) {
      $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
    } else {
      return $dompdf->output();
    }
  }
}
