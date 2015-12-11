<?php 

//bismillah

/**
 * @param this function main data transfer center
 * 
 */
function sql($sql,$args = [])
{
	try{

		$db = new PDO("mysql:host=localhost;dbname="database name","username","password");
		//sorgumuz $query içine $db ile beraber hazırlanıyor
		$query = $db->prepare($sql);
		//$query $args ile execute ediliyor
		$query->execute($args);
		//$collection içine bütün data çekiliyor
		$collection = $query->fetchAll(PDO::FETCH_OBJ);
		
		return $collection;
		
	}
	catch (PDOexception $e){

		print $e->getMessage();

	}
}

/**
*
*@param 
*
*sent data db
*succesfull running
*/



function sentData(){


       
		
		return sql('Insert into yazilar(head,text) Values(?,?)',[$_POST['inputHead'],$_POST['textAreaBox']]);
	

}

/**
*
*@param 
*
*gel all data db
*succesfull running
*/

function getData(){

	try {

		return $data=sql('select * from yazilar ');
		
	} catch (Exception $e) {
		
		echo $e;
	}

	
	

}

/**
*
*@param 
*
*update data db
*succesFull running
*/

function updateData($id){


$head=$_POST['inputHead'];
$text=$_POST['textAreaBox'];


///$head="deneme";
//$text="test test test test test test test test test test test test test test test test test test ";

	try {
		sql("UPDATE `yazilar` SET `head`='$head' , `text`='$text' WHERE  `id`=? ",[$id]);

		
	} catch (Exception $e) {
		
		echo $e;		

	}



}


/**
*
*@param 
*
*delete data db
*succesfull running
*/

function deleteData($i){



	try {
		sql(" DELETE FROM yazilar  WHERE id=? ",[$i]);
		
		
	} catch (Exception $e) {

		echo $e;
		
	}

}

/**
*
*
*@param this function login from db 
*
*
*/
function loginSql(){

	try {
		
		return sql('select * from uyeler');
	} catch (Exception $e) {

		print_r($e);
	}


}

/**
*
*
*@param this function return data on table yazilar from db
*
*
**/


function searchId($id){

	

	return sql("SELECT * FROM yazilar WHERE id LIKE ?",[$id]);


}


/**
*
*@param this function return user ip from db
*
*/



function searchIp($string){

	

	$_data=sql("SELECT * FROM clientcount WHERE clientip LIKE ?",[$string]);

	 return $_data;


}


include ('controller.php');

/**
*
*@param this function control from user ip return true or false
*/

function _checkip(){




	

$data=searchIp(getUserIp());


		foreach ($data as $key) {
			# code...




				if($key->clientip==getUserIp()){

				return $bool=true;

				}
				else return $bool=false;
		}

}



/**
*
*@param this function  like (data sent)
*
*
*
**/


//function 




//TESTER AREA.......!


//searchIp('127.0.0.1');
//functions tester area....

/*for ($i=0; $i < 10; $i++) { 
	
	$head=$i." başlık";
	$text="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

sentData($head,$text);
echo $i." kayıt başarılı..";


}
*/



