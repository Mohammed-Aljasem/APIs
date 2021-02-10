<?php

$con = mysqli_connect("localhost", "root", "123321mm", "project6");
// API Rturn Value
header("Content-Type: Application/json");
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query  = " SELECT product_id, product_price, sub_cat_name 
              FROM sub_cat 
              JOIN  products  
              ON    products.sub_cat_id = sub_cat.sub_cat_id 
              WHERE products.product_id =$id ";

  $result = mysqli_query($con, $query);

  if ($result) {
    $resultArr = array();

    while ($rowData = mysqli_fetch_assoc($result)) {
      $resultArr[count($resultArr)] = $rowData;
    }


    echo $x = json_encode($resultArr);
    $z = json_decode($x, true);
  }
} else {
  echo json_encode("missing parmaters");
}
