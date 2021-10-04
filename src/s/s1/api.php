<?php   
require_once 'cors.php';  
  require_once 'db.php';  
  $response = array();  
  set_error_handler("customError");

  if(isset($_GET['apicall'])){  
  switch($_GET['apicall']){ 

    // if(isset($_GET['Regd_ID'])){  
    // switch($_GET['Regd_ID']){ 
      case 'del_m':  
        if($data){
          // if(1==1){
          // $data=array();
          $id = $data['id'];
          // $pasword = $data['pass'];
          
          $qb="DELETE FROM products WHERE pid='$id'";
          $qb1=mysqli_query($conn,$qb);
          $qa="SELECT * FROM admin  where pid='$id'";
          
        
          sleep(3);
          $qa1=mysqli_query($conn,$qa);
            if($qa1){	             
              $response['error'] = true;   
              $response['message'] = "present";   
              $response['val'] = 2;   
              $response['id'] = $id;   	
            }else{
              $response['error'] = false;   
              $response['message'] = "Deleted";
              $response['val'] = 22;   
              $response['id'] = $id;  
              $response['data'] = $qa1;
            }
         
       
          } else{
            $response['error'] = true;   
            $response['message'] = 'required parameters are not available';
          }
        break;

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
          
        case 'a_cart':  
          if($data){
            // if(1==1){
            // $data=array();
            $mc = $data['mc'];

            $qa = 'SELECT *  FROM `products`  WHERE `pid` IN (' . implode(',', array_map('intval', $mc)) . ')';

            // $qa="SELECT * FROM products ";
            $qa1=mysqli_query($conn,$qa);
            // $mData=array();
            // $mDataI=array();
            $mOb=[];
            $x=0;
           
            while($row=@mysqli_fetch_assoc($qa1)){
              // $mData[$x]=$row;
              $img=$row["img"];
              $mOb[$x]["pro"]=$row;
              $qb="SELECT * FROM images where mid='".$img."'";
              $qb1=mysqli_query($conn,$qb);
              $x1=0;
              while($row1=@mysqli_fetch_assoc($qb1)){
                
                // $mData[$x][$x1]=$row1;
                $mOb[$x]["im"][$x1]=$row1;
                $x1=$x1+1;
              }
              // $mData[]["img"]=$mDataI[];
              $x=$x+1;
          }
              if(@mysqli_num_rows($qa1)>0){	             
                $response['error'] = false;   
                $response['message'] = "ok";   
                $response['val'] = 2;   
                // $response['id'] = $id;   
                // $response['name'] = $name;	
                  
                $response['data'] = $mOb;
              }else{
                $response['error'] = true;   
                $response['message'] = 0;
                $response['val'] = 0;   
                // $response['id'] = $id;  
                $response['data'] = $qa;
              }
           
         
            } else{
              $response['error'] = true;   
              $response['message'] = 'required parameters are not available';
            }
          break;
          
          case 'a_search':  
            if($data){
              // if(1==1){
              // $data=array();
              // if(isset($search)&& $search!==" "&& $search!=="")
              $search = $data['search'];
  
              $qa = "SELECT * FROM products WHERE description like '%$search%' or name LIKE '%$search%' ";
  
              // $qa="SELECT * FROM products ";
              $qa1=mysqli_query($conn,$qa);
              $mData=array();
           
              // $mDataI=array();
           
              $x=0;
              if(@mysqli_num_rows($qa1)>0){	
                $row=@mysqli_fetch_assoc($qa1); 
                array_push($mData,$row);
              while($row=@mysqli_fetch_assoc($qa1)){
               
                array_push($mData,$row);
                // $mData[$x]=$row;
                // $name=$row["name"];
                // $description=$row["description"];
  
            }
            $response['error'] = false;   
            $response['message'] = "ok";   
            $response['val'] = 2;   
            // $response['id'] = $id;   
            // $response['name'] = $name;	
              
            $response['data'] =$mData;
  
          }else{
                  $response['error'] = true;   
                  $response['message'] = 0;
                  $response['val'] = 0;   
                  // $response['id'] = $id;  
                  $response['data'] ="not present";
                }
             
           
              } else{
                $response['error'] = true;   
                $response['message'] = 'required parameters are not available';
              }
            break;
            
        case 'a_search_moto':  
          if($data){
            // if(1==1){
            // $data=array();
            // if(isset($search)&& $search!==" "&& $search!=="")
            $search = $data['search'];

            $qa = "SELECT * FROM products WHERE description like '%$search%' and type='Motocycle' or name LIKE '%$search%' and type='Motocycle' ";

            // $qa="SELECT * FROM products ";
            $qa1=mysqli_query($conn,$qa);
            $mData=array();
         
            // $mDataI=array();
         
            $x=0;
            if(@mysqli_num_rows($qa1)>0){	
              $row=@mysqli_fetch_assoc($qa1); 
              array_push($mData,$row);
            while($row=@mysqli_fetch_assoc($qa1)){
             
              array_push($mData,$row);
              // $mData[$x]=$row;
              // $name=$row["name"];
              // $description=$row["description"];

          }
          $response['error'] = false;   
          $response['message'] = "ok";   
          $response['val'] = 2;   
          // $response['id'] = $id;   
          // $response['name'] = $name;	
            
          $response['data'] =$mData;

        }else{
                $response['error'] = true;   
                $response['message'] = 0;
                $response['val'] = 0;   
                // $response['id'] = $id; 
                
                $response['data1'] =$qa; 
                $response['data'] ="not present";
              }
           
         
            } else{
              $response['error'] = true;   
              $response['message'] = 'required parameters are not available';
            }
          break;
           
        case 'a_search_spare':  
         if($data){
            // if(1==1){
            // $data=array();
            // if(isset($search)&& $search!==" "&& $search!=="")
            $search = $data['search'];
            $qa = "SELECT * FROM products WHERE description like '%$search%' and type='Spareparts' or name LIKE '%$search%'and type='Spareparts'";

            // $qa="SELECT * FROM products ";
            $qa1=mysqli_query($conn,$qa);
            $mData=array();
         
            // $mDataI=array();
         
            $x=0;
            if(@mysqli_num_rows($qa1)>0){	
              $row=@mysqli_fetch_assoc($qa1); 
              array_push($mData,$row);
            while($row=@mysqli_fetch_assoc($qa1)){
             
              array_push($mData,$row);

            }
            $response['error'] = false;   
            $response['message'] = "ok";   
            $response['val'] = 2;   
            // $response['id'] = $id;   
            // $response['name'] = $name;	
              
            $response['data'] =$mData;

       }else{
                $response['error'] = true;   
                $response['message'] = 0;
                $response['val'] = 0;   
                // $response['id'] = $id;  
                $response['data'] =$qa;
              }
           
         
            } else{
              $response['error'] = true;   
              $response['message'] = 'required parameters are not available';
            }
          break;
            
  case 'a_m1':  
    if($data){
      // if(1==1){
      // $data=array();
      // $email = $data['email'];
      // $pasword = $data['pass'];
      
      $nm = $data['nm'];
      $qa="SELECT * FROM products where name LIKE '%$nm%' and type='Motocycle'";
      $qa1=mysqli_query($conn,$qa);
      // $mData=array();
      // $mDataI=array();
      $mOb=[];
      $x=0;
     
      while($row=@mysqli_fetch_assoc($qa1)){
        // $mData[$x]=$row;
        $img=$row["img"];
        $mOb[$x]["pro"]=$row;
        $qb="SELECT * FROM images where mid='".$img."'";
        $qb1=mysqli_query($conn,$qb);
        $x1=0;
        while($row1=@mysqli_fetch_assoc($qb1)){
          
          // $mData[$x][$x1]=$row1;
          $mOb[$x]["im"][$x1]=$row1;
          $x1=$x1+1;
        }
        // $mData[]["img"]=$mDataI[];
        $x=$x+1;
		}
        if(@mysqli_num_rows($qa1)>0){	             
          $response['error'] = false;   
          $response['message'] = "ok";   
          $response['val'] = 2;   
          // $response['id'] = $id;   
          // $response['name'] = $name;	
            
          $response['data'] = $mOb;
        }else{
          $response['error'] = false;   
          $response['message'] = 0;
          $response['val'] = 0;   
          // $response['id'] = $id;  
          $response['data'] = $qa1;
        }
     
   
      } else{
        $response['error'] = true;   
        $response['message'] = 'required parameters are not available';
      }
    break;
                  
  case 'a_s1':  
    if($data){
      // if(1==1){
      // $data=array();
      // $email = $data['email'];
      // $pasword = $data['pass'];
      
      $nm = $data['nm'];
      $qa="SELECT * FROM products where name LIKE '%$nm%' and type='Spareparts'";
      $qa1=mysqli_query($conn,$qa);
      // $mData=array();
      // $mDataI=array();
      $mOb=[];
      $x=0;
     
      while($row=@mysqli_fetch_assoc($qa1)){
        // $mData[$x]=$row;
        $img=$row["img"];
        $mOb[$x]["pro"]=$row;
        $qb="SELECT * FROM images where mid='".$img."'";
        $qb1=mysqli_query($conn,$qb);
        $x1=0;
        while($row1=@mysqli_fetch_assoc($qb1)){
          
          // $mData[$x][$x1]=$row1;
          $mOb[$x]["im"][$x1]=$row1;
          $x1=$x1+1;
        }
        // $mData[]["img"]=$mDataI[];
        $x=$x+1;
		}
        if(@mysqli_num_rows($qa1)>0){	             
          $response['error'] = false;   
          $response['message'] = "ok";   
          $response['val'] = 2;   
          // $response['id'] = $id;   
          // $response['name'] = $name;	
            
          $response['data'] = $mOb;
        }else{
          $response['error'] = false;   
          $response['message'] = 0;
          $response['val'] = 0;   
          // $response['id'] = $id;  
          $response['data'] = $qa1;
        }
     
   
      } else{
        $response['error'] = true;   
        $response['message'] = 'required parameters are not available';
      }
    break;
           
  case 'a_moto':  
    if($data){
      // if(1==1){
      // $data=array();
      // $email = $data['email'];
      // $pasword = $data['pass'];
      
      $qa="SELECT * FROM products where type='Motocycle'";
      $qa1=mysqli_query($conn,$qa);
      // $mData=array();
      // $mDataI=array();
      $mOb=[];
      $x=0;
     
      while($row=@mysqli_fetch_assoc($qa1)){
        // $mData[$x]=$row;
        $img=$row["img"];
        $mOb[$x]["pro"]=$row;
        $qb="SELECT * FROM images where mid='".$img."'";
        $qb1=mysqli_query($conn,$qb);
        $x1=0;
        while($row1=@mysqli_fetch_assoc($qb1)){
          
          // $mData[$x][$x1]=$row1;
          $mOb[$x]["im"][$x1]=$row1;
          $x1=$x1+1;
        }
        // $mData[]["img"]=$mDataI[];
        $x=$x+1;
		}
        if(@mysqli_num_rows($qa1)>0){	             
          $response['error'] = false;   
          $response['message'] = "ok";   
          $response['val'] = 2;   
          // $response['id'] = $id;   
          // $response['name'] = $name;	
            
          $response['data'] = $mOb;
        }else{
          $response['error'] = false;   
          $response['message'] = 0;
          $response['val'] = 0;   
          // $response['id'] = $id;  
          $response['data'] = $qa1;
        }
     
   
      } else{
        $response['error'] = true;   
        $response['message'] = 'required parameters are not available';
      }
    break;
 
          
  case 'a_spare':  
    if($data){
      // if(1==1){
      // $data=array();
      // $email = $data['email'];
      // $pasword = $data['pass'];
      
      $qa="SELECT * FROM products where type='Spareparts'";
      $qa1=mysqli_query($conn,$qa);
      // $mData=array();
      // $mDataI=array();
      $mOb=[];
      $x=0;
     
      while($row=@mysqli_fetch_assoc($qa1)){
        // $mData[$x]=$row;
        $img=$row["img"];
        $mOb[$x]["pro"]=$row;
        $qb="SELECT * FROM images where mid='".$img."'";
        $qb1=mysqli_query($conn,$qb);
        $x1=0;
        while($row1=@mysqli_fetch_assoc($qb1)){
          
          // $mData[$x][$x1]=$row1;
          $mOb[$x]["im"][$x1]=$row1;
          $x1=$x1+1;
        }
        // $mData[]["img"]=$mDataI[];
        $x=$x+1;
		}
        if(@mysqli_num_rows($qa1)>0){	             
          $response['error'] = false;   
          $response['message'] = "ok";   
          $response['val'] = 2;   
          // $response['id'] = $id;   
          // $response['name'] = $name;	
            
          $response['data'] = $mOb;
        }else{
          $response['error'] = false;   
          $response['message'] = 0;
          $response['val'] = 0;   
          // $response['id'] = $id;  
          $response['data'] = $qa1;
        }
     
   
      } else{
        $response['error'] = true;   
        $response['message'] = 'required parameters are not available';
      }
    break;

case 'a_up':
  // $all=file_get_contents('php://input');
  // echo "all: ".extract($_POST);
  if(isTheseParametersAvailable(array('nm'))){
    
    $nm=$_POST["nm"];
    $desc=$_POST["desc"];
    $type=$_POST["type"];
    $am=$_POST["am"];
    // $un=
    // $pr=$_POST["pr"];
    // $co=$_POST["co"];
    // $sb=$_POST["sb"];
    // $lo=$_POST["lo"];



    function file_already_uploaded($file_name,$c)
   {
    $query1 = "SELECT * FROM products WHERE img = '".$file_name."'";
    $qb3=mysqli_query($c,$query1);
  
    if(@mysqli_num_rows($qb3)>0)
    {
     return true;
    }
    else
    {
     return false;
    }
   }
  // var_dump($data);
  
    $mArray=array();
    $q1 = "Select * from images   ORDER BY id DESC limit 1";
    $mid=0;
    $q1a=mysqli_query($conn,$q1);
    if(@mysqli_num_rows($q1a)>0){
			while($row=@mysqli_fetch_assoc($q1a)){
        $mid=$row["id"];
		}
	}
    $mid=$mid+1;

    sleep(3);

    for($count=0; $count<count($_FILES["files"]["name"]); $count++)
    {
     $file_name = $_FILES["files"]["name"][$count];
     $tmp_name = $_FILES["files"]['tmp_name'][$count];
     $file_array = explode(".", $file_name);
     $file_extension = end($file_array);
     $c=$conn;
     if(file_already_uploaded($file_name,$c))
     {
      $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
     }
    // $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
     
   if(!is_dir('files/'.$nm)){
     mkdir('files/'.$nm);
   }
     $location = 'files/'.$nm.'/'. $file_name;
     
      
    
     if(move_uploaded_file($tmp_name, $location))
     {

      array_push($mArray,$location);
     

      $query = "
      INSERT INTO images (loc, mid) 
      VALUES ('".$location."','".$mid."')";

      $qb2=mysqli_query($conn,$query);
      
      $response['message'] = 'failed uploaded';
     }else{
      $response['message'] = 'error failed upload';
      //  echo"error failed upload";
     }
    }
 
  
    
    // $q1 = "INSERT INTO property (name, unit, price,co,sb,lo) VALUES ('".$nm."', '".$un."', '".$pr."', '".$co."', '".$sb."', '".$lo."' )";

    $query = "INSERT INTO products (img, price,description,type,name) VALUES ('".$mid."','".$am."','".$desc."','".$type."','".$nm."')";
    $qb1=mysqli_query($conn,$query);

    if($qb1){
      $response['message'] = $query;
    }

    // $response['message'] = $_FILES;
  }else{  
    $response['error'] = true;   
    $response['message'] = 'required parameters are not available1';   
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