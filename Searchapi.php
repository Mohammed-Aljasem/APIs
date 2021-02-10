<?php
$con = mysqli_connect("localhost", "root", "123321mm", "project6");
// API Rturn Value
header("Content-Type: Application/json");
if (isset($_GET['search'])) {
  $search = $_GET['search'];

  $query  = " SELECT * FROM products
              WHERE ( product_id LIKE '%$search%' 
                      or product_name LIKE '%$search%' 
                      or product_price LIKE '%$search%' 
                      or product_desc LIKE '%$search%')";

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
};
