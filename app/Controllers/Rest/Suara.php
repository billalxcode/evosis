<?php

namespace App\Controllers\Rest;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class Suara extends BaseController
{
    public function getall()
    {
        $this->context['error'] = false;
        
        $results = [];
        $suaraData = $this->suaraModel->findAll();
        foreach ($suaraData as $suara) {
            $temp = [];
            $temp['siswa'] = $this->siswaModel->where("id", $suara['siswaid'])->first();
            
            $kandidatData = $this->kandidatModel->where("id", $suara['kandidatid'])->first();
            $ketuaData = $this->siswaModel->where('id', $kandidatData['ketuaid'])->first();
            $wakilData = $this->siswaModel->where('id', $kandidatData['wakilid'])->first();
            $temp['kandidat'] = [
                'ketua' => $ketuaData,
                'wakil' => $wakilData,
                'norut' => $kandidatData['norut']
            ];

            $waktu = new Time($suara['created_at'], 'Asia/Jakarta');
            $temp['created_at'] = $waktu->humanize();
            array_push($results, $temp);
        }

        $this->context['data'] = $results;
        return $this->response->setJSON($this->context);
    }

    public function getChart() {
        $this->context['error'] = false;
        
        $suaraData = $this->suaraModel->db->query("SELECT created_at as y_date, HOUR(created_at) as waktu, COUNT(id) as count  FROM suara GROUP BY HOUR(created_at) ORDER BY (y_date) ASC");
        $record = $suaraData->getResult();
        $data = [];

        foreach ($record as $row) {
            $data['label'][] = $row->waktu;
            $data['data'][] = intval($row->count);
        }
        $this->context['data'] = $data;
        return $this->response->setJSON($this->context);
    }
}
