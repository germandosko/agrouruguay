<?php
/**
 * @author		German Dosko
 * @version		March 7, 2013
 */

class Photo extends AbstractEntity {

	/**
	 * @var		int
	 */
	protected $id = null;

	/**
	 * @var		string
	 */
	protected $alt = null;

	/**
	 * @var		string
	 */
	protected $thumbnail = null;

	/**
	 * @var		string
	 */
	protected $url = null;

	/**
	 * @param		int		$id
	 */
	public function setId($id){
		$this->id = intval($id);
	}

	/**
	 * @param		string		$alt
	 */
	public function setAlt($alt){
		$this->alt = substr(strval($alt), 0, 256);
	}

	/**
	 * @param		string		$thumbnail
	 */
	public function setThumbnail($thumbnail){
		$this->thumbnail = substr(strval($thumbnail), 0, 256);
	}

	/**
	 * @param		string		$url
	 */
	public function setUrl($url){
		$this->url = substr(strval($url), 0, 256);
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
	public function getAlt(){
		return $this->alt;
	}

	/**
	 * @return		string
	 */
	public function getThumbnail(){
		return $this->thumbnail;
	}

	/**
	 * @return		string
	 */
	public function getUrl(){
		return $this->url;
	}

}