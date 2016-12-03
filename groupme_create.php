<?php
$data = "Test";
exec("curl -X POST -H \"Content-Type: application/json\" -d '{\"name\": \"" . $data . "\",\"share\":true}' https://api.groupme.com/v3/groups?token=7ed5ef609bb50134eb05035a089afeed 2>&1", $output, $return_var);
$json = json_decode($output[3]);
$share_url = $json->{'response'}->{'share_url'};
echo $share_url
?>
