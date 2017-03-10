<?php
	mysql_connect('localhost', 'root', 'ht');
	mysql_select_db('db_test');

	if(!is_writable('./uploads'))
	{
		echo 'Please, create folder <b>uploads</b> and chmod 777';
		exit();
	}
?>