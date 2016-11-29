<?php

namespace Integrador\Controller;

use Integrador\Controller\Controller;
use Integrador\Model\SalaDao;
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SalaController
 *
 * @category
 * @package  Controller
 * @author   Guilherme Fontans <guilherme.fontans@gmail.com>
 */
class SalaController extends Controller
{
    public function all(Application $app)
    {
        $dao = new SalaDao();
        $salas = $dao->find();
        return new Response(
            parent::encodeXml($salas, 'Sala'),
            200,
            array(
                'Content-Type' => 'application/xml'
            )
        );
    }
}
