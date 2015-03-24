<?php
/**
 * Class that operate on table 'posts'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-03-15 20:37
 */
class PostsMySqlDAO implements PostsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PostsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM posts WHERE id_posts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM posts';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	public function queryLimit($Limit){
		$sql = 'SELECT * FROM posts LIMIT' . $Limit;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM posts ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param post primary key
 	 */
	public function delete($id_posts){
		$sql = 'DELETE FROM posts WHERE id_posts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_posts);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PostsMySql post
 	 */
	public function insert($post){
		$sql = 'INSERT INTO posts (title_posts, data_posts, category_posts, image_posts, author_posts, content_posts) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($post->titlePosts);
		$sqlQuery->set($post->dataPosts);
		$sqlQuery->setNumber($post->categoryPosts);
		$sqlQuery->set($post->imagePosts);
		$sqlQuery->setNumber($post->authorPosts);
		$sqlQuery->set($post->contentPosts);

		$id = $this->executeInsert($sqlQuery);	
		$post->idPosts = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PostsMySql post
 	 */
	public function update($post){
		$sql = 'UPDATE posts SET title_posts = ?, data_posts = ?, category_posts = ?, image_posts = ?, author_posts = ?, content_posts = ? WHERE id_posts = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($post->titlePosts);
		$sqlQuery->set($post->dataPosts);
		$sqlQuery->setNumber($post->categoryPosts);
		$sqlQuery->set($post->imagePosts);
		$sqlQuery->setNumber($post->authorPosts);
		$sqlQuery->set($post->contentPosts);

		$sqlQuery->setNumber($post->idPosts);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM posts';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTitlePosts($value){
		$sql = 'SELECT * FROM posts WHERE title_posts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataPosts($value){
		$sql = 'SELECT * FROM posts WHERE data_posts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCategoryPosts($value){
		$sql = 'SELECT * FROM posts WHERE category_posts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImagePosts($value){
		$sql = 'SELECT * FROM posts WHERE image_posts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAuthorPosts($value){
		$sql = 'SELECT * FROM posts WHERE author_posts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContentPosts($value){
		$sql = 'SELECT * FROM posts WHERE content_posts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTitlePosts($value){
		$sql = 'DELETE FROM posts WHERE title_posts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataPosts($value){
		$sql = 'DELETE FROM posts WHERE data_posts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCategoryPosts($value){
		$sql = 'DELETE FROM posts WHERE category_posts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImagePosts($value){
		$sql = 'DELETE FROM posts WHERE image_posts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAuthorPosts($value){
		$sql = 'DELETE FROM posts WHERE author_posts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContentPosts($value){
		$sql = 'DELETE FROM posts WHERE content_posts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PostsMySql 
	 */
	protected function readRow($row){
		$post = new Post();
		
		$post->idPosts = $row['id_posts'];
		$post->titlePosts = $row['title_posts'];
		$post->dataPosts = $row['data_posts'];
		$post->categoryPosts = $row['category_posts'];
		$post->imagePosts = $row['image_posts'];
		$post->authorPosts = $row['author_posts'];
		$post->contentPosts = $row['content_posts'];

		return $post;
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
	 * @return PostsMySql 
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