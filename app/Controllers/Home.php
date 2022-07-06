<?php

namespace App\Controllers;

use Pusher\Pusher;

class Home extends BaseController
{
    protected $pusher;

    public function __construct()
    {
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $this->pusher = new Pusher(
            getenv("pusher_appkey"), 
            getenv("pusher_appsecret"), 
            getenv("pusher_appid"),
            $options
        );
    }

    public function index()
    {
        $this->loadModel();
        $this->context['title'] = "E-Vosis Home";
        $this->context['kandidat'] = $this->kandidatModel->findAll();
        
        return $this->renderView('home');
    }

    public function indexVote() {
        helper("form");

        $this->loadModel();

        $this->context['title'] = "E-Vosis Vote";
        $this->context['kandidat'] = $this->kandidatModel->findAll();
        
        if ($this->suaraModel->where('siswaid', $this->context['siswaData']['id'])->first()) {
            $this->session->setFlashdata("warning", true);
        }
        return $this->renderView('vote');
    }

    public function saveVote() {
        helper("form");

        $this->loadModel();
        if (isset($this->context['siswaData'])) {
            if ($this->suaraModel->where('siswaid', $this->context['siswaData']['id'])) {
                $this->session->setFlashdata("warning", true);
                return redirect()->back();
            }
            $voteid = $this->request->getPost("id");
            $kandidatData = $this->kandidatModel->where("id", $voteid)->first();
            if ($kandidatData) {
                $data_post = [
                    'siswaid' => $this->context['siswaData']['id'],
                    'kandidatid' => $kandidatData['id']
                ];

                $this->suaraModel->save($data_post);
                // $this->pusher->trigger("evosis", "votetrigger", ['data' => $data_post]);
                $this->session->setFlashdata("success", "Berhasil vote");
                return redirect()->back();
            } else {
                $this->session->setFlashdata("error", "Gagal vote");
                return redirect()->back();
            }
        } else {
            $this->session->setFlashdata("error", "Maaf anda belum login");
            return redirect()->to("/auth");
        }
    }
}
