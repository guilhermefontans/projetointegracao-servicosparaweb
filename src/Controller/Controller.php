<?php

namespace Integrador\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class Controller
 *
 * @category
 * @package  Controller
 * @author   Guilherme Fontans <guilherme.fontans@gmail.com>
 */
abstract class Controller
{
    public function encodeXmlCollection($data = array(), $tableName)
    {
        if(count($data) < 1){
            return $this->getMessageInXml($tableName, "Sem elementos cadastrados");
        }

		$database = new \SimpleXMLElement('<?xml version="1.0"?><database></database>');
        $database->addAttribute('name','eventoqi');

		foreach($data as $object => $row) {
			$table = $database->addChild('table');
            $table->addAttribute('name', $tableName);

            foreach ($row as $key => $value) {
			    $collumn = $table->addChild('collumn', $value);
			    $collumn->addAttribute('name',$key);
            }
		}
		return $database->asXML();
	}

    public function encodeXmlObject($data, $tableName)
    {
        if(!$data){
            return $this->getMessageInXml($tableName, "URL inválida");
        }

		$database = new \SimpleXMLElement('<?xml version="1.0"?><database></database>');
            $database->addAttribute('name','eventoqi');

            $table = $database->addChild('table');
            $table->addAttribute('name', $tableName);
            foreach($data as $key => $value) {
                $collumn = $table->addChild('collumn', $value);
                $collumn->addAttribute('name',$key);
            }
		    return $database->asXML();
	}

    public function sendResponse($response, $statusRequest)
    {
        return new Response(
            $response,
            $statusRequest,
            array(
                'Content-Type' => 'application/xml'
            )
        );
    }

    public function getMessageInXml($tableName, $message)
    {
		$database = new \SimpleXMLElement('<?xml version="1.0"?><database></database>');
        $database->addAttribute('name','eventoqi');

        $table = $database->addChild('table');
        $table->addAttribute('name', $tableName);
        $message = $table->addChild('message', $message);
        return $database->asXML();
	}
}
