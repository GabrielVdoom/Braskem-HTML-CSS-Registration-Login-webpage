<?php

$hostname = "Dellzilla\\SQLEXPRESS";
$connectionOptions = array(
    "database" => "Braskem",
    "uid" => "",
    "pwd" => "",
);

$conexao = sqlsrv_connect($hostname, $connectionOptions);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $genero = isset($_POST["genero"]) ? $_POST["genero"] : null;
    $datadenascimento = $_POST["datadenascimento"];

    $nome = trim($nome);
    $usuario = trim($usuario);
    $senha = trim($senha);
    $cpf = str_replace(array('.', '-'), '', $cpf);
    $email = trim($email);

    if (!empty($usuario) && !empty($senha) && !empty($cpf) && !empty($email) && !empty($telefone) && !empty($datadenascimento)) {
        
        // Verificar se o usuário, email ou cpf já existem
        $checkSql = "SELECT COUNT(*) AS count FROM usuarios WHERE usuario = ? OR email = ? OR cpf = ?";
        $checkParams = array($usuario, $email, $cpf);
        $checkQuery = sqlsrv_query($conexao, $checkSql, $checkParams);
        
        if ($checkQuery === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $row = sqlsrv_fetch_array($checkQuery, SQLSRV_FETCH_ASSOC);
        
        if ($row['count'] > 0) {
            echo "<script>alert('Usuário, email ou CPF já cadastrados!');</script>";
        } else {

            // Criar hash seguro da senha antes de salvar
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // Inserir os dados na tabela
            $sql = "INSERT INTO usuarios (nome_completo, cpf, usuario, senha, email, telefone, genero, data_nascimento) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $params = array($nome,$cpf, $usuario, $senhaHash, $email, $telefone, $genero, $datadenascimento);
            $query = sqlsrv_query($conexao, $sql, $params);

            if ($query === false) {
                die(print_r(sqlsrv_errors(), true));
            } else {
                echo "<script>alert('Dados inseridos com sucesso!');</script>";
            }
        }
    }
}
?>
