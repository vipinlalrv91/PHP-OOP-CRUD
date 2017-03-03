<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Show Table</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="js/bootstrap.js"></script>
  </head>

<?php

function __autoload($class){
	include_once($class.".php");
	
}

$obj=new oopCrud;

$header = new Header;

 $header->storeDataItem("PHP Crud ");

  
if(isset($_REQUEST['status'])){
	echo"Your Data Successfully Updated";
}

if(isset($_REQUEST['status_insert'])){
  echo"Your Data Successfully Inserted";
}

if(isset($_REQUEST['del_id'])){
if($obj->deleteData($_REQUEST['del_id'],"students")){
	
	echo"Your Data Successfully Deleted";
}
}
?>
<div class="container">
  <div class="btn-group">
  <a href="show.php"><button class="btn">Home</button></a>
  <a href="insert.php"><button class="btn">Insert</button></a>
</div>
  <h3 >All The Data</h3>
  <table width="750" border="1" class="table-striped">
    <tr class="success">
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
   <?php

    


    foreach($obj->showData("students") as $value){
  	  extract($value);

      echo "<tr class='success'>
              <td>$name</td>
              <td>$email</td>
              <td>$mobile</td>
              <td>$address</td>
              <td>
              <a href='edit.php?id=$id'> <button class='btn'>Edit</button></a>
              &nbsp;&nbsp;<a href='show.php?del_id=$id'><button class='btn'>Delete</button></a>
              </td>
          </tr> ";
    }
  ?>
   <tr class="success">
      <th scope="col" colspan="5" align="right">
        
          <a href="insert.php"><button class="btn">Insert New Data</button></a>
        
      </th>
     
    </tr>
  </table>
</div>

<body>
</body>
</html>