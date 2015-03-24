<?php
/**
 * Class that operate on table 'users'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-03-15 20:37
 */
class UsersMySqlDAO implements UsersDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsersMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM users WHERE id_users = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM users';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM users ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param user primary key
 	 */
	public function delete($id_users){
		$sql = 'DELETE FROM users WHERE id_users = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_users);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsersMySql user
 	 */
	public function insert($user){
		$sql = 'INSERT INTO users (name_users, password_users, email_users, thumb_users) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($user->nameUsers);
		$sqlQuery->set($user->passwordUsers);
		$sqlQuery->set($user->emailUsers);
		$sqlQuery->set($user->thumbUsers);

		$id = $this->executeInsert($sqlQuery);	
		$user->idUsers = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsersMySql user
 	 */
	public function update($user){
		$sql = 'UPDATE users SET name_users = ?, password_users = ?, email_users = ?, thumb_users = ? WHERE id_users = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($user->nameUsers);
		$sqlQuery->set($user->passwordUsers);
		$sqlQuery->set($user->emailUsers);
		$sqlQuery->set($user->thumbUsers);

		$sqlQuery->setNumber($user->idUsers);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM users';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNameUsers($value){
		$sql = 'SELECT * FROM users WHERE name_users = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPasswordUsers($value){
		$sql = 'SELECT * FROM users WHERE password_users = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmailUsers($value){
		$sql = 'SELECT * FROM users WHERE email_users = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByThumbUsers($value){
		$sql = 'SELECT * FROM users WHERE thumb_users = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNameUsers($value){
		$sql = 'DELETE FROM users WHERE name_users = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPasswordUsers($value){
		$sql = 'DELETE FROM users WHERE password_users = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmailUsers($value){
		$sql = 'DELETE FROM users WHERE email_users = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByThumbUsers($value){
		$sql = 'DELETE FROM users WHERE thumb_users = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UsersMySql 
	 */
	protected function readRow($row){
		$user = new User();
		
		$user->idUsers = $row['id_users'];
		$user->nameUsers = $row['name_users'];
		$user->passwordUsers = $row['password_users'];
		$user->emailUsers = $row['email_users'];
		$user->thumbUsers = $row['thumb_users'];

		return $user;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return UsersMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>