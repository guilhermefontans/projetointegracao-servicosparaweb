<?php

namespace Integrador\Controller;

use Integrador\Controller\Controller;
use Integrador\Model\RecursoDao;
use Silex\Application;

/**
 * Class RecursoController
 *
 * @category
 * @package  Controller
 * @author   Guilherme Fontans <guilherme.fontans@gmail.com>
 */
class RecursoController extends Controller
{
    public function all(Application $app)
    {
        $dao = new RecursoDao();
        $recursos = $dao->find();
        $xml = parent::encodeXmlCollection($recursos, 'Recurso');
        return parent::sendResponse(
            $xml,
            200
        );
    }

    public function byId(Application $app, $codigo)
    {
        $dao = new RecursoDao();
        $recurso = $dao->byId('Id_Recurso', $codigo);
        $xml = parent::encodeXmlObject($recurso, 'Recurso');
        return parent::sendResponse(
            $xml,
            200
        );
    }

    public function add(Application $app, $codigo, $descricao, $quantidade)
    {
        $dao = new RecursoDao();
        $recurso = $dao->insert(
            array(
                'Id_Recurso' => $codigo,
                'Descricao' => $descricao,
                'Quantidade' => $quantidade
            )
        );
        return parent::sendResponse(
            parent::getMessageInXml(
                "Recurso",
                "Recurso Adicionado"
            ),
            200
        );
    }

    public function update(Application $app, $codigo, $descricao, $quantidade)
    {
        $dao = new RecursoDao();
        $recurso = $dao->update(
            array(
                'Id_Recurso',
                '=',
                $codigo
            ),
            array(
                'Descricao' => $descricao,
                'Quantidade' => $quantidade
            )
        );
        return parent::sendResponse(
            parent::getMessageInXml(
                "Recurso",
                "Recurso Alterado"
            ),
            200
        );
    }

    public function delete(Application $app, $codigo)
    {
        $dao = new RecursoDao();
        $recurso = $dao->delete(
            array(
                'Id_Recurso',
                '=',
                $codigo
            )
        );
        return parent::sendResponse(
            parent::getMessageInXml(
                "Recurso",
                "Recurso Apagado"
            ),
            200
        );
    }
}
