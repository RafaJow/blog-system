<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

class DumpController extends Database
{
    public function __construct()
    {
    }

    public function geraDump()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hostname   = $this->getHost();
            $username   = $this->getUsername();
            $password   = $this->getPassword();
            $dbname     = $this->getDbname();

            $mysqldumpPath = 'C:\xampp\mysql\bin\mysqldump.exe';
            $backupFile = '../../dump.sql';

            $command = "$mysqldumpPath -u $username -h $hostname $dbname > $backupFile";
            system($command, $retorno);

            // if ($retorno === 0) {
            //     echo 'Backup gerado com sucesso.';
            // } else {
            //     echo 'Erro ao gerar o backup. Código de retorno: ' . $retorno;
            // }
            $this->showPaginaAdm();
        }
    }
    public function showPaginaAdm()
    {
        header('Location:../view/pagina_adm.php');
    }
}
