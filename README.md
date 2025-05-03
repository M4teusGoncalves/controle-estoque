# Sistema de Controle de Estoque

Sistema web desenvolvido em Laravel 10.48.29 para gerenciamento de estoque, com funcionalidades de cadastro de produtos, controle de movimentações e autenticação segura.

## 🚀 Tecnologias Utilizadas

- Laravel 10.48.29
- PHP 8.1
- MySQL
- Bootstrap
- Laravel Sanctum

## ✨ Funcionalidades

- **Cadastro e Gerenciamento de Produtos**
  - CRUD completo de produtos
  - Campos: nome, unidade de medida, quantidade em estoque, quantidade mínima
  - Validação de dados
  - Interface intuitiva

- **Controle de Movimentações**
  - Registro de entradas e saídas
  - Histórico de movimentações
  - Atualização automática do estoque
  - Relacionamento com produtos

- **Sistema de Autenticação**
  - Autenticação segura com Laravel Sanctum
  - Proteção de rotas
  - Gerenciamento de sessões
  - Validação de credenciais

- **Interface Responsiva**
  - Design moderno com Bootstrap
  - Layout adaptável
  - Feedback visual
  - Mensagens de sucesso/erro

## 🛠️ Boas Práticas Implementadas

- Padrão MVC (Model-View-Controller)
- Migrações para controle de versão do banco de dados
- Validação de dados (cliente e servidor)
- Tratamento de erros
- Segurança na autenticação

## 📋 Pré-requisitos

- PHP 8.1 ou superior
- Composer
- MySQL
- Node.js e NPM (opcional, para assets)

## 🔧 Instalação

1. Clone o repositório:
```bash
git clone https://github.com/seu-usuario/controle-estoque.git
```

2. Instale as dependências:
```bash
composer install
```

3. Copie o arquivo .env.example para .env:
```bash
cp .env.example .env
```

4. Configure o arquivo .env com suas credenciais de banco de dados

5. Gere a chave da aplicação:
```bash
php artisan key:generate
```

6. Execute as migrações:
```bash
php artisan migrate
```

7. Inicie o servidor:
```bash
php artisan serve
```

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 📧 Contato

Mateus Gonçalves do Nascimento- [mateusgn4@gmail.com](mailto:mateusgn4@gmail.com)

Link do Projeto: [https://github.com/seu-usuario/controle-estoque](https://github.com/seu-usuario/controle-estoque)
