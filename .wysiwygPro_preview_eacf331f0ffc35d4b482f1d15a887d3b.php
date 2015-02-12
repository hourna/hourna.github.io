<?php
if ($_GET['randomId'] != "MjQUiG3F7kOFZK4QLCto3p6vj5NmB3ZpH_KFRxYs4KjE01P2Mw7frgtNhJjYZblH") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
