<?php

namespace Integrador\Controller;

use Integrador\Controller\Controller;
use Integrador\Model\AlunoDao;
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

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
        return new Response(
            parent::encodeXmlCollection($alunos, 'Aluno'),
            200,
            array(
                'Content-Type' => 'application/xml'
            )
        );
    }

    public function byId(Application $app, $ra)
    {
        $dao = new AlunoDao();
        $aluno = $dao->byId('RA', $ra);
        $xml = parent::encodeXmlObject($aluno, 'Aluno');
        return new Response(
            $xml,
            200,
            array(
                'Content-Type' => 'application/xml'
            )
        );
    }
}
