# 📌 Sistema de Cadastro (PHP + PDO)

## 📖 Sobre o projeto

Este sistema foi desenvolvido em PHP com PDO e tem como objetivo o gerenciamento de:

- Contatos
- Clientes
- Produtos

O projeto foi reorganizado utilizando uma estrutura em camadas, separando responsabilidades entre conexão com banco, regras de negócio e interface (MVC básico).

---

## 📁 Nova estrutura de pastas


projeto/
│
├── config/
│ └── database.php # Conexão com banco de dados (PDO)
│
├── models/
│ ├── funcoes.php # Funções de contatos
│ ├── funcoes_clientes.php
│ └── funcoes_produtos.php
│
├── views/
│ └── cabecalho.php # Template HTML reutilizável
│
├── uploads/ # Arquivos enviados
│
├── contatos.php # Lista de contatos
├── clientes.php # Lista de clientes
├── produtos.php # Lista de produtos
│
├── cadastro_.php # Cadastro de registros
├── editar_.php # Edição de registros
├── excluir_*.php # Exclusão de registros
│
├── index.php # Roteador principal do sistema
└── README.md


---

## ⚙️ Como executar o projeto

1. Instalar o XAMPP  
2. Iniciar:
   - Apache  
   - MySQL  

3. Colocar o projeto dentro da pasta:


htdocs/


4. Criar o banco de dados:


agenda


5. Configurar conexão em:


config/database.php


---

## 🌐 Como acessar o sistema

Abra no navegador:


http://localhost:8080/aula26php/


---

## 🔁 Roteador (index.php)

O sistema utiliza um roteador simples via GET:


index.php?pagina=contatos
index.php?pagina=clientes
index.php?pagina=produtos


---

## 🎯 Objetivo da refatoração

- Separar responsabilidades do sistema  
- Organizar o código em camadas  
- Melhorar manutenção e legibilidade  
- Simular estrutura MVC básica  
- Centralizar navegação com roteador  

---

## 👨‍💻 Tecnologias utilizadas

- PHP  
- MySQL  
- PDO  
- HTML5  
- CSS3  

---

## 📌 Observação

Este projeto foi desenvolvido com fins acadêmicos para prática de programação web com PHP e banco de dados.