<?php
/**
 * @author		German Dosko
 * @version		March 22, 2013
 * @filesource		/Models/MachineryModel.php
 */

class MachineryModel extends AbstractModel {

	/**
	 * Saves the Machinery in the Data Base
	 * 
	 * @param		Machinery		$machinery
	 * @static
	 */
	public static function Save(&$machinery){
		$id = $machinery->getId();
		$properties = array(
				"photoId" => null,
				"date" => Date::ParseDate($machinery->getDate()),
				"description" => self::$IsUsingUtf8 ? htmlentities(utf8_decode($machinery->getDescription()), ENT_COMPAT, self::$Charset, false) : htmlentities($machinery->getDescription(), ENT_COMPAT, self::$Charset, false),
				"title" => self::$IsUsingUtf8 ? htmlentities(utf8_decode($machinery->getTitle()), ENT_COMPAT, self::$Charset, false) : htmlentities($machinery->getTitle(), ENT_COMPAT, self::$Charset, false),
				"active" => intval($machinery->getActive())
			);
		if(is_object($machinery->getPhoto())){
			$properties["photoId"] = $machinery->getPhoto()->getId();
		}
		$emptyValues = '';
		if(empty($properties["date"])){
			$emptyValues .= ' date';
		}
		if(empty($properties["title"])){
			$emptyValues .= ' title';
		}
		if(empty($emptyValues)){
			$query = new Query();
			if(!empty($id) && is_int($id)){
				$query->createUpdate('machineries', $properties, 'id = "'.$id.'"', true);
				$isExecuted = $query->execute();
				if(!$isExecuted){
					throw new Exception('Unable to update Machinery "'.$id.'" in database. (MachineryModel::save())');
				}
			} else {
				$query->createInsert('machineries', $properties, true);
				$isExecuted = $query->execute();
				if($isExecuted){
					//get the last inserted id
					$query->createSelect(array('MAX(id) as id'), 'machineries');
					$value = $query->execute();
					$machinery->setId($value['id']);
				} else {
					throw new Exception('Unable to insert Machinery in database. (MachineryModel::save())');
				}
			}
		} else {
			throw new Exception('Unable to save Machinery with empty required values:'.$emptyValues.'. (MachineryModel::save())');
		}
		return true;
	}

	/**
	 * Finds a Machinery by id
	 * 
	 * @param		int		$id
	 * @return		Machinery
	 * @static
	 */
	public static function FindById($id){
		$query = new Query();
		$query->createSelect(array('*'), 'machineries', array(), 'id = "'.$id.'"');
		$machineryArray = $query->execute();
		$machinery = false;
		if(!empty($machineryArray)){
			$machinery = self::CreateObjectFromArray($machineryArray);
		}
		return $machinery;
	}

