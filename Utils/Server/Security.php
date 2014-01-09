<?php
/**
 * @author			German Dosko
 * @version			June 6, 2012
 * @filesource		/Utils/Server/Security.php
*/

class Security
{
	/**
	 * Authenticates the user
	 *
	 * @param		User		$user
	 * @return		boolean  
	 */
	public static function Authenticate($user=null){
		$mySession = Session::getInstance();
		if (is_object($user)){
			$mySession->userName = $user->getName();
			$mySession->lastAccess = date(Date::MYSQL_DATE_FORMAT);//Shell::GetSystemDate(); //Shell disabled in dattatec
			$mySession->isLogged = true;
			return true;
		} else{
			if ($mySession->isLogged){
				$mySession->lastAccess = date(Date::MYSQL_DATE_FORMAT);//Shell::GetSystemDate(); //Shell disabled in dattatec
				return true;
			} 
		}
		return false;
	}
	
	/**
	 *  Closes the session of the user
	 */
	public static function unAuthenticate(){
		$mySession = Session::getInstance();
		$mySession->destroy();
		header('Location: /login.html?auth=0');
	}
}