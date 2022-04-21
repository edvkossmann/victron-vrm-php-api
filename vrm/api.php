<?php
# Convert Object to Array
function convert_object_to_array($data) {
    if (is_object($data)) {
        $data = get_object_vars($data);
    }
    if (is_array($data)) {
        return array_map(__FUNCTION__, $data);
    }
    else {
        return $data;
    }
};
?>

<?php
# API VRM Login
function api_vrm_login($vrm_api_url,$vrm_username,$vrm_password)
{	
#
$data = '{"username":"'.$vrm_username.'","password":"'.$vrm_password.'"}';
#
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$vrm_api_url/auth/login");
curl_setopt($ch, CURLOPT_POST, 1 );
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$ch_output = curl_exec($ch);	
curl_close($ch);
	
# Output Array
$array_api = ( convert_object_to_array( json_decode( $ch_output ) ) );
return $array_api;
}
?>

<?php
# API VRM GET
function api_vrm_get($vrm_url, $vrm_token)
{
$curl = curl_init($vrm_url);
curl_setopt($curl, CURLOPT_URL, $vrm_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$headers = array(
   "X-Authorization: Bearer $vrm_token",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$resp = curl_exec($curl);
$ch_output = curl_exec($curl);
$curlInfo = curl_getinfo($curl);
$reasonPhrase = curl_error($curl);
curl_close($curl);

# Output Array
$array_api = ( convert_object_to_array( json_decode( $ch_output ) ) );
return $array_api;
}
?>



