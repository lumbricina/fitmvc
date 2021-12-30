<?php
$conn=mysqli_connect('localhost','root','','fit');

//Getting Input value
if(isset($_POST['login'])){
  $username=mysqli_real_escape_string($conn,$_POST['username']);
  $password=mysqli_real_escape_string($conn,$_POST['password']);
  if(empty($username)&&empty($password)){
  $error= 'Fields are Mandatory';
}else{

  //Checking Login Detail
  $result=mysqli_query($conn,"SELECT * FROM user WHERE username='$username' AND password='$password'");
  $row=mysqli_fetch_assoc($result);
  $count=mysqli_num_rows($result);
  if($count==1){
        $_SESSION['user']=array(
          'nama'=>$row['nama'],
          'username'=>$row['username'],
          'password'=>$row['password'],
          'role'=>$row['role'],
          'email'=>$row['email']
    );

    $role=$_SESSION['user']['role'];
    
    //Redirecting User Based on Role
      switch($role){
        case '4':
          header('location:homepem2');
          break;
        case '3':
        header('location:index');
        break;
        case '2':
        header('location:homedosen');
        break;
        case '1':
        header('location:homeadmin');
        break;
      }
  }else{  
    $error='Your Password or UserName is not Found';
  }
  }
}
?>