<?php

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_GET['key'] == 'staging_mio_key') {
    // 日時設定 
    date_default_timezone_set('Asia/Tokyo');

    $fp = fopen("deploy.log", "a");
    fwrite($fp, "--------------deploy実行---------\n");
    $sh = "/var/www/stg-mio.com/htdocs/deploy/staging_deploy.sh";
    $system = exec($sh);
    //chdir("/var/www/stg-mio.com/htdocs/admin");
    fwrite($fp, date("Y-m-d H:i:s"). "\n");
    fwrite($fp, getcwd()."\n");
    $branch = isset($_POST["payload"]["push"]["changes"]["old"]["name"]) ? $_POST["payload"]["push"]["changes"]["old"]["name"] : "";
    fwrite($fp. $branch. "\n");
    
    
    //$system = exec("git pull origin staging 2>&1", $output);
    fwrite($fp, "shell:". $system. "\n");
    if (!empty($system)) {
        fwrite($fp, "systemSuccess\n");
    } else {
        fwrite($fp, "systemFalse\n");
    }
    fwrite($fp, var_dump($_POST));
    fclose($fp);
}
