<?php
# Load Curl API
include("api.php");
# More Infos under https://docs.victronenergy.com/vrmapi/overview.html#introduction
#
# Access Data for VRM
$vrm_api_url	= "https://vrmapi.victronenergy.com/v2"; # URL Victron API VRM
$vrm_username	= "mail@domain.com"; # Username VRM Portal
$vrm_password	= "123456789"; # Password VRM Portal
$vrm_siteid		= "123456"; # Site ID = VRM Install ID
$vrm_userid		= "123456"; # User ID = VRM Portal User ID

# VRM Login (Create login token)
$api_vrm_login = api_vrm_login($vrm_api_url,$vrm_username,$vrm_password);
$vrm_token = $api_vrm_login[ 'token' ];
#
?>
<?php
# VRM GET (Read Data from VRM API)
$api_vrm_get = api_vrm_get("$vrm_api_url/installations/$vrm_siteid/widgets/Status",$vrm_token);
echo "<pre>";
print_r($api_vrm_get);
echo "</pre>";
?>
<?php
# VRM GET (Read Data from VRM API)
$api_vrm_get = api_vrm_get("$vrm_api_url/users/$vrm_userid/installations?extended=1",$vrm_token);
echo "<pre>";
# print_r($api_vrm_get);
echo "</pre>";
?>