
# 📋 Cadastro de Aluno
 
Formulário web desenvolvido em PHP para cadastro e gerenciamento de alunos.
 
---
 
## 📌 Sobre o Projeto
 
O **Cadastro de Aluno** é uma aplicação web simples e funcional que permite registrar informações de alunos por meio de um formulário HTML integrado ao back-end em PHP, com persistência de dados em banco de dados MySQL.
 
---
 
## 🚀 Funcionalidades
 
- ✅ Cadastro de novos alunos
- ✅ Validação de campos no formulário
- ✅ Armazenamento dos dados no banco de dados
- ✅ Feedback visual ao usuário após o envio
 
---
 
## 🛠️ Tecnologias Utilizadas
 
- **PHP** — lógica de back-end e processamento do formulário
- **HTML5 / CSS3** — estrutura e estilização do formulário
- **MySQL** — banco de dados relacional para persistência
- **Apache / XAMPP** — servidor local para desenvolvimento
 
---
 
## 📁 Estrutura do Projeto
 
```
cadastro-de-aluno/
├── index.php          # Página principal com o formulário
├── cadastrar.php      # Processamento e inserção no banco
├── conexao.php        # Configuração da conexão com o banco
├── style.css          # Estilos da aplicação
└── README.md
```
 
---
 
## ⚙️ Como Executar Localmente
 
### Pré-requisitos
 
- [XAMPP](https://www.apachefriends.org/) ou qualquer servidor com PHP e MySQL
 
### Passo a passo
 
1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/cadastro-de-aluno.git
   ```
 
2. Copie a pasta para o diretório do servidor:
   ```
   htdocs/cadastro-de-aluno   (XAMPP)
   ```
 
3. Importe o banco de dados:
   - Acesse o **phpMyAdmin**
   - Crie um banco chamado `cadastro_aluno`
   - Importe o arquivo `database.sql` (se disponível)
 
4. Configure a conexão em `conexao.php`:
   ```php
   $host = "localhost";
   $usuario = "root";
   $senha = "";
   $banco = "cadastro_aluno";
   ```
 
5. Acesse no navegador:
   ```
   http://localhost/cadastro-de-aluno/
   ```
 
---
 
## 🗃️ Estrutura do Banco de Dados
 
```sql
CREATE TABLE alunos (
    id        INT AUTO_INCREMENT PRIMARY KEY,
    nome      VARCHAR(100) NOT NULL,
    email     VARCHAR(100) NOT NULL,
    cpf       VARCHAR(14)  NOT NULL,
    telefone  VARCHAR(15),
    curso     VARCHAR(100),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## 👨‍💻 Autor
 
Feito por **Henrique Rodrigues**  
[![GitHub](https://img.shields.io/badge/GitHub-henriquerodrigues-181717?style=flat&logo=github)](https://github.com/seu-usuario)