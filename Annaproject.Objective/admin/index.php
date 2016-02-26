<?php		
	require_once 'Annaproject.class.php';
	require_once '../libs/Smarty.class.php';
	Application::Configurate(['dbname'=>'annadb',
							  'imgdir'=>'../img/',
							  'srcdir'=>'src/'
							]);
	Application::Start();
?>