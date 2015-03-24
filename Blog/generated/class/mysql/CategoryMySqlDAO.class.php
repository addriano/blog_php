<?php
/**
 * Class that operate on table 'category'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-03-15 20:37
 */
class CategoryMySqlDAO implements CategoryDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CategoryMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM category WHERE id_category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM category';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM category ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param category primary key
 	 */
	public function delete($id_category){
		$sql = 'DELETE FROM category WHERE id_category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_category);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CategoryMySql category
 	 */
	public function insert($category){
		$sql = 'INSERT INTO category (name_category, description_category) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($category->nameCategory);
		$sqlQuery->set($category->descriptionCategory);

		$id = $this->executeInsert($sqlQuery);	
		$category->idCategory = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CategoryMySql category
 	 */
	public function update($category){
		$sql = 'UPDATE category SET name_category = ?, description_category = ? WHERE id_category = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($category->nameCategory);
		$sqlQuery->set($category->descriptionCategory);

		$sqlQuery->setNumber($category->idCategory);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM category';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNameCategory($value){
		$sql = 'SELECT * FROM category WHERE name_category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescriptionCategory($value){
		$sql = 'SELECT * FROM category WHERE description_category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNameCategory($value){
		$sql = 'DELETE FROM category WHERE name_category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescriptionCategory($value){
		$sql = 'DELETE FROM category WHERE description_category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CategoryMySql 
	 */
	protected function readRow($row){
		$category = new Category();
		
		$category->idCategory = $row['id_category'];
		$category->nameCategory = $row['name_category'];
		$category->descriptionCategory = $row['description_category'];

		return $category;
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
	 * @return CategoryMySql 
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