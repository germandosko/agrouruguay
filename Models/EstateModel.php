<?php
/**
 * @author		German Dosko
 * @version		March 22, 2013
 * @filesource		/Models/EstateModel.php
 */

class EstateModel extends AbstractModel {

	/**
	 * Saves the Estate in the Data Base
	 * 
	 * @param		Estate		$estate
	 * @static
	 */
	public static function Save(&$estate){
		$id = $estate->getId();
		$properties = array(
				"typeId" => $estate->getType()->getId(),
				"photoId" => null,
				"date" => Date::ParseDate($estate->getDate()),
				"description" => self::$IsUsingUtf8 ? htmlentities(utf8_decode($estate->getDescription()), ENT_COMPAT, self::$Charset, false) : htmlentities($estate->getDescription(), ENT_COMPAT, self::$Charset, false),
				"title" => self::$IsUsingUtf8 ? htmlentities(utf8_decode($estate->getTitle()), ENT_COMPAT, self::$Charset, false) : htmlentities($estate->getTitle(), ENT_COMPAT, self::$Charset, false),
				"active" => intval($estate->getActive())
			);
		if(is_object($estate->getPhoto())){
			$properties["photoId"] = $estate->getPhoto()->getId();
		}
		$emptyValues = '';
		if(empty($properties["typeId"])){
			$emptyValues .= ' typeId';
		}
		if(empty($properties["date"])){
			$emptyValues .= ' date';
		}
		if(empty($properties["title"])){
			$emptyValues .= ' title';
		}
		if(empty($emptyValues)){
			$query = new Query();
			if(!empty($id) && is_int($id)){
				$query->createUpdate('estates', $properties, 'id = "'.$id.'"', true);
				$isExecuted = $query->execute();
				if(!$isExecuted){
					throw new Exception('Unable to update Estate "'.$id.'" in database. (EstateModel::save())');
				}
			} else {
				$query->createInsert('estates', $properties, true);
				$isExecuted = $query->execute();
				if($isExecuted){
					//get the last inserted id
					$query->createSelect(array('MAX(id) as id'), 'estates');
					$value = $query->execute();
					$estate->setId($value['id']);
				} else {
					throw new Exception('Unable to insert Estate in database. (EstateModel::save())');
				}
			}
		} else {
			throw new Exception('Unable to save Estate with empty required values:'.$emptyValues.'. (EstateModel::save())');
		}
		return true;
	}

	/**
	 * Finds a Estate by id
	 * 
	 * @param		int		$id
	 * @return		Estate
	 * @static
	 */
	public static function FindById($id){
		$query = new Query();
		$query->createSelect(array('*'), 'estates', array(), 'id = "'.$id.'"');
		$estateArray = $query->execute();
		$estate = false;
		if(!empty($estateArray)){
			$estate = self::CreateObjectFromArray($estateArray);
		}
		return $estate;
	}

	/**
	 * Finds stored Estates by specific values
	 * 
	 * @param		array|string		$params
	 * @param		bool				$expectsOne
	 * @return		array|Estate
	 * @static
	 */
	public static function FindBy($params, $expectsOne=false){
		$estatesArray = array();
		if(is_array($params)){
			$params = self::CheckParams($params);
			//TODO: Use Query::Make() !!!
			$whereArray = array();
			foreach ($params['where'] as $key => $value){
				if(!empty($value)){
					$parsedValue = self::$IsUsingUtf8 ? htmlentities(utf8_decode($value), ENT_COMPAT, self::$Charset, false) : htmlentities($value, ENT_COMPAT, self::$Charset, false);
					array_push($whereArray, $key.' = "'.$parsedValue.'"');
				}
			}
			$where = implode(' AND ', $whereArray);
			$orderBy = array();
			if(!empty($params['orderBy'])){
				$orderBy = implode(',', $params['orderBy']);
			}
			$limit = '';
			if(!empty($params['from'])){
				$limit = ''.$params['from'];
				if(!empty($params['amount'])){
					$limit .= ', '.$params['amount'];
				} else {
					$limit .= ', 10';
				}
			}
			$query = new Query();
			$query->createSelect(array('*'), 'estates', null, $where, $orderBy, $limit);
			$arrayArraysEstate = $query->execute(true);
			if(!empty($arrayArraysEstate)){
				if($expectsOne){
					return self::CreateObjectFromArray($arrayArraysEstate[0]);
				}
				foreach($arrayArraysEstate as $arrayEstate){
					array_push($estatesArray, self::CreateObjectFromArray($arrayEstate));
				}
			} elseif($expectsOne){
				return false;
			}
		} else {
			throw new Exception('Invalid param, array expected in EstateModel::FindBy()');
		}
		return $estatesArray;
	}

