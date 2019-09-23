<?php

// Set cookies using php

$details = json_decode(file_get_contents("http://ipinfo.io/"));

$cookie_name1 = "ip";
$cookie_value1 = $_SERVER['REMOTE_ADDR'];
setcookie($cookie_name1, $cookie_value1, time() + 3600);

$cookie_name2 = "region";
$cookie_value2 = $details->region;
setcookie($cookie_name2, $cookie_value2, time() + 3600);

$cookie_name3 = "postal";
$cookie_value3 = $details->postal;
setcookie($cookie_name3, $cookie_value3, time() + 3600);

$cookie_name4 = "country";
$cookie_value4 = $details->country;
setcookie($cookie_name4, $cookie_value4, time() + 3600);

$cookie_name5 = "timezone";
$cookie_value5 = $details->timezone;
setcookie($cookie_name5, $cookie_value5, time() + 3600);

$cookie_name6 = "browser";
$cookie_value6 = $_SERVER['HTTP_USER_AGENT'];
setcookie($cookie_name6, $cookie_value6, time() + 3600);

if(!isset($_COOKIE[$cookie_name1])) 
{
    $cookie_message = "<strong>Cookie Not Saved !!!</strong> Refresh your browser to get the data.";
} 
else 
{
?>

<!--
1. This function will run when html body tag loaded
2. connect the google forms input fields id with spreadsheets column name
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
function connectVisitorToGoogle() {
  var ip=$('#ip').val();
  var region=$('#region').val();
  var postal=$('#postal').val();
  var country=$('#country').val();
  var timezone=$('#timezone').val();
  var browser=$('#browser').val();
  $.ajax({
  url:"https://docs.google.com/forms/d/1kj9zkSlfC2-EJKn91vkMKdDnUeWwO6MQ9e4aTNEJazE/formResponse",data:{"entry.1573948491":ip,"entry.1901953465":region,"entry.1710659919":postal,"entry.1308683551":country,"entry.356423653":timezone,"entry.2054887113":browser},type:"POST",dataType:"xml"
  });
}
</script>

<?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP - Google Spreadsheet Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body onload="connectVisitorToGoogle()">

<div class="bg-dark text-center">
  <h2 class="text-info" style="padding: 10px 0;">PHP - Google Spreadsheet Example</h2>
</div>

<div class="container">
  <h2>Visitors Form</h2>
  <a class="btn btn-outline-primary btn-sm" href="./visitors.html">Visitor List</a>
  <hr>

  <?php
  if(!empty($cookie_message))
  {
  ?>
    <div class="alert alert-danger text-center">
      <?php echo $cookie_message; ?>
    </div>
  <?php
  }
  else
  {
  ?>
    <div class="alert alert-success text-center">
      Cookie Saved !!!
    </div>
  <?php 
  }
  ?>

  <div class="card">
    <div class="card-header">Visitors Form</div>
    <div class="card-body">
      <form>
        <div class="form-group">
          <label>IP:</label>
          <input class="form-control" type="text" id="ip" value="<?php echo $_COOKIE[$cookie_name1]; ?>">
        </div>
        <div class="form-group">
          <label>Region</label>
          <input class="form-control" type="text" id="region" value="<?php echo $_COOKIE[$cookie_name2]; ?>">
        </div>
        <div class="form-group">
          <label>Postal Code</label>
          <input class="form-control" type="text" id="postal" value="<?php echo $_COOKIE[$cookie_name3]; ?>">
        </div>
        <div class="form-group">
          <label>Country</label>
          <input class="form-control" type="text" id="country" value="<?php echo $_COOKIE[$cookie_name4]; ?>">
        </div>
        <div class="form-group">
          <label>Timezone</label>
          <input class="form-control" type="text" id="timezone" value="<?php echo $_COOKIE[$cookie_name5]; ?>">
        </div>
        <div class="form-group">
          <label>Browser:</label>
          <input class="form-control" type="text" id="browser" value="<?php echo $_COOKIE[$cookie_name6]; ?>">
        </div>
      </form>  
      
    </div>
    <div class="card-footer text-center">Developed By Abadur Rahman Robi</div>
  </div>  

</div>

</body>
</html>
