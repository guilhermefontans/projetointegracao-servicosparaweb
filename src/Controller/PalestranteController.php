<?php

namespace Integrador\Controller;

use Integrador\Controller\Controller;
use Integrador\Model\PalestranteDao;
use Silex\Application;

/**
 * Class PalestranteController
 *
 * @category
 * @package  Controller
 * @author   Guilherme Fontans <guilherme.fontans@gmail.com>
 */
class PalestranteController extends Controller
{
    public function all(Application $app)
    {
        $dao = new PalestranteDao();
        $palestrantes = $dao->find();
        $xml = parent::encodeXmlCollection($palestrantes, 'Palestrante');
        return parent::sendResponse(
            $xml,
            200
        );
    }

    public function byId(Application $app, $codigo)
    {
        $dao = new PalestranteDao();
        $palestrante = $dao->byId('Id_Palestrante', $codigo);
        $xml = parent::encodeXmlObject($palestrante, 'Palestrante');
        return parent::sendResponse(
            $xml,
            200
        );
    }

    public function add(Application $app, $codigo, $nome, $minicurriculo, $foto)
    {
        $dao = new PalestranteDao();
        $palestrante = $dao->insert(
            array(
                'Id_Palestrante' => $codigo,
                'Nome' => $nome,
                'Minicurriculo' => $minicurriculo,
                'Foto' => $minicurriculo
            )
        );
        return parent::sendResponse(
            parent::getMessageInXml(
                "Palestrante",
                "Palestrante Adicionado"
            ),
            200
        );
    }

    public function update(Application $app, $codigo, $nome, $minicurriculo, $foto)
    {
        $dao = new PalestranteDao();
        $palestrante = $dao->update(
            array(
                'Id_Palestrante',
                '=',
                $codigo
            ),
            array(
                'Nome' => $nome,
                'Minicurriculo' => $minicurriculo,
                'Foto' => $minicurriculo
            )
        );
        return parent::sendResponse(
            parent::getMessageInXml(
                "Palestrante",
                "Palestrante Alterado"
            ),
            200
        );
    }

    public function delete(Application $app, $codigo)
    {
        $dao = new PalestranteDao();
        $palestrante = $dao->delete(
            array(
                'Id_Palestrante',
                '=',
                $codigo
            )
        );
        return parent::sendResponse(
            parent::getMessageInXml(
                "Palestrante",
                "Palestrante Apagado"
            ),
            200
        );
    }
}
