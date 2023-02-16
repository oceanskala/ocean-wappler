<?php 
try {
	$db=new PDO("mysql:host=185.46.53.72;dbname=admin_devodb;charset=utf8mb4",'admin_devodbuser','BHOdi2v3yD');
	//echo "veritabanı bağlantısı başarılı";
}catch (PDOException $e) {
	echo $e->getMessage();
}


 ?>