<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;


class PDFController extends Controller
{
    public function createPDF(Request $request)
    {
        // set certificate file
        $certificate = 'file://'.base_path().'/public/ecct.crt';
            $certificate1 = 'file://'.base_path().'/public/ecct.key';
// dd($certificate);
        // set additional information in the signature
        $info = array(
            'Name' => 'Websolutionstuff',
            'Location' => 'Office',
            'Reason' => 'Websolutionstuff',
            'ContactInfo' => 'http://www.websolutionstuff.com',
        );

        // set document signature
        PDF::setSignature($certificate, $certificate1, 'tcpdfdemo', '', 2, $info);

        PDF::SetFont('helvetica', '', 12);
        PDF::SetTitle('Websolutionstuff');
        PDF::AddPage();

        // print a line of text
        $text = view('tcpdf');

        // add view content
        PDF::writeHTML($text, true, 0, true, 0);

        // add image for signature
        PDF::Image('tcpdf.png', 180, 60, 15, 15, 'PNG');

        // define active area for signature appearance
        PDF::setSignatureAppearance(180, 60, 15, 15);

        // save pdf file
        PDF::Output(public_path('hello_world3.pdf'), 'F');

        PDF::reset();

        dd('pdf created');
    }
}