	/**
	 * Finds stored Estates by multiple values of an specific field
	 * 
	 * @param		array|string		$params
	 * @return		array|Estate
	 * @static
	 */
	public static function FindByMultipleValues($params, $expectsOne=false){
		$estatesArray = array();
		if(is_array($params)){
			$params = self::CheckParams($params);
			//TODO: Use Query::Make() !!!
			$whereArray = array();
			foreach ($params['where'] as $key => $value){
				if(!empty($value) && is_array($value)){
					array_push($whereArray, $key.' IN ('.implode(', ', $value).')');
				} else {
					throw new Exception('Invalid param, array expected in EstateModel::FindByMultipleValues()');
				}
			}
			$where = implode(' OR ', $whereArray);
			$orderBy = array();
			if(!empty($params['orderBy'])){
				$orderBy = implode(',', $params['orderBy']);
			}
			$limit = '';
			if(!empty($params['from'])){
				$limit = ''.$params['from'];
				if(!empty($params['amount'])){
					$limit .= ', '.$params['amount'];
				} else {
					$limit .= ', 10';
				}
			}
			$query = new Query();
			$query->createSelect(array('*'), 'estates', null, $where, $orderBy, $limit);
			$arrayArraysEstate = $query->execute(true);
			if(!empty($arrayArraysEstate)){
				foreach($arrayArraysEstate as $arrayEstate){
					array_push($estatesArray, self::CreateObjectFromArray($arrayEstate));
				}
			}
		} else {
			throw new Exception('Invalid param, array expected in EstateModel::FindByMultipleValues()');
		}
		return $estatesArray;
	}

	/**
	 * Finds stored Estates by related Type properties
	 * 
	 * @param		array|string		$params
	 * @param		bool				$expectsOne
	 * @return		array|Estate
	 * @static
	 */
	public static function FindByTypeProperties($params, $expectsOne=false){
		$estatesArray = array();
		if(is_array($params)){
			$params = self::CheckParams($params);
			$selectFields = array(
					'estates.id',
					'estates.typeId',
					'estates.photoId',
					'estates.date',
					'estates.description',
					'estates.title',
					'estates.active'
				);
			$joinArray = array('types'=>'types.id = estates.typeId');
			$whereArray = array();
			foreach ($params['where'] as $key => $value){
				if(!empty($value)){
					$parsedValue = self::$IsUsingUtf8 ? htmlentities(utf8_decode($value), ENT_COMPAT, self::$Charset, false) : htmlentities($value, ENT_COMPAT, self::$Charset, false);
					array_push($whereArray, 'types.'.$key.' = "'.$parsedValue.'"');
				}
			}
			$where = implode(' AND ', $whereArray);
			$orderBy = array();
			if(!empty($params['orderBy'])){
				$orderBy = implode(',', $params['orderBy']);
			}
			$limit = '';
			if(!empty($params['from'])){
				$limit = ''.$params['from'];
				if(!empty($params['amount'])){
					$limit .= ', '.$params['amount'];
				} else {
					$limit .= ', 10';
				}
			}
			$query = new Query();
			$query->createSelect(array('*'), 'estates', $joinArray, $where, $orderBy, $limit);
			$arrayArraysEstate = $query->execute(true);
			if(!empty($arrayArraysEstate)){
				if($expectsOne){
					return self::CreateObjectFromArray($arrayArraysEstate[0]);
				}
				foreach($arrayArraysEstate as $arrayEstate){
					array_push($estatesArray, self::CreateObjectFromArray($arrayEstate));
				}
			} elseif($expectsOne){
				return false;
			}
		} else {
			throw new Exception('Invalid param, array expected in EstateModel::FindByTypeProperties()');
		}
		return $estatesArray;
	}

	/**
	 * Finds stored Estates by related Photo properties
	 * 
	 * @param		array|string		$params
	 * @param		bool				$expectsOne
	 * @return		array|Estate
	 * @static
	 */
	public static function FindByPhotoProperties($params, $expectsOne=false){
		$estatesArray = array();
		if(is_array($params)){
			$params = self::CheckParams($params);
			$selectFields = array(
					'estates.id',
					'estates.typeId',
					'estates.photoId',
					'estates.date',
					'estates.description',
					'estates.title',
					'estates.active'
				);
			$joinArray = array('photos'=>'photos.id = estates.photoId');
			$whereArray = array();
			foreach ($params['where'] as $key => $value){
				if(!empty($value)){
					$parsedValue = self::$IsUsingUtf8 ? htmlentities(utf8_decode($value), ENT_COMPAT, self::$Charset, false) : htmlentities($value, ENT_COMPAT, self::$Charset, false);
					array_push($whereArray, 'photos.'.$key.' = "'.$parsedValue.'"');
				}
			}
			$where = implode(' AND ', $whereArray);
			$orderBy = array();
			if(!empty($params['orderBy'])){
				$orderBy = implode(',', $params['orderBy']);
			}
			$limit = '';
			if(!empty($params['from'])){
				$limit = ''.$params['from'];
				if(!empty($params['amount'])){
					$limit .= ', '.$params['amount'];
				} else {
					$limit .= ', 10';
				}
			}
			$query = new Query();
			$query->createSelect(array('*'), 'estates', $joinArray, $where, $orderBy, $limit);
			$arrayArraysEstate = $query->execute(true);
			if(!empty($arrayArraysEstate)){
				if($expectsOne){
					return self::CreateObjectFromArray($arrayArraysEstate[0]);
				}
				foreach($arrayArraysEstate as $arrayEstate){
					array_push($estatesArray, self::CreateObjectFromArray($arrayEstate));
				}
			} elseif($expectsOne){
				return false;
			}
		} else {
			throw new Exception('Invalid param, array expected in EstateModel::FindByPhotoProperties()');
		}
		return $estatesArray;
	}

