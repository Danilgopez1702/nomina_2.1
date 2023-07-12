<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
       
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';


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
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'mail.inventariodigitalnetags.com.mx';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username= "cron_fecha_corte@inventariodigitalnetags.com.mx";//este debe ir en el address?
            $mail->Password= "Digitalayayayayayay";                            // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('cron_fecha_corte@inventariodigitalnetags.com.mx');
            $mail->addAddress('eed.esteban@gmail.com');     // Add a recipient
            $mail->addAddress('polocaco@hotmail.com');     // Add a recipient
            $mail->addAddress('Daniel_Lopez1702@outlook.com');     // Add a recipient
            $mail->addAddress('carlos.femat@hotmail.com');     // Add a recipient

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
            while ($data = mysqli_fetch_assoc($query)) {
                $nombre = $data["nombre_empleado"];
                $apellido_p = $data["apellido_paterno"];
                $apellido_m = $data["apellido_materno"];
                $fecha = $data["fecha_asistencia "];
                $hora = $data["hora_asistencia"];
                $nombre_completo = $nombre.$apellido_p.$apellido_m;
                $body .= "  <tr>
                                <td>$nombre_completo</td>
                                <td>$fecha</td>
                                <td>$hora</td>
                            </tr>
                            ";
            }
            $mail->Body = $body;
            $mail->send();
        } catch (Exception $e) {
            echo $e;
        }



?>