<?php

namespace Integrador\Controller;

use Integrador\Controller\Controller;
use Integrador\Model\SalaDao;
use Silex\Application;

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
        $xml = parent::encodeXmlCollection($salas, 'Sala');
        return parent::sendResponse(
            $xml,
            200
        );
    }

    public function byId(Application $app, $codigo)
    {
        $dao = new SalaDao();
        $sala = $dao->byId('Id_Sala', $codigo);
        $xml = parent::encodeXmlObject($sala, 'Sala');
        return parent::sendResponse(
            $xml,
            200
        );
    }

    public function add(Application $app, $codigo, $descricao, $adaptada)
    {
        $dao = new SalaDao();
        $sala = $dao->insert(
            array(
                'Id_Sala' => $codigo,
                'Descricao' => $descricao,
                'Adaptada' => $adaptada
            )
        );
        return parent::sendResponse('Sala Adicionada', 200);
        return parent::sendResponse('Sala Apagada', 200);
        return parent::sendResponse(
            parent::getMessageInXml(
                "Sala",
                "Sala Adicionada"
            ),
            200
        );
    }

    public function update(Application $app, $codigo, $descricao, $adaptada)
    {
        $dao = new SalaDao();
        $sala = $dao->update(
            array(
                'Id_Sala',
                '=',
                $codigo
            ),
            array(
                'Descricao' => $descricao,
                'Adaptada' => $adaptada
            )
        );
        return parent::sendResponse(
            parent::getMessageInXml(
                "Sala",
                "Sala Alterada"
            ),
            200
        );
    }

    public function delete(Application $app, $codigo)
    {
        $dao = new SalaDao();
        $sala = $dao->delete(
            array(
                'Id_Sala',
                '=',
                $codigo
            )
        );
        return parent::sendResponse(
            parent::getMessageInXml(
                "Sala",
                "Sala Apagada"
            ),
            200
        );
    }
}
