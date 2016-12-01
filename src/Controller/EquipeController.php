<?php

namespace Integrador\Controller;

use Integrador\Controller\Controller;
use Integrador\Model\EquipeDao;
use Silex\Application;

/**
 * Class EquipeController
 *
 * @category
 * @package  Controller
 * @author   Guilherme Fontans <guilherme.fontans@gmail.com>
 */
class EquipeController extends Controller
{
    public function all(Application $app)
    {
        $dao = new EquipeDao();
        $equipes = $dao->find();
        $xml = parent::encodeXmlCollection($equipes, 'Equipe');
        return parent::sendResponse(
            $xml,
            200
        );
    }

    public function byId(Application $app, $id)
    {
        $dao = new EquipeDao();
        $equipe = $dao->byId('Id_Equipe', $id);
        $xml = parent::encodeXmlObject($equipe, 'Equipe');
        return parent::sendResponse(
            $xml,
            200
        );
    }

    public function add(Application $app, $id, $nome, $email, $telefone, $senha)
    {
        $dao = new EquipeDao();
        $sala = $dao->insert(
            array(
                'Id_Equipe' => $id,
                'Nome' => $nome,
                'Email' => $email,
                'Telefone' => $telefone,
                'Senha' => $senha
            )
        );
        return parent::sendResponse(
            parent::getMessageInXml(
                "Equipe",
                "Equipe Adicionada"
            ),
            200
        );
    }

    public function update(Application $app, $id, $nome, $email, $telefone, $senha)
    {
        $dao = new EquipeDao();
        $sala = $dao->update(
            array(
                'Id_Equipe',
                '=',
                $id
            ),
            array(
                'Nome' => $nome,
                'Email' => $email,
                'Telefone' => $telefone,
                'Senha' => $senha
            )
        );
        return parent::sendResponse(
            parent::getMessageInXml(
                "Equipe",
                "Equipe Alterada"
            ),
            200
        );
    }

    public function delete(Application $app, $id)
    {
        $dao = new EquipeDao();
        $sala = $dao->delete(
            array(
                'Id_Equipe',
                '=',
                $id
            )
        );
        return parent::sendResponse(
            parent::getMessageInXml(
                "Equipe",
                "Equipe Apagada"
            ),
            200
        );
    }
}
