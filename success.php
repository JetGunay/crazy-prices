<?php
  $error = true;
  $message = "Valid Email";
  $return = array(
          "error" => $error,
          "message" => $message
  );
// $return["json"] = json_encode($return);
echo json_encode($return);

?>
