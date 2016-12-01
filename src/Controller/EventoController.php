<?php

namespace Integrador\Controller;

use Integrador\Controller\Controller;
use Integrador\Model\EventoDao;
use Silex\Application;

/**
 * Class EventoController
 *
 * @category
 * @package  Controller
 * @author   Guilherme Fontans <guilherme.fontans@gmail.com>
 */
class EventoController extends Controller
{
    public function all(Application $app)
    {
        $dao = new EventoDao();
        $eventos = $dao->find();
        $xml = parent::encodeXmlCollection($eventos, 'Evento');
        return parent::sendResponse(
            $xml,
            200
        );
    }

    public function byId(Application $app, $codigo)
    {
        $dao = new EventoDao();
        $evento = $dao->byId('Id_Evento', $codigo);
        $xml = parent::encodeXmlObject($evento, 'Evento');
        return parent::sendResponse(
            $xml,
            200
        );
    }

    public function add(Application $app, $codigo, $nome, $inscricaoinicio, $inscricaofim, $execucaoinicio, $execucaofim, $disponibilidadeinicio, $disponibilidadefim, $status)
    {
        $dao = new EventoDao();
        $evento = $dao->insert(
            array(
                'Id_Evento' => $codigo,
                'Nome' => $nome,
                'Dt_Inicial_Inscricao' => $inscricaoinicio,
                'Dt_Final_Inscricao' => $inscricaofim,
                'Dt_Inicial_Execucao' => $execucaoinicio,
                'Dt_Final_Execucao' => $execucaofim,
                'Dt_Final_Disponibilidade' => $disponibilidadefim,
                'Dt_Inicio_Disponibilidade' => $disponibilidadeinicio,
                'Id_Status' => $status
            )
        );
        return parent::sendResponse(
            parent::getMessageInXml(
                "Evento",
                "Evento Adicionado"
            ),
            200
        );
    }

    public function update(Application $app, $codigo, $nome, $inscricaoinicio, $inscricaofim, $execucaoinicio, $execucaofim, $disponibilidadeinicio, $disponibilidadefim, $status)
    {
        $dao = new EventoDao();
        $evento = $dao->update(
            array(
                'Id_Evento',
                '=',
                $codigo
            ),
            array(
                'Nome' => $nome,
                'Dt_Inicial_Inscricao' => $inscricaoinicio,
                'Dt_Final_Inscricao' => $inscricaofim,
                'Dt_Inicial_Execucao' => $execucaoinicio,
                'Dt_Final_Execucao' => $execucaofim,
                'Dt_Final_Disponibilidade' => $disponibilidadefim,
                'Dt_Inicio_Disponibilidade' => $disponibilidadeinicio,
                'Id_Status' => $status
            )
        );
        return parent::sendResponse(
            parent::getMessageInXml(
                "Evento",
                "Evento Alterado"
            ),
            200
        );
    }

    public function delete(Application $app, $codigo)
    {
        $dao = new EventoDao();
        $evento = $dao->delete(
            array(
                'Id_Evento',
                '=',
                $codigo
            )
        );
        return parent::sendResponse(
            parent::getMessageInXml(
                "Evento",
                "Evento Apagado"
            ),
            200
        );
    }
}
