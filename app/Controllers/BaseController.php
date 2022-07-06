<?php

namespace App\Controllers;

use App\Models\KandidatModel;
use App\Models\KelasModel;
use App\Models\SettingsModel;
use App\Models\SiswaModel;
use App\Models\SuaraModel;
use App\Models\UsersModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];
    protected $context = [];

    /**
     * Load model kandidat
     *
     * @var KandidatModel
     */
    protected $kandidatModel;

    /**
     * Load model kelas
     *
     * @var KelasModel
     */
    protected $kelasModel;

    /**
     * Load model settings
     *
     * @var SettingsModel
     */
    protected $settingsModel;

    /**
     * Load model siswa
     *
     * @var SiswaModel
     */
    protected $siswaModel;

    /**
     * Load model suara
     *
     * @var SuaraModel
     */
    protected $suaraModel;

    /**
     * Load model users
     *
     * @var UsersModel
     */
    protected $usersModel;

    /**
     * Load session node
     *
     * @var session
     */
    protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->context = array();
        $this->session = \Config\Services::session();
        $this->kandidatModel = new KandidatModel();
        $this->kelasModel = new KelasModel();
        $this->settingsModel = new SettingsModel();
        $this->siswaModel = new SiswaModel();
        $this->suaraModel = new SuaraModel();
        $this->usersModel = new UsersModel();

        $this->getSiswaData();
        $this->getUserData();
    }

    public function loadModel() {
        $this->context['models'] = [
            'kandidatModel' => $this->kandidatModel,
            'kelasModel' => $this->kelasModel,
            'settingsModel' => $this->settingsModel,
            'siswaModel' => $this->siswaModel,
            'suaraModel' => $this->suaraModel
        ];
    }

    public function getSiswaData() {
        $role = session()->get("role");
        if (isset($role) && $role == "siswa") {
            $siswaModel = new SiswaModel();
            $siswaData = $siswaModel->where("nisn", session()->get("nisn"))->first();
            if ($siswaData) {
                $this->context['siswaData'] = $siswaData;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getUserData() {
        $role = session()->get("role");
        if (isset($role) && $role == "admin") {
            $userData = $this->usersModel->where("username", session()->get("username"))->first();
            if ($userData) {
                $this->context['usersData'] = $userData;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function renderView($pages) {
        echo view($pages, $this->context);
    }

    public function redirectPrev() {
        $prev = previous_url(true)->getPath();
        return redirect()->to($prev);
    }
}
