<?php
/**
 * @author		German Dosko
 * @version		March 7, 2013
 */

class Role extends AbstractEntity {

	/**
	 * @var		int
	 */
	protected $id = null;

	/**
	 * @var		string
	 */
	protected $name = null;

	/**
	 * @param		int		$id
	 */
	public function setId($id){
		$this->id = intval($id);
	}

	/**
	 * @param		string		$name
	 */
	public function setName($name){
		$this->name = substr(strval($name), 0, 256);
	}

	/**
	 * @return		int
	 */
	public function getId(){
		return $this->id;
	}

	/**
	 * @return		string
	 */
	public function getName(){
		return $this->name;
	}

}