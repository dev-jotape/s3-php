<?

    define(ACCESS_KEY, "AKIAJUNLY2TY2427ZWWA");
    define(SECRET_KEY, "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");

    session_start();
    require "vendor/autoload.php";

    use Aws\S3\S3Client;


    try {
        

        // dispara excessão caso não tenha dados enviados
        if (!isset($_FILES['file'])) {
            throw new Exception("File not uploaded", 1);
        }

        // cria o objeto do cliente, necessita passar as credenciais da AWS
        $clientS3 = S3Client::factory(array(
            'key'    => ACCESS_KEY,
            'secret' => SECRET_KEY
        ));

        // método putObject envia os dados pro bucket selecionado (no caso, teste-marcelo
        $response = $clientS3->putObject(array(
            'Bucket' => "pasttini-bot",
            'Key'    => $_FILES['file']['name'],
            'SourceFile' => $_FILES['file']['tmp_name'],
        ));

        $_SESSION['msg'] = "Objeto postado com sucesso, endereco <a href='{$response['ObjectURL']}'>{$response['ObjectURL']}</a>";

        header("location: index.php");

    } catch(Exception $e) {
        echo "Erro > {$e->getMessage()}";
    }

?>
