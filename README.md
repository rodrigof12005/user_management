
# Sistema de Usuários

Esse projeto consiste em um sistema de gerenciamento de Usuários onde  é possível se cadastrar , acessar o sistema , recuperar a senha via email e alterar seus dados de perfil. Existem 2 tipos de usuários (Administrador e Usuário) sendo o primeiro com acesso ao painel administrativo do gerenciamento de usuários onde ele pode fazer  exclusões, updates dos usuários existentes no sistema bem como alterar o perfil de cada usuário.
O painel administrativo só é acessível com usuários de perfis Administrador.

# Requisitos:
Composer >=2.0 , PHP 8.1 , MYSQL

Após baixar o projeto executar essas etapas

1.Renomear o .env.example para .env e alterar suas configurações
de banco de dados e email que será enviado e usado para recuperação de senha dos usuários.

2.composer update , php artisan migrate, php artisan db::seed , php artisan storage:link .

Será criado o usuário Administrador com credenciais de login email('admin@teste.com') e password('admin@admin').

Rodrigo Duarte https://www.linkedin.com/in/rodrigo-duarte-461a99165/


