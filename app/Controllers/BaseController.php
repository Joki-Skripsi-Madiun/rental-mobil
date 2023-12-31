<?php

namespace App\Controllers;

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
    protected $helpers = ['form', 'auth'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        session();
        $this->datamerkModel = new \App\Models\DataMerkModel();
        $this->datamobilModel = new \App\Models\DataMobilModel();
        $this->datapemesanModel = new \App\Models\DataPemesanModel();
        $this->databayarModel = new \App\Models\DataBayarModel();
        $this->datapengeluaranModel = new \App\Models\DataPengeluaranModel();
        $this->dataperjalananModel = new \App\Models\DataPerjalananModel();
        $this->datapesananModel = new \App\Models\DataPesananModel();
        $this->datagrubModel = new \App\Models\GrubModel();
        $this->dataakunModel = new \App\Models\AkunModel();
        helper('tgl_indo');
        $this->groups = new \Myth\Auth\Models\GroupModel();
    }
}
