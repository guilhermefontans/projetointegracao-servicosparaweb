<?php

namespace Integrador\Controller;

use Integrador\Controller\Controller;
use Integrador\Model\PalestrasAssistidasDao;
use Silex\Application;

/**
 * Class PalestrasAssistidasController
 *
 * @category
 * @package  Controller
 * @author   Guilherme Fontans <guilherme.fontans@gmail.com>
 */
class PalestrasAssistidasController extends Controller
{
    public function byId(Application $app, $ra)
    {
        $dao = new PalestrasAssistidasDao();
        $palestras_assistidas = $dao->getLectureList($ra);
        $xml = parent::encodeXmlCollection($palestras_assistidas, 'PalestrasAssistidas');
        return parent::sendResponse(
            $xml,
            200
        );
    }
}
