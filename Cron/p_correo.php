<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
       
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    $hoy = date("d-M-Y");

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );
            //Server settings
            $mail->SMTPDebug    = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host         = 'smtp.mail.yahoo.com';// Set the SMTP server to send through
            $mail->SMTPAuth     = true;                                   // Enable SMTP authentication
            $mail->Username     = "cron_digital@yahoo.com";//este debe ir en el address?
            $mail->Password     = "Digitalayayayayayay1.";                            // SMTP password
            $mail->SMTPSecure   = "ssl";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port         = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            #$mail->SMTPOptions = ['ssl'=> ['allow_self_signed' => true]]; // Descomentar si el servidor SMTP tiene un certificado autofirmado
            #$mail->SMTPSecure = false; // Descomentar si se requiere desactivar cifrado (se suele usar en conjunto con la siguiente línea)
            #$mail->SMTPAutoTLS = false; // Descomentar si se requiere desactivar completamente TLS (sin cifrado)

            //Recipients
            $mail->setFrom('cron_digital@yahoo.com');
            $mail->addAddress('eed.esteban@gmail.com');     // Add a recipient
            //$mail->addAddress('polocaco@hotmail.com');     // Add a recipient
            //$mail->addAddress('Daniel_Lopez1702@outlook.com');     // Add a recipient
            //$mail->addAddress('alexisnatita@gmail.com');     // Add a recipient
            //$mail->addAddress('carlos.femat@hotmail.com');     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Corrida CHECADOR del dia  '.$hoy;
            
            $body  = "  <table>
                            <thead>
                                <th><strong>NOMBRE</strong></th>
                                <th><strong>FECHA</strong></th>
                                <th><strong>HORA</strong></th>
                            </thead> ";
            //ciclo para mandar a empleados
            
                $nombre = "ESTEBAN ";
                $apellido_p = "ESPARZA ";
                $apellido_m = "DIAZ ";
                $fecha = "03/11/2022";
                $hora = "10:00";
                $nombre_completo = $nombre.$apellido_p.$apellido_m;
                $nombre1 = "ALEXIS NATANAEL ";
                $apellido_p1 = "GONZALEZ ";
                $apellido_m1 = "RODRIGUEZ ";
                $fecha1 = "03/11/2022";
                $hora1 = "10:00";
                $nombre_completo1 = $nombre1.$apellido_p1.$apellido_m1;

                $body .= "  <tr>
                                <td style = 'color:orange;'>$nombre_completo</td>
                                <td style = 'color:orange;'>$fecha</td>
                                <td style = 'color:orange;'>$hora</td>
                            </tr>
                            </br>
                            <tr>
                                <td style = 'color:red;'>$nombre_completo1</td>
                                <td style = 'color:red;'>$fecha1</td>
                                <td style = 'color:red;'>$hora1</td>
                            </tr>
                            
                            ";
            
            $mail->Body = $body;
            $mail->send();
            echo 'El mensaje ha sido enviado';
        } catch (Exception $e) {
            echo 'El mensaje no se ha podido enviar, error: ', $e;
        }



?>