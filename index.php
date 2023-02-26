<!DOCTYPE html>
<?php 
   require 'twitch.php';
   $provider = new TwitchProvider([
       'clientId'                => '*******',     // The client ID assigned when you created your application
       'clientSecret'            => '*******', // The client secret assigned when you created your application
       'redirectUri'             => 'https://*****.herokuapp.com',  // Your redirect URL you specified when you created your application
       'scopes'                  => ['user:edit']  // The scopes you would like to request
   ]);
   
?>
<html>
   <head>
   </head>
   <body>
      <?php
         if (!isset($_GET['code'])) {
         	$authorizationUrl = $provider->getAuthorizationUrl();
         	$_SESSION['oauth2state'] = $provider->getState();
      ?>
      <center>
         <h4>First, connect with your Twitch Account:</h4>
         <a href="<?= $authorizationUrl?>"><img src="http://ttv-api.s3.amazonaws.com/assets/connect_dark.png" /></a>
      </center>
      <?php
         exit;
         // Check given state against previously stored one to mitigate CSRF attack
         } elseif (empty($_GET['state']) || (isset($_SESSION['oauth2state']) && $_GET['state'] !== $_SESSION['oauth2state'])) {
         if (isset($_SESSION['oauth2state'])) {
             unset($_SESSION['oauth2state']);
         }
         exit('Invalid state');
         } else {
         
			 try {
				 // Get an access token using authorization code grant.
				 $accessToken = $provider->getAccessToken('authorization_code', [
					'code' => $_GET['code']
				 ]);
				 
				 // Using the access token, get user profile
				 $resourceOwner = $provider->getResourceOwner($accessToken);
				 $user = $resourceOwner->toArray()['data']['0'];
       ?>
      <table>
         <tr>
            <td>
               <h4>Welcome <?=htmlspecialchars($user['display_name'])?></h4>
            </td>
            <td><img width="50" height="50" style="border-radius: 50%;" src="<?= $user['profile_image_url']?>"></td>
         </tr>
      </table>
      <form action="streamerPage.php" method="post">
         Enter Your Favourite Streamer Name: <input required type="text" name="name">
         <input type="submit" value="submit">
      </form>
      <?php
				 } catch (Exception $e) {
					 exit('Caught exception: '.$e->getMessage());
				 }
			 }
       ?>
   </body>
</html>
