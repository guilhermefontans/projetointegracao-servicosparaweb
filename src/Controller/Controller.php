<?php

namespace Integrador\Controller;

/**
 * Class Controller
 *
 * @category
 * @package  Controller
 * @author   Guilherme Fontans <guilherme.fontans@gmail.com>
 */
abstract class Controller
{
	public function encodeXml($data = array(), $tableName) {
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
}
