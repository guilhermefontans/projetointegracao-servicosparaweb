<?php

namespace Integrador\Controller;

use Integrador\Controller\Controller;
use Integrador\Model\AlunoDao;
use Silex\Application;

/**
 * Class AlunoController
 *
 * @category
 * @package  Controller
 * @author   Guilherme Fontans <guilherme.fontans@gmail.com>
 */
class AlunoController extends Controller
{
    public function all(Application $app)
    {
        $dao = new AlunoDao();
        $alunos = $dao->find();
        $xml = parent::encodeXmlCollection($alunos, 'Aluno');
        return parent::sendResponse(
            $xml,
            200
        );
    }

    public function byId(Application $app, $ra)
    {
        $dao = new AlunoDao();
        $aluno = $dao->byId('RA', $ra);
        $xml = parent::encodeXmlObject($aluno, 'Aluno');
        return parent::sendResponse(
            $xml,
            200
        );
    }

    public function add(Application $app, $ra, $nome, $email, $telefone, $senha)
    {
        $dao = new AlunoDao();
        $sala = $dao->insert(
            array(
                'RA' => $ra,
                'Nome' => $nome,
                'Email' => $email,
                'Telefone' => $telefone,
                'Senha' => $senha
            )
        );
        return parent::sendResponse(
            parent::getMessageInXml(
                "Aluno",
                "Aluno Adicionado"
            ),
            200
        );
    }

    public function update(Application $app, $ra, $nome, $email, $telefone, $senha)
    {
        $dao = new AlunoDao();
        $sala = $dao->update(
            array(
                'RA',
                '=',
                $ra
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
                "Aluno",
                "Aluno Alterado"
            ),
            200
        );
    }

    public function delete(Application $app, $ra)
    {
        $dao = new AlunoDao();
        $sala = $dao->delete(
            array(
                'RA',
                '=',
                $ra
            )
        );
        return parent::sendResponse(
            parent::getMessageInXml(
                "Aluno",
                "Aluno Apagado"
            ),
            200
        );
    }
}
