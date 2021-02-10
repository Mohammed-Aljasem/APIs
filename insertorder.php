<?php
$con = mysqli_connect("localhost", "root", "123321mm", "project6");
// API Rturn Value
header("Content-Type: Application/json");
if (isset($_GET['order'])) {
  echo  $id = $_GET['user_id'];
  echo $qty = $_GET['qty'];

  $query  =  "INSERT INTO orders ( user_id, order_product_quantity)
  VALUES ('$id', '$qty')";

  $result = mysqli_query($con, $query);

  $x = ['done' => 'success', 'error' => 'failed'];
  if ($result) {
    echo json_encode($x['done']);
  } else {
    echo json_encode($x['error']);
  }
  // if ($result) {
  //   $resultArr = array();
  //   // echo json_encode($x['done']);

  //   while ($rowData = mysqli_fetch_assoc($result)) {
  //     $resultArr[count($resultArr)] = $rowData;
  //   }
  //   echo 'test';

  //   echo $x = json_encode($resultArr);
  //   $z = json_decode($x, true);
  // }
} else {
  echo json_encode("missing parmaters");
}
