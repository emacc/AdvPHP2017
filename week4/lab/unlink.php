<?php
include './autoload.php';

$util = new Util();
$file = filter_input(INPUT_GET, 'file');
$message = $file .' Deleted';
unlink( './uploads/' . $file ); ?>

<script type='text/javascript'>alert('<?php echo $message; ?>'); window.location = 'DirectoryIterator.php';</script>";