	/**
	 * Finds stored Machineries by specific values
	 * 
	 * @param		array|string		$params
	 * @param		bool				$expectsOne
	 * @return		array|Machinery
	 * @static
	 */
	public static function FindBy($params, $expectsOne=false){
		$machineriesArray = array();
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
			$query->createSelect(array('*'), 'machineries', null, $where, $orderBy, $limit);
			$arrayArraysMachinery = $query->execute(true);
			if(!empty($arrayArraysMachinery)){
				if($expectsOne){
					return self::CreateObjectFromArray($arrayArraysMachinery[0]);
				}
				foreach($arrayArraysMachinery as $arrayMachinery){
					array_push($machineriesArray, self::CreateObjectFromArray($arrayMachinery));
				}
			} elseif($expectsOne){
				return false;
			}
		} else {
			throw new Exception('Invalid param, array expected in MachineryModel::FindBy()');
		}
		return $machineriesArray;
	}

	/**
	 * Finds stored Machineries by multiple values of an specific field
	 * 
	 * @param		array|string		$params
	 * @return		array|Machinery
	 * @static
	 */
	public static function FindByMultipleValues($params, $expectsOne=false){
		$machineriesArray = array();
		if(is_array($params)){
			$params = self::CheckParams($params);
			//TODO: Use Query::Make() !!!
			$whereArray = array();
			foreach ($params['where'] as $key => $value){
				if(!empty($value) && is_array($value)){
					array_push($whereArray, $key.' IN ('.implode(', ', $value).')');
				} else {
					throw new Exception('Invalid param, array expected in MachineryModel::FindByMultipleValues()');
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
			$query->createSelect(array('*'), 'machineries', null, $where, $orderBy, $limit);
			$arrayArraysMachinery = $query->execute(true);
			if(!empty($arrayArraysMachinery)){
				foreach($arrayArraysMachinery as $arrayMachinery){
					array_push($machineriesArray, self::CreateObjectFromArray($arrayMachinery));
				}
			}
		} else {
			throw new Exception('Invalid param, array expected in MachineryModel::FindByMultipleValues()');
		}
		return $machineriesArray;
	}

	/**
	 * Finds stored Machineries by related Photo properties
	 * 
	 * @param		array|string		$params
	 * @param		bool				$expectsOne
	 * @return		array|Machinery
	 * @static
	 */
	public static function FindByPhotoProperties($params, $expectsOne=false){
		$machineriesArray = array();
		if(is_array($params)){
			$params = self::CheckParams($params);
			$selectFields = array(
					'machineries.id',
					'machineries.photoId',
					'machineries.date',
					'machineries.description',
					'machineries.title',
					'machineries.active'
				);
			$joinArray = array('photos'=>'photos.id = machineries.photoId');
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
			$query->createSelect(array('*'), 'machineries', $joinArray, $where, $orderBy, $limit);
			$arrayArraysMachinery = $query->execute(true);
			if(!empty($arrayArraysMachinery)){
				if($expectsOne){
					return self::CreateObjectFromArray($arrayArraysMachinery[0]);
				}
				foreach($arrayArraysMachinery as $arrayMachinery){
					array_push($machineriesArray, self::CreateObjectFromArray($arrayMachinery));
				}
			} elseif($expectsOne){
				return false;
			}
		} else {
			throw new Exception('Invalid param, array expected in MachineryModel::FindByPhotoProperties()');
		}
		return $machineriesArray;
	}

	/**
	 * Retrieves all Machineries stored in the data base
	 * 
	 * @return		array|Machinery
	 * @static
	 */
	public static function FetchAll($params=array('orderBy', 'from', 'amount')){
		$machineriesArray = array();
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
		$query->createSelect(array('*'), 'machineries', null, null, $orderBy, $limit);
		$arrayArraysMachinery = $query->execute(true);
		if(!empty($arrayArraysMachinery)){
			foreach($arrayArraysMachinery as $arrayMachinery){
				array_push($machineriesArray, self::CreateObjectFromArray($arrayMachinery));
			}
		}
		return $machineriesArray;
	}

	/**
	 * Retrieves all Machineries that matches the search text
	 * 
	 * @param		array|string		$params
	 * @param		bool				$expectsOne
	 * @return		array|Machinery
	 * @static
	 */
	public static function Search($params, $expectsOne=false){
		$machineriesArray = array();
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
				$query->createSelect(array('*'), 'machineries', null, $where, $orderBy, $limit);
				$arrayArraysMachinery = $query->execute(true);
				if(!empty($arrayArraysMachinery)){
					if($expectsOne){
						return self::CreateObjectFromArray($arrayArraysMachinery[0]);
					}
					foreach($arrayArraysMachinery as $arrayMachinery){
						array_push($machineriesArray, self::CreateObjectFromArray($arrayMachinery));
					}
				} elseif($expectsOne){
					return false;
				}
			} else {
				throw new Exception('Unable to perform search with invalid params. MachineryModel::Search()');
			}
		} else {
			throw new Exception('Unable to perform search with invalid params. MachineryModel::Search()');
		}
		return $machineriesArray;
	}

	/**
	 * Retrieves the number of Machineries stored in the data base
	 * 
	 * @return		int
	 * @static
	 */
	public static function GetCount(){
		$query = new Query();
		$query->push('SELECT count(*) as count FROM machineries');
		$result = $query->execute();
		return $result['count'];
	}

	/**
	 *  Deletes Machinery by id
	 * 
	 * @param		int		$id
	 * @static
	 */
	public static function Delete($id){
		$query = new Query();
		$query->createDelete('machineries', $id);
		return $query->execute();
	}

	/**
	 *  Creates Machinery object from the basic properties
	 * 
	 * @param		array|string		$properties
	 * @return		Machinery
	 * @static
	 */
	public static function CreateObjectFromArray($properties){
		$emptyValues = '';
		if(empty($properties["id"])){
			$emptyValues .= ' id';
		}
		if(empty($properties["date"])){
			$emptyValues .= ' date';
		}
		if(empty($properties["title"])){
			$emptyValues .= ' title';
		}
		if(empty($emptyValues)){
			if(!empty($properties['photoId'])){
				$properties['photo'] = PhotoModel::FindById($properties['photoId']);
				if(empty($properties['photo'])){
					throw new Exception('Unable to find the Photo for the Machinery.(MachineryModel::CreateObjectFromArray())');
				}
			}
			return new Machinery($properties);
		} else {
			throw new Exception('Unable to create Machinery with empty required values:'.$emptyValues.' for Machinery "'.$properties['id'].'". (MachineryModel::CreateObjectFromArray())');
		}
	}
}