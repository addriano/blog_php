<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-03-15 20:37
 */
interface MidiasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Midias 
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
 	 * @param midia primary key
 	 */
	public function delete($id_midias);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Midias midia
 	 */
	public function insert($midia);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Midias midia
 	 */
	public function update($midia);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByFilePathMidias($value);

	public function queryByAuthorMidias($value);

	public function queryByDataMidias($value);


	public function deleteByFilePathMidias($value);

	public function deleteByAuthorMidias($value);

	public function deleteByDataMidias($value);


}
?>