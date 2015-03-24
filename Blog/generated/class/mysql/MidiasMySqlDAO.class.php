<?php
/**
 * Class that operate on table 'midias'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-03-15 20:37
 */
class MidiasMySqlDAO implements MidiasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MidiasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM midias WHERE id_midias = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM midias';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM midias ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param midia primary key
 	 */
	public function delete($id_midias){
		$sql = 'DELETE FROM midias WHERE id_midias = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_midias);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MidiasMySql midia
 	 */
	public function insert($midia){
		$sql = 'INSERT INTO midias (filePath_midias, author_midias, data_midias) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($midia->filePathMidias);
		$sqlQuery->set($midia->authorMidias);
		$sqlQuery->set($midia->dataMidias);

		$id = $this->executeInsert($sqlQuery);	
		$midia->idMidias = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MidiasMySql midia
 	 */
	public function update($midia){
		$sql = 'UPDATE midias SET filePath_midias = ?, author_midias = ?, data_midias = ? WHERE id_midias = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($midia->filePathMidias);
		$sqlQuery->set($midia->authorMidias);
		$sqlQuery->set($midia->dataMidias);

		$sqlQuery->setNumber($midia->idMidias);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM midias';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByFilePathMidias($value){
		$sql = 'SELECT * FROM midias WHERE filePath_midias = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAuthorMidias($value){
		$sql = 'SELECT * FROM midias WHERE author_midias = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataMidias($value){
		$sql = 'SELECT * FROM midias WHERE data_midias = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByFilePathMidias($value){
		$sql = 'DELETE FROM midias WHERE filePath_midias = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAuthorMidias($value){
		$sql = 'DELETE FROM midias WHERE author_midias = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataMidias($value){
		$sql = 'DELETE FROM midias WHERE data_midias = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MidiasMySql 
	 */
	protected function readRow($row){
		$midia = new Midia();
		
		$midia->idMidias = $row['id_midias'];
		$midia->filePathMidias = $row['filePath_midias'];
		$midia->authorMidias = $row['author_midias'];
		$midia->dataMidias = $row['data_midias'];

		return $midia;
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
	 * @return MidiasMySql 
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