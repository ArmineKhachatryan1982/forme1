<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function certificateRSA(){
        $dn = array(
            "countryName" => "GB",
            "stateOrProvinceName" => "Somerset",
            "localityName" => "Glastonbury",
            "organizationName" => "The Brain Room Limited",
            "organizationalUnitName" => "PHP Documentation Team",
            "commonName" => "Wez Furlong",
            "emailAddress" => "wez@example.com"
        );
        // Generate a new private (and public) key pair
        $privkey = openssl_pkey_new(array(
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ));

        // Generate a certificate signing request
        $csr = openssl_csr_new($dn, $privkey, array('digest_alg' => 'sha256'));
        // Generate a self-signed cert, valid for 365 days
        $x509 = openssl_csr_sign($csr, null, $privkey, $days=365, array('digest_alg' => 'sha256'));

        // Save your private key, CSR and self-signed cert for later use
        openssl_csr_export($csr, $csrout) and var_dump($csrout);
        openssl_x509_export($x509, $certout) and var_dump($certout);
        openssl_pkey_export($privkey, $pkeyout, "mypassword") and var_dump($pkeyout);

        // Show any errors that occurred here
        while (($e = openssl_error_string()) !== false) {
            echo $e . "\n";
        }


    }
    public function certificateEC(){
        $dn = array(
            "countryName" => "GB",
            "stateOrProvinceName" => "Somerset",
            "localityName" => "Glastonbury",
            "organizationName" => "Cadatre",
            "organizationalUnitName" => "PHP Documentation Team",
            "commonName" => "Wez Furlong",
            "emailAddress" => "wez@example.com"
        );
        // Generate a new private (and public) key pair
        $privkey = openssl_pkey_new(array(
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ));
        // Generate a certificate signing request
        $csr = openssl_csr_new($dn, $privkey, array('digest_alg' => 'sha256'));

        // Generate a self-signed cert, valid for 365 days
        $x509 = openssl_csr_sign($csr, null, $privkey, $days=365, array('digest_alg' => 'sha256'));
        openssl_x509_export_to_file($x509, 'ecct.crt');
        openssl_pkey_export_to_file($privkey, 'ecct.key');
    }
    public function getFile(){
        // $file = Storage::path('hello_world3.pdf');
        // $contents = storage_path('app/hello_world3.pdf');
        // $contents = Storage::path('app/hello_world3.pdf')->getClientOriginalExtension();
        // $contents=public_path('hello_world3.pdf');
       dd($contents);
    }

}
