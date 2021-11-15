<?php

if (isset($_POST['submit'])) {
  $email = $_POST['email'];

  $errorEmpty = false;
  $errorEmail = false;

  date_default_timezone_set('Asia/Manila');
  $date = date("Y/n/j");
  $time = date("g:i:s a");

  if (empty($email) ) {
    echo "<span class='form-error'>Fill in all fields!</span>";
    $errorEmpty = true;
  }
  // elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
  //   echo "<span class='form-error'>Only letters and white space allowed!</span>";
  //   $errorName = true;
  // }
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $file_open = fopen("file.csv", "a");
    $no_rows = count(file("file.csv"));
    if($no_rows > 1) {
      $no_rows = ($no_rows - 1) + 1;
    }
    $status = 'false';
    $form_data = array(
      'sr_no'      => $no_rows,
      'date'       => $date,
      'time'      => $time,
      'email'      => $email,
      'status'    => $status
    );
    fputcsv($file_open, $form_data);

    // echo "<span class='form-error'>Invalid email address!</span><br>";

    $myJSON = json_encode($form_data);

    $error2 = false;
    $message2 = "Invalid Email";
    $return2 = array(
            "error" => $error2,
            "message" => $message2
    );
    // $return["json"] = json_encode($return);
    json_encode($return2);
    echo "Invalid Email";

    $errorEmail = true;
  }
  else {
    // header('Location: http://www.coral.co.uk/register?email='.$email);
    $file_open = fopen("file.csv", "a");
    $no_rows = count(file("file.csv"));
    if($no_rows > 1) {
      $no_rows = ($no_rows - 1) + 1;
    }
    $status = 'true';
    $form_data = array(
      'sr_no'      => $no_rows,
      'date'       => $date,
      'time'      => $time,
      'email'      => $email,
      'status'    => $status
    );
    fputcsv($file_open, $form_data);
    // echo "<span class='form-success'>Sent!</span><br>";
    $myJSON = json_encode($form_data);
    ?>
    <script>
    var email = $("#email").val();
    window.location = "https://www.coral.co.uk/register?email=" + email;
    </script>
<?php
  }
}
else {
  // echo "There was an error!";
  $error2 = false;
  $message2 = "Invalid Email";
  $return2 = array(
          "error" => $error2,
          "message" => $message2
  );
  // $return["json"] = json_encode($return);
  json_encode($return2);
  echo "Invalid Email";
}
?>
