# 🏭 Projeto Braskem

Projeto acadêmico desenvolvido durante a faculdade, criando um sistema de cadastro e login de usuários.

Objetivo: colocar em prática e demonstrar o aprendizado em PHP, SQL Server, HTML, CSS e JavaScript, aplicando conceitos de desenvolvimento web, validação de formulários e interação com banco de dados.

---

## 📂 Estrutura do Projeto

* **index.html** → Página de cadastro de usuários
* **login.html** → Página de login (em desenvolvimento)
* **cadastro.php** → Script PHP responsável por salvar os dados no banco de dados
* **main.js** → Máscaras para CPF e telefone usando jQuery
* **style.css** → Estilos da aplicação

---

## 🚀 Tecnologias Utilizadas

* PHP
* SQL Server (Express ou versão completa) como banco de dados
* HTML5, CSS3 e JavaScript
* XAMPP como servidor local
* jQuery Mask

---

## ▶️ Funcionalidades Implementadas

* Cadastro de usuários com validação completa de campos obrigatórios
* Aplicação de máscaras em CPF e telefone para melhor experiência do usuário
* Verificação de duplicidade de usuário, CPF ou email antes do cadastro
* Armazenamento seguro de senhas utilizando hashing com PHP
* Layout responsivo básico para **desktop e celular**

---

## 🧪 Próximos Passos / Melhorias Futuras

* Implementar backend para a página de login já desenvolvida, permitindo autenticação de usuários
* Adicionar autenticação de sessão para usuários
* Melhorar o design e responsividade

---

## 💾 Estrutura do Banco de Dados (SQL Server)

Tabela `usuarios`:

```sql
CREATE TABLE usuarios (
    id INT IDENTITY(1,1) PRIMARY KEY,
    nome_completo NVARCHAR(100) NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL,
    usuario NVARCHAR(50) UNIQUE NOT NULL,
    senha NVARCHAR(255) NOT NULL,
    email NVARCHAR(100) UNIQUE NOT NULL,
    telefone NVARCHAR(20) NOT NULL,
    genero CHAR(1) NULL,
    data_nascimento DATE NOT NULL
);
```

---

## 📄 Licença

Projeto criado para fins acadêmicos e de aprendizado.
Não é uma página oficial da Braskem.
