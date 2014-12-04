

    
    <head>
        
      </head>
      
      <body>
          
      <form action="" method="POST">
          
      <table border="3">

       <tr> 
           <td><label>Name</label></td>
           <td><input type="text" name="name"></td>
            
           <td><label>Username</label></td>
           <td><input type="text" name="username"></td>
           
            <td><label>Password</label></td>
            <td><input type="password" name="password"></td>
           
           <td><label>Message</label></td>
           <td><input type="text" name="message"></td> 
           
           <td><input type="submit" name="submit" value="Submit"></td>    
       </tr>    
    
      </table>  
          
      </form>   
          
    </body>
    









<?php

require('config.php');

class users
{

public $id,$name,$username,$password,$message;

}

try{

    $form = $_POST ;
    
    
    if(isset($form['submit']))
    {
                
        $name  = trim($form['name']);
        $uname = trim($form['username']);
        $pass  = trim($form['password']);    
        $msg   = trim($form['message']);
        
        $err_msg=array();
        
        if(empty($name) || empty($uname) || empty($pass) || empty($msg)  )
            {
            
            echo $err_msg="Please fill all the form fields" ;
            
            }

else
    {
        $result=$connection->prepare('INSERT INTO users(`id`,`name`,`username`,`password`,`message`) VALUES (:id,:name,:username,:password,:message)');
        $result->execute(array(':id'=>NULL ,':name'=>$name,':username'=>$uname,':password'=>$pass,':message'=>$msg));

        $select =$connection->query('SELECT name,username,password FROM users');
        $print=$select->fetchAll(PDO::FETCH_ASSOC);
        
       $json = json_decode($print); 
       print $json;
    }
    
    }
    
$query =$connection->query('SELECT * FROM users LIMIT 0,30');
$query->setFetchMode(PDO::FETCH_CLASS,'users');
while($read = $query->fetch())
{
echo '<pre>',print_r($read),'</pre>';

echo date('Y-m-d H:i:s');
}


}
catch(PDOException $j)
{


$date = date('d.m.Y h:i:s'); 

$log = "Date:".$date."|"."Error:".$j;

error_log("$log\n", 3, "error_log.log");

}








// print_r(PDO::getAvailableDrivers());


// $query =$connection->query('SELECT * FROM users LIMIT 0');
// echo '<pre>',  print_r($query->fetchAll(PDO::FETCH_ASSOC)),'</pre>';
//$result=$query->fetchAll(PDO::FETCH_ASSOC);
// if(count($result))
// {
// echo "There Are Records.";
// }
// else
// {
// echo "There Are No Records.";
// }
//filter_input(INPUT_POST, 'var_name') instead of $_POST['var_name']
//filter_input_array(INPUT_POST) instead of $_POST
