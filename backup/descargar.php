<?php
include ("Function_Backup.php");

echo backup_tables("localhost","root","","asopamo");
$fecha=date("Y-m-d");
header("Content-disposition: attachment; filename=db-backup-".$fecha.".sql");
header("Content-type: MIME");
readfile("backups/asopamo-".$fecha.".sql");