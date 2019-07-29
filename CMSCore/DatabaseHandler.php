<?php
namespace CMSCore;
interface DatabaseHandler{
	
	function establishConnection();
	function executeQuerry($sql);
	function createObject($type,$objectName,$arguments);
	function saveObject ($type,$values);
	function deleteObject($id,$type);
	function editObject($id,$type,$arguments,$values);
	function readObject($sql);
	function sanitizeInputs($values);

}
?>
