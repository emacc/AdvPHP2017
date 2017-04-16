<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        include './autoload.php';
        
        $msg = new Message();        
        $msg->addMessage('test', 'this is message 1');
        $msg->addMessage('test2', 'this is message 2');
        $msg->addMessage('test3', 'this is message 3');        
        $msg->removeMessage('test2');
        var_dump($msg->getAllMessages(), '<br/>');
        
        $errorMsg = new ErrorMessage();        
        $errorMsg->addMessage('error1', 'this is error message1');
        $errorMsg->addMessage('error2', 'this is error message2');
        $errorMsg->addMessage('error3', 'this is error message3');        
        $errorMsg->removeMessage('error3');
        var_dump($errorMsg->getAllMessages(), '<br/>');
        
        
        $successMsg = new SuccessMessage();        
        $successMsg->addMessage('success1', 'this is success message1');
        $successMsg->addMessage('success2', 'this is success message2');
        $successMsg->addMessage('success3', 'this is success message3');        
        $successMsg->removeMessage('success1');
        var_dump($successMsg->getAllMessages(), '<br/>');
        ?>
    </body>
</html>
