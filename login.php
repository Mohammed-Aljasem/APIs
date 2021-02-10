<?php
$con = mysqli_connect("localhost", "root", "123321mm", "project6");
// API Rturn Value
header("Content-Type: Application/json");
if (isset($_GET['login'])) {
  $email    = $_GET['email'];
  $password = $_GET['password'];
  $query    = "SELECT * FROM admin ";
  $result   = mysqli_query($con, $query);

  if ($result) {

    $resultArr = array();

    while ($rowData = mysqli_fetch_assoc($result)) {

      $resultArr[count($resultArr)] = $rowData;
    }


    $x = json_encode($resultArr);
    $z = json_decode($x, true);
    // print_r($z[0]['admin_email']);
    for ($i = 0; $i < count($z); $i++) {
      if ($z[$i]['admin_email'] == $email && $z[$i]['admin_password'] == $password) {
        echo json_encode("success login");
        break;
      } else {
        $error = json_encode("failed login");
        echo $error;
      }
    }
  }
} else {
  echo json_encode("missing parmaters");
}
