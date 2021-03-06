<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-03-15 20:37
 */
interface PostsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Posts 
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
 	 * @param post primary key
 	 */
	public function delete($id_posts);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Posts post
 	 */
	public function insert($post);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Posts post
 	 */
	public function update($post);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTitlePosts($value);

	public function queryByDataPosts($value);

	public function queryByCategoryPosts($value);

	public function queryByImagePosts($value);

	public function queryByAuthorPosts($value);

	public function queryByContentPosts($value);


	public function deleteByTitlePosts($value);

	public function deleteByDataPosts($value);

	public function deleteByCategoryPosts($value);

	public function deleteByImagePosts($value);

	public function deleteByAuthorPosts($value);

	public function deleteByContentPosts($value);


}
?>