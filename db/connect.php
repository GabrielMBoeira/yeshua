<?php

class Connection
{
    public static function newConnection($mainPath = false)
    {

        //Localhost
        // $envFilePath = '.env';

        // if ($mainPath) {
        //     $envFileContent = file_get_contents($envFilePath);
        // } else {
        //     $envFileContent = file_get_contents('../' . $envFilePath);
        // }

        // if ($envFileContent === false) {
        //     die("Não foi possível ler o arquivo .env");
        // }

        // $envVariables = preg_split('/\r\n|\r|\n/', $envFileContent);

        // $envData = [];
        // foreach ($envVariables as $envVariable) {
        //     $parts = explode('=', $envVariable, 2);
        //     if (count($parts) === 2) {
        //         $key = trim($parts[0]);
        //         $value = trim($parts[1]);
        //         $envData[$key] = $value;
        //     }
        // }

        // $banco = $envData['DATABASE'];
        // $servidor = $envData['DATA_BASE_SERVER'];
        // $usuario = $envData['DATA_BASE_USER'];
        // $senha = $envData['DATA_BASE_PASSWORD'];
        // $port = $envData['DATA_BASE_PORT'];
        

        //Production
        $banco = getenv('DATABASE');
        $servidor = getenv('DATA_BASE_SERVER');
        $usuario = getenv('DATA_BASE_USER');
        $senha = getenv('DATA_BASE_PASSWORD');
        $port = getenv('DATA_BASE_PORT');

        $conn = new mysqli($servidor, $usuario, $senha, $banco, $port);

        if ($conn->connect_error) {
            die('Erro: ' . $conn->connect_error);
        }

        return $conn;
    }
}
