<?php
$con = mysqli_connect("localhost", "platypus", "password") or die(mysqli_error($con));
mysqli_select_db($con, "platipi") or die(mysqli_error($con));

$qinterests = mysqli_query($con, "SELECT interests.interest FROM interests INNER JOIN users ON interests.userid = users.userid WHERE users.queing =1 GROUP BY interests.interest HAVING COUNT(*) > 3");  

if (!$qinterests) {
    $message  = 'Invalid query 1: ' . mysqli_error($con) . "\n";
    die($message);
}

if($qinterests->num_rows === 0)
	exit();

$qinterests_row = mysqli_fetch_array($qinterests);

$qusers = mysqli_query($con, "SELECT userid FROM interests WHERE interests.interest=\"".$qinterests_row[0]."\"");

if (!$qusers) {
    $message  = 'Invalid query 2: ' . mysqli_error($con) . "\n";
    die($message);
}

$data = $qinterests_row[0];
exec("curl -X POST -H \"Content-Type: application/json\" -d '{\"name\": \"" . $data . "\",\"share\":true}' https://api.groupme.com/v3/groups?token=7ed5ef609bb50134eb05035a089afeed 2>&1", $output, $return_var);
$json = json_decode($output[3]);
$share_url = $json->{'response'}->{'share_url'};

$i = 0;
while ($row = mysqli_fetch_array($qusers)) {
  if ($i == 4)
	break;
  $qadd = mysqli_query($con, "UPDATE users SET queueing='FALSE' WHERE userid=".$row[0]);
  if (!$qadd) {
    $message  = 'Invalid query 3: ' . mysqli_error($con) . "\n";
    die($message);
  }
  $qsetid = mysqli_query($con, "UPDATE users SET group_link=\"".$share_url."\" WHERE USERID=".$row[0]);
  if (!$qsetid) {
    $message  = 'Invalid query 4: ' . mysqli_error($con) . "\n";
    die($message);
  }
  $i++;
}
?>