	/**
	 * Retrieves all Estates stored in the data base
	 * 
	 * @return		array|Estate
	 * @static
	 */
	public static function FetchAll($params=array('orderBy', 'from', 'amount')){
		$estatesArray = array();
		$params = self::CheckParams($params, self::FetchAll);
		$orderBy = array();
		if(!empty($params['orderBy'])){
			$orderBy = implode(',', $params['orderBy']);
		}
		$limit = '';
		if(!empty($params['from'])){
			$limit = ''.$params['from'];
			if(!empty($params['amount'])){
				$limit .= ', '.$params['amount'];
			} else {
				$limit .= ', 10';
			}
		}
		$query = new Query();
		$query->createSelect(array('*'), 'estates', null, null, $orderBy, $limit);
		$arrayArraysEstate = $query->execute(true);
		if(!empty($arrayArraysEstate)){
			foreach($arrayArraysEstate as $arrayEstate){
				array_push($estatesArray, self::CreateObjectFromArray($arrayEstate));
			}
		}
		return $estatesArray;
	}

	/**
	 * Retrieves all Estates that matches the search text
	 * 
	 * @param		array|string		$params
	 * @param		bool				$expectsOne
	 * @return		array|Estate
	 * @static
	 */
	public static function Search($params, $expectsOne=false){
		$estatesArray = array();
		if(is_array($params)){
			$params = self::CheckParams($params);
			if(is_array($params['where']) && isset($params['where']['text']) && isset($params['where']['fields'])){
				$text = trim($params['where']['text']);
				$searchs = array();
				foreach($params['where']['fields'] as $field){
					array_push($searchs, trim($field).' LIKE "%'.$text.'%"');
				}
				$where = implode(' OR ', $searchs);
				$orderBy = array();
				if(!empty($params['orderBy'])){
					$orderBy = implode(',', $params['orderBy']);
				}
				$limit = '';
				if(!empty($params['from'])){
					$limit = ''.$params['from'];
					if(!empty($params['amount'])){
						$limit .= ', '.$params['amount'];
					} else {
						$limit .= ', 10';
					}
				}
				$query = new Query();
				$query->createSelect(array('*'), 'estates', null, $where, $orderBy, $limit);
				$arrayArraysEstate = $query->execute(true);
				if(!empty($arrayArraysEstate)){
					if($expectsOne){
						return self::CreateObjectFromArray($arrayArraysEstate[0]);
					}
					foreach($arrayArraysEstate as $arrayEstate){
						array_push($estatesArray, self::CreateObjectFromArray($arrayEstate));
					}
				} elseif($expectsOne){
					return false;
				}
			} else {
				throw new Exception('Unable to perform search with invalid params. EstateModel::Search()');
			}
		} else {
			throw new Exception('Unable to perform search with invalid params. EstateModel::Search()');
		}
		return $estatesArray;
	}

	/**
	 * Retrieves the number of Estates stored in the data base
	 * 
	 * @return		int
	 * @static
	 */
	public static function GetCount(){
		$query = new Query();
		$query->push('SELECT count(*) as count FROM estates');
		$result = $query->execute();
		return $result['count'];
	}

	/**
	 *  Deletes Estate by id
	 * 
	 * @param		int		$id
	 * @static
	 */
	public static function Delete($id){
		$query = new Query();
		$query->createDelete('estates', $id);
		return $query->execute();
	}

	/**
	 *  Creates Estate object from the basic properties
	 * 
	 * @param		array|string		$properties
	 * @return		Estate
	 * @static
	 */
	public static function CreateObjectFromArray($properties){
		$emptyValues = '';
		if(empty($properties["id"])){
			$emptyValues .= ' id';
		}
		if(empty($properties["typeId"])){
			$emptyValues .= ' typeId';
		}
		if(empty($properties["date"])){
			$emptyValues .= ' date';
		}
		if(empty($properties["title"])){
			$emptyValues .= ' title';
		}
		if(empty($emptyValues)){
			$properties['type'] = TypeModel::FindById($properties['typeId']);
			if(empty($properties['type'])){
				throw new Exception('Unable to find the Type for the Estate.(EstateModel::CreateObjectFromArray())');
			}
			if(!empty($properties['photoId'])){
				$properties['photo'] = PhotoModel::FindById($properties['photoId']);
				if(empty($properties['photo'])){
					throw new Exception('Unable to find the Photo for the Estate.(EstateModel::CreateObjectFromArray())');
				}
			}
			return new Estate($properties);
		} else {
			throw new Exception('Unable to create Estate with empty required values:'.$emptyValues.' for Estate "'.$properties['id'].'". (EstateModel::CreateObjectFromArray())');
		}
	}
}