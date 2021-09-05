<?php   
require_once 'cors.php';  
  require_once 'db.php';  
  $response = array();  
  set_error_handler("customError");

  if(isset($_GET['apicall'])){  
  switch($_GET['apicall']){ 

    // if(isset($_GET['Regd_ID'])){  
    // switch($_GET['Regd_ID']){ 

  case 'admin_l':  
    if($data){
      // if(1==1){
      // $data=array();
      $email = $data['email'];
      $pasword = $data['pass'];
      
      $qa="SELECT * FROM admin  where email='$email' and password='$pasword'";
     
      
      $qa1=mysqli_query($conn,$qa);
      $id=0;
      while($row=@mysqli_fetch_assoc($qa1)){
        $id=$row["aid"];
        $name=$row["name"];
      }
        if(@mysqli_num_rows($qa1)>0){	             
          $response['error'] = false;   
          $response['message'] = "ok";   
          $response['val'] = 22;   
          $response['id'] = $id;   
          $response['name'] = $name;	
        }else{
          $response['error'] = false;   
          $response['message'] = 0;
          $response['val'] = 0;   
          $response['id'] = $id;  
          $response['data'] = $qa;
        }
     
   
      } else{
        $response['error'] = true;   
        $response['message'] = 'required parameters are not available';
      }
    break;
    
  case 'cd':  
    if(isTheseParametersAvailable(array('cd'))){
      // if(1==1){
      $data=array();
      $cd = $_POST['cd'];
      $filename="d.txt";
     
     
      $arr = json_decode($cd, true);
      foreach($arr as $item) { //foreach element in $arr
        
        $id = $item['id']; 
       
        $nm = $item['nm']; 
        $nu = $item['nu']; 
        $am = $item['am']; 
        $dt = $item['dt']; 

        $qa="SELECT id FROM clients  where id='$id'";
        $cd = $qa;
        
        $qa1=mysqli_query($conn,$qa);
          if(@mysqli_num_rows($qa1)<1){	
                    
            $qb="insert into clients (id,name,number,amount,dt) values('$id','$nm','$nu','$am','$dt')";

            $cd = $qb;
            if($qb1=mysqli_query($conn,$qb)){
              $cd = "added";
              $response['error'] = false;
              $response['code'] = 2;									
              $cd = 'added';
              
              }				
          }

       
            
        }
  
        file_put_contents($filename, $cd);
      } else{
        $response['error'] = true;   
        $response['message'] = 'required parameters are not available';
        $filename="d.txt"; 
        file_put_contents($filename, $response['message']);
      }
    break;
default:   
 $response['error'] = true;   
 $response['message'] = 'Invalid Operation Called';  
}  
}  
else{  
 $response['error'] = true;   
 $response['message'] = 'Invalid API Call';  
  } 
  
try
{
    echo json_encode($response);
    // echo "s".$response;
}
catch (ErrorException $e)
{
    // do some thing with $e->getMessage()
	$response['message']=$e->getMessage();
  echo json_encode($response);
 
}
  
function customError($errno, $errstr) {
  echo "<b>Error:</b> [$errno] $errstr";
}

function isTheseParametersAvailable($params){  
foreach($params as $param){  
 if(!isset($_POST[$param])){  
     return false;   
  }  
}  
return true;   
}  

function mType($id,$conn){  
	$qb="select type from units where id='$id'";
	$qb1=mysqli_query($conn,$qb);
	if(@mysqli_num_rows($qb1)>0){
			while($row=@mysqli_fetch_assoc($qb1)){
			$type=$row["type"];
		}
		return $type;
	}else{
		return "null";
	}			
}
function mImgz($id,$conn){  
	$qb="select name from img where pnm='$id'";
	$qb1=mysqli_query($conn,$qb);
	if(@mysqli_num_rows($qb1)>0){
			while($row=@mysqli_fetch_assoc($qb1)){
			$type=$row["name"];
		}
		return $type;
	}else{
		return "null";
	}			
}
function mUp($id,$type,$conn){  
	$qb="select type from units where id='$id'&& type='$type'";
	$qb1=mysqli_query($conn,$qb);
	if(@mysqli_num_rows($qb1)>0){
		
		return true;
	}else{
		return false;
	}			
}
 function column_into_keys(array $array): array {

  // get the name of the column that contains the record id
  $key = key($array[0]);

  foreach($array as $row) {

      // pop the new key off the top of the array
      $id = array_shift($row);

      // is there only one item left in the array?
      if (count($row) == 1)
          // get the first value
          $result[$id] = current($row);
      else
          // get all of the values
          $result[$id] = $row;
  }

  return $result;
}
?>  