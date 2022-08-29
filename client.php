<form method="POST">
    <tr>
    <td>Enter Message
    <input type="text" name="txtMessage">
    <input type="submit" name="btnSend" value="Send">
    </td>
    </tr>
</form>

<?php
    $host="127.0.0.1";
    $port =3000;
    if(isset($_POST['btnSend'])){
        $msg = $_REQUEST['txtMessage'];
        $sock = socket_create(AF_INET,SOCK_STREAM,0);
        socket_connect($sock, $host, $port);
        socket_write($sock, $msg, strlen($msg));

        $reply = socket_read($sock, 1924);
        $reply = trim($reply);
        $reply = "Server says:\t".$reply;
    }
?>

<tr>
    <td>
        <texarea rows="10" cols="30"><?php echo @$reply; ?></textarea>
</td>
</tr>