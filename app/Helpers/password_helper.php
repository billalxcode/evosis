<?php

class EvosisNetworkEncrypt {
    protected $alpha_lower;
    protected $alpha_upper;
    protected $alpha_number;
    protected $alpha_symbol;

    function __construct()
    {
        $this->alpha_lower = 'abcdefghijklmnopqrstuvwxyz';
        $this->alpha_upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $this->alpha_number = '1234567890';
        $this->alpha_symbol = '!@#$%^&*()';
    }

    private function generate_string(string $data = '', int $max = 24) {
        $l = strlen($data);
        $s = '';
        for ($i = 0; $i < $max; $i++) {
            $randx = random_int(0, $l - 1);
            $s .= $data[$randx];
        }
        return $s;
    }

    private function _generate_seeds(int $maxlength = 5) {
        $seeds = $this->generate_string($this->alpha_lower . $this->alpha_symbol, $maxlength);
        return $seeds;
    }

    private function generate_password_hash(string $password) {
        $hash = hash('sha256', $password);
        return $hash;
    }

    private function get_hash_from_data(string $data) {
        $hash_length_split = explode('|', $data);
        if (count($hash_length_split) == 2) {
            $offset = strlen($hash_length_split[0]) - $hash_length_split[1];
            $hash_string = substr($hash_length_split[0], $offset, strlen($hash_length_split[0]));
            return $hash_string;
        } else {
            return false;
        }
    }

    private function clear_seed(string $data, string $hash) {
        $offset_limit = strlen($data) - strlen($hash);
        $substring = substr($data, 0, $offset_limit - (5 + 3));
        return strrev($substring);
    }

    public function generate(string $data, string $password) {
        $password_hash = $this->generate_password_hash($password);
        $seeds = $this->_generate_seeds(5);
        $equals_num = '';
        $data_encrypted = base64_encode($data);
        $data_binnary = bin2hex($data_encrypted);
        $data_reversed = strrev($data_binnary) . $seeds . $password_hash . '|' . strlen($password_hash);

        return 'evosis:' . $data_reversed;
    }

    public function verify(string $data, string $password) {
        $data_removed = explode('evosis:', $data);
        if (count($data_removed) == 2) {
            $data_removed_string = $data_removed[2 - 1];
            $hash_string = $this->get_hash_from_data($data_removed_string);
            if ($this->generate_password_hash($password) == $hash_string) {
                $data_clear_string = $this->clear_seed($data_removed_string, $hash_string);
                $data_binnary = hex2bin($data_clear_string);
                $data_base64 = base64_decode($data_binnary);
                return $data_base64;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}