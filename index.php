<html>
<head>
<meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    

</head>
<?php

if (isset($_POST['GiMad']))
{
    header('Location: webcam.html');
    shell_exec("/usr/local/bin/gpio -g mode 3 out"); # Sætter pin 3 til output
    $gpio_on = shell_exec("/usr/local/bin/gpio -g write 3 0"); #Tænd LED
            
            # Aktiver motor
            shell_exec("/usr/local/bin/gpio mode 1 pwm");
            shell_exec("/usr/local/bin/gpio pwm-ms");
            shell_exec("/usr/local/bin/gpio pwmc 1920");
            shell_exec("/usr/local/bin/gpio pwmr 200"); #0.1 ms per enhed
            shell_exec("/usr/local/bin/gpio pwm 1 15"); # +90 grader 
            
            sleep(2); # Venter 5 sekunder
            shell_exec("/usr/local/bin/gpio pwm 1 05"); # -90 grader
            $gpio_on = shell_exec("/usr/local/bin/gpio -g write 3 1"); # Sluk LED
            date_default_timezone_set('Australia/Melbourne');
            $date = date('m/d/Y h:i:s a', time());
             
}
?>

<form method="post">
<div class="img-with-text" >
<button name="GiMad" style="background-color:transparent; border-color:transparent;"><img src="ikon_hund2.png" width=224px height=224px alt="Gi hunden mad"/></button>
<p>Gi hunden mad</p>

</div>

</form>
</html>

<!-- Links
 https://raspberrypi.stackexchange.com/questions/4906/control-hardware-pwm-frequency 
http://www.crompton.com/hamradio/BeagleBoneBlackAllstar/GPIO_how-to.pdf
-->