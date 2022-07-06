<?php

namespace App\Filters;

use App\Models\UsersModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthAdminFilter implements FilterInterface
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $username = session()->get("username");
        $role = session()->get("role");
        if (!isset($username) || (!isset($role) && $role != "admin")) {
            session()->setFlashdata('message', 'Maaf anda belum login');
            return redirect()->to('admin/auth');
        } elseif (isset($role) && $role == "siswa") {
            session()->setFlashdata('message', 'Anda tidak diizinkan mengakses halaman ini');
            return redirect()->to('/auth');
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
