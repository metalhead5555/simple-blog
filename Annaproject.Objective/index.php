<?php		
	require_once 'admin/Application.class.php';
	require_once 'libs/Smarty.class.php';
	Application::Configurate(['dbname'=>'annadb',
							  'imgdir'=>'img/',
							  'srcdir'=>'src/'
							]);

	Application::Start();
?>