<?php    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $option = $_POST['option'];
    $msg = $_POST['msg'];
    $data_envio = date('d/m/Y');
    $hora_envio = date('H:i:s');

 // CORPO DO EMAIL   
    $arquivo = 
" <style type='text/css'>
  body {
  margin:0px;
  font-family:Verdane;
  font-size:12px;
  color: #666666;
  }
  a{
  color: #666666;
  text-decoration: none;
  }
  a:hover {
  color: #FF0000;
  text-decoration: none;
  }
  </style>
    <html>
        <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
            <tr>
              <td>
  <tr>
                 <td width='500'>Nome:$name</td>
                </tr>
                <tr>
                  <td width='320'>E-mail:<b>$email</b></td>
     </tr>
      <tr>
                  <td width='320'>Telefone:<b>$phone</b></td>
                </tr>
     <tr>
                  <td width='320'>Opções:$option</td>
                </tr>
                <tr>
                  <td width='320'>Mensagem:$msg</td>
                </tr>
            </td>
          </tr>  
          <tr>
            <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
          </tr>
        </table>
    </html>
";
// FIM DO CORPO DO EMAIL


  $destino = "mauruciotaffarel@gmail.com";
  $assunto = "Contato - Brigadeiro";

  // É necessário indicar que o formato do e-mail é html
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: $nome <$email>\r\n";
    
  $enviaremail = mail($destino, $assunto, $arquivo, $headers);
  if($enviaremail){
      echo '
    <html>  
    <head>
        <title>Brigadeiro</title>
		<link rel="stylesheet" type="text/css" href="data/css/style.css">
        <link rel="shortcut icon" href="data/img/favicon.png" />
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<meta name="theme-color" content="#427e87">
		<meta name="keywords" content="brigadeiro gostoso chocolate vender">
		<meta name="description" content="comprar chocolate">
		<meta name="author" content="Mauricio Taffarel">
        <script type="text/javascript" src="data/js/jquery.min.js"></script>
        <script type="text/javascript" src="data/js/script.js"></script>
    </head>
    
    <body>
        <hr class="prefooter2" align="center">
        <hr class="prefooter" align="center">
        <header class="header">
            <div class="logo"><img src="data/img/logo.png" alt="Logo de um brigadeiro"></div>
            <h1>Brigadeiros Maurício Taffarel</h1>
        </header>
        

        <nav class="nav">
            <hr class="prefooter2" align="center">
            <ul>
                <li><a href="index.html" alt="">Home</a></li>
                <li><a href="menu.html" alt="">Cardápio</a></li>
                <li><a href="about.html" alt="">Sobre</a></li>
                <li><a class="active" href="contact.html" alt="">Contato</a></li>
            </ul>
        </nav>
        
        <article class="article">
            <h3 align="center" color="#cdd8d0" style="margin:100px 50px;padding:10px;background:#217234";>Email enviado com sucesso!</h3>
        </article>
            
        
       
        <footer class="footer">   
            <p>Mauricio Taffarel <br>&copy; 2017</p>
        </footer>
        <hr class="prefooter2" align="center">
        <hr class="prefooter" align="center">
      ';
  } else {
      echo '
    <html>  
    <head>
        <title>Brigadeiro</title>
		<link rel="stylesheet" type="text/css" href="data/css/style.css">
        <link rel="shortcut icon" href="data/img/favicon.png" />
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<meta name="theme-color" content="#427e87">
		<meta name="keywords" content="brigadeiro gostoso chocolate vender">
		<meta name="description" content="comprar chocolate">
		<meta name="author" content="Mauricio Taffarel">
        <script type="text/javascript" src="data/js/jquery.min.js"></script>
        <script type="text/javascript" src="data/js/script.js"></script>
    </head>
    
    <body>
        <hr class="prefooter2" align="center">
        <hr class="prefooter" align="center">
        <header class="header">
            <div class="logo"><img src="data/img/logo.png" alt="Logo de um brigadeiro"></div>
            <h1>Brigadeiros Maurício Taffarel</h1>
        </header>
        

        <nav class="nav">
            <hr class="prefooter2" align="center">
            <ul>
                <li><a href="index.html" alt="">Home</a></li>
                <li><a href="menu.html" alt="">Cardápio</a></li>
                <li><a href="about.html" alt="">Sobre</a></li>
                <li><a class="active" href="contact.html" alt="">Contato</a></li>
            </ul>
        </nav>
        
        <article class="article">
            <h3 align="center" color="#cdd8d0" style="margin:100px 50px;padding:10px;background:#ce4e37";>Erro ao enviar email</h3>
        </article>
            
        
       
        <footer class="footer">   
            <p>Mauricio Taffarel <br>&copy; 2017</p>
        </footer>
        <hr class="prefooter2" align="center">
        <hr class="prefooter" align="center">
      ';
  }

    $resposta = "Recebemos seu email";
    $resp_assunto   = "Confirmação - Brigadeiros";

    $headers2 .= "MIME-Version: 1.0\r\n";
    $headers2 .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers2 .= "From: Mauricio Taffarel <mauruciotaffarel@gmail.com>\r\n";

  mail($email, $resp_assunto, $resposta,$headers2);
?>