<?php

session_start(); // Inicia a sessão
require_once "conexao.php"; // Importa o arquivo de conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = ($_POST["usuario-login"]);
    $senha   = ($_POST["senha-login"]);

    if (!empty($usuario) && !empty($senha)) {
        // Procurar o usuário no banco
        $sql = "SELECT usuario, senha FROM usuarios WHERE usuario = ?";
        $params = array($usuario);
        $stmt = sqlsrv_query($conexao, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        if (sqlsrv_has_rows($stmt)) {
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            $senhaHash = $row["senha"];

            // Verificar senha com password_verify
            if (password_verify($senha, $senhaHash)) {
                $_SESSION["usuario"] = $usuario;

                echo "Login realizado com sucesso!";
            } else {
                echo "<script>
                        alert('Senha incorreta!');
                        window.location.href='login.html';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Usuário não encontrado!');
                    window.location.href='login.html';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Preencha todos os campos!');
                window.location.href='login.html';
              </script>";
    }
}
?>
