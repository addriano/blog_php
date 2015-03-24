<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-03-15 20:37
 */
interface UsersDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Users 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param user primary key
 	 */
	public function delete($id_users);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Users user
 	 */
	public function insert($user);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Users user
 	 */
	public function update($user);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNameUsers($value);

	public function queryByPasswordUsers($value);

	public function queryByEmailUsers($value);

	public function queryByThumbUsers($value);


	public function deleteByNameUsers($value);

	public function deleteByPasswordUsers($value);

	public function deleteByEmailUsers($value);

	public function deleteByThumbUsers($value);


}
?>