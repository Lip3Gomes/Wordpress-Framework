<?php

# echo '<pre>'; print_r(get_home_url() ."/contato-retorno?enviado"); echo '</pre>'; exit();

require get_template_directory() . "/core/vendor/PHPMailer/Exception.php";
require get_template_directory() . "/core/vendor/PHPMailer/OAuth.php";
require get_template_directory() . "/core/vendor/PHPMailer/PHPMailer.php";
require get_template_directory() . "/core/vendor/PHPMailer/POP3.php";
require get_template_directory() . "/core/vendor/PHPMailer/SMTP.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MontarMensagem
{
    private $setor = null;
    private $cnpj = null;
    private $cpf = null;
    private $telefone = null;
    private $email = null;
    private $mensagem = null;

    public $status = array('codigo_status' => null, 'descricao_status' => null);


    public function __get($atributo)
    {
        return $this->$atributo;
    }
    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    public function mensagemValida()
    {
        if (empty($this->para) || empty($this->assunto) || empty($this->assunto)) {
            return false;
        }
        return true;
    }
}

$mensagem = new MontarMensagem();
$mensagem->__set('setor', $_POST['setor']);
$mensagem->__set('cnpj', $_POST['cnpj']);
$mensagem->__set('cpf', $_POST['cpf']);
$mensagem->__set('telefone', $_POST['telefone']);
$mensagem->__set('email', $_POST['email']);
$mensagem->__set('mensagem', $_POST['mensagem']);


require get_template_directory() . '/core/mail/templates/novo-contato/email.php';

// if (!$mensagem->mensagemValida()) {
//     echo 'Mensagem não é válida';
//     header('Location: index.php');
// };


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false; #SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                                   // Send using SMTP
    $mail->Host       = $host;                                        // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                        // Enable SMTP authentication
    $mail->Username   = $usuario;                                   // SMTP username
    $mail->Password   = $senha;                                    // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                     // TCP port to connect to

    //Recipients
    $mail->setFrom($usuario);
    $mail->addAddress($usuario);                                         // Add a recipient
    # $mail->addAddress('ellen@example.com');                                // Name is optional
    # $mail->addReplyTo('cc@example.com', 'Informações');
    # $mail->addCC('cc@example.com');
    # $mail->addBCC('bcc@example.com');

    // Attachments
    # $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    # $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "OPA! Chegou um novo contato.";

    $mail->Body = $mensagemHTML;
    $mail->AltBody = 'Seu navegador não suporta a mensagem enviada, é necessário acessar este email por outro navegador.';

    $mail->send();

    $mensagem->status['codigo_status'] = 1;
    $mensagem->status['codigo_descricao'] = 'E-mail enviado com sucesso';
} catch (Exception $e) {
    $mensagem->status['codigo_status'] = 404;
    $mensagem->status['codigo_descricao'] = 'Não foi possível enviar esta mensagem! Por favor tente novamente. Detalhes do erro: ' . $mail->ErrorInfo;
}


