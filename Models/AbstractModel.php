<?php

/**
 * @author		German Dosko
 * @version		May 2, 2012
 * @filesource	/Models/AbstractModel.php
 */
abstract class AbstractModel{

	/**
	 * If true, models will decode string from UTF-8 to ISO-8859-1
	 *
	 * @staticvar	bool
	 */
	public static $IsUsingUtf8 = false;
	
	public static $Charset = 'UTF-8'; //'ISO-8859-1'
	
	const Save = 'Save';
	const FetchAll = 'FetchAll';
	const FindById = 'FindById';
	const FindBy = 'FindBy';
	const FindByMultipleValues = 'FindByMultipleValues';
	const FindByProperties = 'Delete';
	const Search = 'Search';
	const Delete = 'Delete';

	/**
	 * Saves an Object in the Data Base
	 * 
	 * @param		Object		$object
	 * @static
	 */
	public static function Save(&$object){
		throw new Exception('Non implemented method AbstractModel::Save');
	}
	
	/**
	 * Finds an Object by id
	 * 
	 * @param 		mixed		$id
	 * @return 		Unit
	 * @static
	 */
	public static function FindById($id){
		throw new Exception('Non implemented method AbstractModel::FindById');
	}
	
	/**
	 * Finds stored Object by specific values
	 * 
	 * @param		array|string 	$data
	 * @return 		array|Object
	 * @static
	 */
	public static function FindBy($data){
		throw new Exception('Non implemented method AbstractModel::FindBy');
	}
	
	/**
	 * Finds stored Bundles by multiple values of an specific field
	 * 
	 * @param		array|string		$params
	 * @return 		array|Object
	 * @static
	 */
	public static function FindByMultipleValues($data){
		throw new Exception('Non implemented method AbstractModel::FindByMultipleValues');
	}

	/**
	 * Retrieves all Objects stored into the data base
	 * 
	 * @return		Array|Object
	 * @static
	 */
	public static function FetchAll(){
		throw new Exception('Non implemented method AbstractModel::FetchAll');
	}

	/**
	 * Retrieves all Objects that matches the search text
	 * 
	 * @param		array|string		$params
	 * @param		bool				$expectsOne
	 * @return 		array|Object
	 * @static
	 */
	public static function Search(){
		throw new Exception('Non implemented method AbstractModel::Search');
	}

	/**
	 * Returns params with the proper structure
	 * 
	 * @param		Array|mixed		$params
	 * @return		Array|mixed
	 * @static
	 */
	public static function CheckParams($params, $type=null){
		if(!isset($params['where']) && ($type != self::FetchAll)){
			$params = array('where' => $params); //overwriting params
		}
		if(!isset($params['orderBy'])){
			$params['orderBy'] = array();
		}
		if(!isset($params['from'])){
			$params['from'] = 0;
		}
		if(!isset($params['amount'])){
			$params['amount'] = null;
		}
		return $params;
	}
}
