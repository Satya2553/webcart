<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if(isset($_POST['moveToCart']))
  {
    if(isset($_SESSION['cart']))
    {
      $myitems=array_column($_SESSION['cart'],'Name');
      if(in_array($_POST['Name'],$myitems))
      {
        echo"<script>
          alert('Item Already Added');
          window.location.href='index.php';
        </script>";
      }
      else
      {
        $count=count($_SESSION['cart']);
        $_SESSION['cart'][$count]=array('Name'=>$_POST['Name'],'Price'=>$_POST['price'],'Quantity'=>1);
        echo"<script>
          alert('Successfully Added To The Cart');
          window.location.href='index.php';
        </script>";
      }
    }
    else
    {
      $_SESSION['cart'][0]=array('Name'=>$_POST['Name'],'Price'=>$_POST['price'],'Quantity'=>1);
      echo"<script>
        alert('Successfully Added To The Cart');
        window.location.href='index.php';
      </script>";
    }
  }
  if(isset($_POST['removeItem']))
  {
    foreach($_SESSION['cart'] as $key => $value)
    {
      if($value['Name']==$_POST['Name'])
      {
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart']=array_values($_SESSION['cart']);
        echo"<script>
          alert('Removed Successfully');
          window.location.href='cart.php';
        </script>";
      }
    }
  }
  if(isset($_POST['Mod_Quantity']))
  {
    foreach($_SESSION['cart'] as $key => $value)
    {
      if($value['Name']==$_POST['Name'])
      {
        $_SESSION['cart'][$key]['Quantity']=$_POST['Mod_Quantity'];
        echo"<script>
          window.location.href='cart.php';
        </script>";
      }
    }
  }
}

?>
