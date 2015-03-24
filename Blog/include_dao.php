<?php
	//include all DAO files
	require_once('class/sql/Connection.class.php');
	require_once('class/sql/ConnectionFactory.class.php');
	require_once('class/sql/ConnectionProperty.class.php');
	require_once('class/sql/QueryExecutor.class.php');
	require_once('class/sql/Transaction.class.php');
	require_once('class/sql/SqlQuery.class.php');
	require_once('class/core/ArrayList.class.php');
	require_once('class/dao/DAOFactory.class.php');
 	
	require_once('class/dao/CategoryDAO.class.php');
	require_once('class/dto/Category.class.php');
	require_once('class/mysql/CategoryMySqlDAO.class.php');
	require_once('class/mysql/ext/CategoryMySqlExtDAO.class.php');
	require_once('class/dao/MidiasDAO.class.php');
	require_once('class/dto/Midia.class.php');
	require_once('class/mysql/MidiasMySqlDAO.class.php');
	require_once('class/mysql/ext/MidiasMySqlExtDAO.class.php');
	require_once('class/dao/PostsDAO.class.php');
	require_once('class/dto/Post.class.php');
	require_once('class/mysql/PostsMySqlDAO.class.php');
	require_once('class/mysql/ext/PostsMySqlExtDAO.class.php');
	require_once('class/dao/UsersDAO.class.php');
	require_once('class/dto/User.class.php');
	require_once('class/mysql/UsersMySqlDAO.class.php');
	require_once('class/mysql/ext/UsersMySqlExtDAO.class.php');

?>