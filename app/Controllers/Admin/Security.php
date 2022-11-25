<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use EvosisNetworkEncrypt;

class Security extends BaseController
{
    public function index()
    {
        helper('password_helper');
        $this->set_context('password_encrypt', [
            [
                'text' => 'Base64 (Bad / Not Recommended)',
                'value' => 'base64',
                'select' => false
            ], [
                'text' => 'MD5 Hash Encrypt (Normal)',
                'value' => 'md5',
                'select' => false
            ], [
                'text' => 'BCrypt (Good / Recommended)',
                'value' => 'bcrypt',
                'select' => true
            ], [
                'text' => 'SHA1 Hash Encrypt (Normal)',
                'value' => 'sha1',
                'select' => false
            ], [
                'text' => 'SHA256 Hash Encrypt (Good)',
                'value' => 'sha256',
                'select' => false
            ], [
                'text' => 'Openssl Password Encrypt (No Implemented)',
                'value' => 'openssl',
                'select' => false
            ]
        ]);
        $this->set_context('network_encrypt', [
            [
                'text' => 'OpenSSL Network Encrypt (Good)',
                'value' => 'openssl',
                'select' => false
            ], [
                'text' => 'EVOSIS Network Encrypt (Super Good)',
                'value' => 'evosis_network_encrypt',
                'select' => false
            ]
        ]);

        $password = new EvosisNetworkEncrypt();
        $data = $password->generate('Enkripsi ini dibuat bernama Evosis Network Encrypt yang dibuat untuk melindungi data pada jaringan evosis. Program ini dibuat untuk ekosistem evosis.', '1234');
        $data_decrypted = $password->verify($data, '1234');
        dd([
            'text' => 'Enkripsi ini dibuat bernama Evosis Network Encrypt yang dibuat untuk melindungi data pada jaringan evosis. Program ini dibuat untuk ekosistem evosis.',
            'encrypted' => $data,
            'result' => $data_decrypted 
        ]);
        return $this->render('admin/security/manage');
    }
}
