<?php $mensagemHTML =
  '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Novo Contato</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>

  </style>
</head>

<body style="background-color:#F8F9FA; padding:35px;">

  <table cellpadding="5" cellspacing="25" align="center" border="0" style="border-top:5px solid #ec7e00; background-color: #fff; width: 600px">
    <thead>
      <tr>
        <td colspan="1" align="center"><a href="' .  $siteCliente . '">' .  $logoImage . '</a></td>
      </tr>
      <tr>
        <td colspan="1" align="center"><h2>OPA! Tudo bom? Acabou de chegar um contato fresquinho do seu site.</h2></td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th align="left"><h3>Setor: ' . $mensagem->__get("setor") . '</h3></th>        
      </tr>
      <tr>
        <th align="left"><h3>CNPJ: '   . $mensagem->__get("cnpj") . '</h3></th>        
      </tr>  
      <tr>
        <th align="left"><h3>CPF: ' . $mensagem->__get("cpf") . '</h3></th>        
      </tr>
      <tr>
        <th align="left"><h3>Telefone: ' . $mensagem->__get("telefone") . '</h3></th>       
      </tr>
      <tr>
        <th align="left"><h3>Email: ' . $mensagem->__get("email") . '</h3></th>        
      </tr>
      <tr>
        <th align="left"><h3>Mensagem: ' . $mensagem->__get("mensagem") . '</h3></th>        
      </tr>    

    </tbody>
  </table>
  <br>
  <table class="table" cellpadding="5" cellspacing="50" align="center" border="0" style="background-color: #fff; width: 600px;">
    <thead>      
      <tr>
        <td colspan="1" align="center"><h2>Powered by:</h2></td>
      </tr>
    </thead>
    <tbody>
    <tr>
      <td colspan="1" align="center"><a href="https://www.ciawebsites.com.br"><img width="150" src="https://www.ciawebsites.com.br/wp-content/themes/criacao-de-sites-seo/assets/img/logo-cia/criacao-sites.png" alt="ciaWebsites"></a></td>
    </tr>
    </tbody>
  </table>

</body>

</html>';
