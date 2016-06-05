<?php
include ("init.php");
$usuario = new Usuario();

require_once __DIR__ . '/include/facebook-php-sdk-v4/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
	'app_id' => '1553769901591573', // Replace {app-id} with your app id
	'app_secret' => '5e9b6d3409eb0b76c7f208b32cfd264c',
	'default_graph_version' => 'v2.2',
]);

$helper = $fb->getRedirectLoginHelper();

try {
	$accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  // if ($helper->getError()) {
  //   header('HTTP/1.0 401 Unauthorized');
  //   echo "Error: " . $helper->getError() . "\n";
  //   echo "Error Code: " . $helper->getErrorCode() . "\n";
  //   echo "Error Reason: " . $helper->getErrorReason() . "\n";
  //   echo "Error Description: " . $helper->getErrorDescription() . "\n";
  // } else {
  //   header('HTTP/1.0 400 Bad Request');
  //   echo 'Bad request';
  // }
  // exit;
  mensagemErro("Falha ao logar com o Facebook. Tente novamente.");
  header("Location: login.php");
}

// Logged in
//echo '<h3>Access Token</h3>';
//var_dump($accessToken->getValue());

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
//echo '<h3>Metadata</h3>';
//var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId("1553769901591573"); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
    exit;
  }

  //echo '<h3>Long-lived</h3>';
  //var_dump($accessToken->getValue());
}
$response = $fb->get('/me?fields=id,name,email',$accessToken);
$user = $response->getGraphNode();

$usuarioCadastrado = $usuario->findByEmail($user['email']);
if (count($usuarioCadastrado)) {
  $_SESSION["Usuario"] = array (
    "id" => $usuarioCadastrado[0]['id'],
    "usuarios_tipos_id" => $usuarioCadastrado[0]['usuarios_tipos_id'],
    "nome" => $usuarioCadastrado[0]['nome'],
    "email" => $usuarioCadastrado[0]['email'],
    "fb_access_token" => $accessToken->getValue()
  );
  header("Location: meus-eventos.php");
} else {
  $usuario->usuarios_tipos_id = 2;
  $usuario->facebook_id = $user['id'];
  $usuario->nome = $user['name'];
  $usuario->email = $user['email'];
  $usuario->senha = '';
  $usuario->cpf = '';
  $usuario->telefone = '';
  $usuario->endereco = '';
  $usuario->data_nascimento = '';

  if ($usuario->create()) {
    mensagemSucesso("Cadastro efetuado com sucesso. Complete seus dados no formulário abaixo.");
    $_SESSION["Usuario"] = array (
      "id" => $usuario->lastId(),
      "usuarios_tipos_id" => 2,
      "nome" => $user['name'],
      "email" => $user['email'],
      "fb_access_token" => $accessToken->getValue()
    );
    header("Location: perfil.php");
  }
  else {
    mensagemErro("Falha ao cadastrar, tente novamente.");
    header("Location: login.php");
  }
}
?>