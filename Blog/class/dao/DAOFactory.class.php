<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return CategoryDAO
	 */
	public static function getCategoryDAO(){
		return new CategoryMySqlExtDAO();
	}

	/**
	 * @return MidiasDAO
	 */
	public static function getMidiasDAO(){
		return new MidiasMySqlExtDAO();
	}

	/**
	 * @return PostsDAO
	 */
	public static function getPostsDAO(){
		return new PostsMySqlExtDAO();
	}

	/**
	 * @return UsersDAO
	 */
	public static function getUsersDAO(){
		return new UsersMySqlExtDAO();
	}


}
?>