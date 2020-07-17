<? php 

include_once 'DBConnector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //we dont allow users to visit this page bia a url
	header('HTTP/1.0 403 Forbidden');
	echo "You are forbidden";
} else{
	$api_key = null;
	$api_key = generateApiKey(64);
	header("Content-Type: application/json; charset=UTF-8");
	echo generateResponse($api_key);
}
/*this is how we generate the key have choden 64 characters*/

function generateApiKey($str_length)
{
    //base 62 map
	$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //get enough random bits for base 64 encoding and prevent 
	$bytes = openssl_random_pseudo_bytes(3*$str_length/4+1);
	
	//convert base 64 to base 62 by mapping + and / to smth form the base 62
	$repl = unpack('C2', $bytes);

	$first = $chars[$repl[1]%62];
	$second = $chars[$repl[2]%62];
	return strtr(substr(base64_encode($bytes), 0, $str_length), '+/', "$first$second");
}

function saveApiKey($api_key){
	//write code that will save te api key for the user.
	session_start();
	$dbcon = new DBConnector();
	$user = $_SESSION['username'];
	$myquery = mysqli_query($dbcon->conn, "SELECT * FROM user WHERE username='$user'");
	$user_array = $myquery->fetch_assoc();
	$uid = $user_array['id'];
	$good = mysqli_query($dbcon->conn, "INSERT INTO api_keys(user_id,api_key) VALUES('$uid','$api_key')") or die(mysqli_error($dbcon->conn));
	if ($good === true) {
		return true;
	}
	return false;
}

function generateResponse($api_key)
{
	if (saveApiKey($api_key)) {
		$res = ['success' => 1, 'message' => $api_key];
	} else{
		$res = ['success' => 0, 'message' => 'Something went wrong. Please regenerate the API key'];
	}
	return json_encode($res);
}

 ?>