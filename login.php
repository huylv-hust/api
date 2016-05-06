<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <title>Login Form</title>
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Login to Web App</h1>
      <form method="post" action="login.php">
        <p><input type="text" name="user" value="" placeholder="Username or Email"></p>
        <p><input type="password" name="pass" value="" placeholder="Password"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>

    <div class="login-help">
      <p>Forgot your password? <a href="">Click here to reset it</a>.</p>
    </div>
  </section>
</body>
</html>
<?php
	if(isset($_POST['user']) && isset($_POST['pass'])){
		if($_POST['user'] == 'huylv' && $_POST['pass'] == '1') {
			
			$service_url = 'http://huylv.dev/api/service.php';
			$curl = curl_init($service_url);
			$curl_post_data = array(
					'user' => $_POST['user'],
					'pass' => $_POST['pass'],
			);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
			$curl_response = curl_exec($curl);
			
			if ($curl_response === false) {
				$info = curl_getinfo($curl);
				curl_close($curl);
				die('error occured during curl exec. Additioanl info: ' . var_export($info));
			}
			
			curl_close($curl);
			$decoded = json_decode($curl_response,true);
			var_dump($decoded);die;
		}else{
			echo 'error';
		}
	}
?>
