<html>
<body>
<!---
Autor: Miguel Angel Amador Lorca
e-mail: joker at motd dot cl
description: php script that return the mac address vendor 

-->

<form action="mac.php" name="form1" method="post">
<input name="mac" type="text">
<input type="submit" value="enviar">
</form>

<?php

        function isValid( $ADDR1 ) {
                return (preg_match('/([a-fA-F0-9]{2}[:|\-]?){6}/', $ADDR1) == 1);
        }

        function MACVendor( $ADDR2 )
        {

        $url = "http://api.macvendors.com/"."$ADDR2";
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_TIMEOUT,20);

        $vendor = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        //echo "<br>HTTP_CODE:".$httpcode;
        //echo "<br>Vendor: ".$vendor;

                if($vendor) {
                        echo "<br> Vendor : ".$vendor;
                } else {
                        echo "<br> Vendor Not Found";
                }

        }


?>
<?php

        $VAR1 = htmlspecialchars($_POST["mac"]);
        $VAR = trim($VAR1," ");
        echo $VAR;

        if (isValid($VAR)){
                echo "\n Is Valid MAC Address";
                MACVendor($VAR);
        }
        else
        {
                echo "\n Is Not Valid MAC Address";
        }

        echo "\n";
?>
</body>
</html>
