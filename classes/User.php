<?php 

class User{ 
	// $_db DB(represents the only object of DB class) DB::getInstance
	// $_data 
	// $_sessionName string "user"
	// $_cookieName string "hash"
	private $_db;
	private $_sessionName;
	private $_cookieName;
	private $_data;
	private $_isLoggedIn = false;

	public function __construct($id = null, $fields = array()){
		$this->_db = DB::getInstance();
		$this->_sessionName = Config::get('session/session_name');
		$this->_cookieName = Config::get('remember/cookie_name');
		if(isset($id)){
			$this->_data = $this->_db->get('users', array('id', '=', $id))->first();
		} else {
			$this->_db->insert('users', $fields);
			$id = $this->_db->pdo()->lastInsertId();
			$this->_data = $this->_db->get('users', array('id', '=', $id))->first();
		}
	}


	// return current user or false
	public static function getCurrentUser(){
		if(Session::exists(Config::get('session/session_name'))){
			$id = Session::get(Config::get(('session/session_name')));
			if (User::userExistsByID($id)){
				$user = new self($id);
				return $user;
			}
		}
		return false;
	}

	// return a user with id of $id or false
	public static function getUserByID($id){
		if (User::userExistsByID($id)){
			$user = new self($id);
			return $user;
		}
		return false;
	}

    
    // return boolean, if a user with an id of $id exists in the database return true, otherwise return false
	public static function userExistsByID($id){
		if(isset($id)){
			$data = DB::getInstance()->get('users', array('id', '=', $id));
			if($data->calRows ()){
				return true;
			}
		}
		return false;
	}

	// return boolean, if a user with a username and password exists in the database return true, otherwise return false
	public static function userExistsByUsernameAndPassword($username, $password){
		if(isset($username) && isset($password)){
			$savedUserData = DB::getInstance()->get('users', array('username', '=', $username))->first();
			$savedUserPassword = $savedUserData->password;
			$savedUserSalt = $savedUserData->salt;
			if($savedUserPassword === Hash::make($password, $savedUserSalt)){
				return true;
			}
		}
		return false;
	}

	// return the new user created according to info in $fields
	public static function createUser($fields = array()){
		$user = new self(null, $fields);
		return $user;
	}


	// return an existed user id according to the $username and $password, if there is no match return false
	public static function getUserIDByUsernameAndPassword($username, $password){
		if(User::userExistsByUsernameAndPassword($username, $password)){
			$savedUserData = DB::getInstance()->get('users', array('username', '=', $username))->first();
			$savedUserID = $savedUserData->id;
			return $savedUserID;
		}
		return false;
	}


	public function login($username = null, $password = null, $remember = false){
		if(!$username && !$password && $this->exists()){
			Session::put($this->sessionName, $this->data()->id);
			return true;
		} else {
			$id = User::getUserIDByUsernameAndPassword($username, $password);
			if($id != false){
				Session::put($this->_sessionName, $id);
				if($remember){
					$hash = Hash::unique();
					$hashCheck = $this->_db->get('users_session', array('user_id', '=', $id));
					if(!$hashCheck->calRows()){
						$this->_db->insert('users_session', array(
							'user_id' => $id,
							'hash' => $hash));
					} else {
						$hash= $hashCheck->first()->hash;
					}
					Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
				}
				$this->_isLoggedIn = true;
				return true;
			}
		}
		return false;
	}

	public function exists(){
		return (!empty($this->_data))?true:false;
	}



	public function data(){
		return $this->_data;
	}

	public function isLoggedIn(){
		return $this->_isLoggedIn;
	}

	public function logout(){
		$this->_db->delete('users_session', array('user_id', '=', $this->data()->id));
		Session::delete($this->_sessionName);
		if(Cookie::exists($this->_cookieName)){
			Cookie::delete($this->_cookieName);
		}
		$this->_isLoggedIn = false;
	}

	public function update($fields = array(), $id = null){
		if(!$id && $this->isLoggedIn()){
			$id = $this->data()->id;
		}
		if(!$this->_db->update('users', $id, $fields)){
			throw new Exception('There was a problem udpating');
		}
	}

	public function hasPermission($key){
		$group = $this->_db->get('groups', array('id', '=', $this->data()->group));
		if($group->calRows()){
			$permissions = json_decode($group->first()->permissions, true);
			if($permission[$key] == true){
				return true;
			}
		}
		return false;
	}
}


?>