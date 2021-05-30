## Instalação

- Fazer o pull request da branch (develop)
- Rodar o comando (composer install) dentro da pasta do projeto, caso não tenha feito.
- Criar a base de dados com o nome de "teste_mesha"
- Rodar o comando (php artisan migrate --seed) para popular a base de dados.
- Instalar a biblioteca jwt-auth parao laravel (https://jwt-auth.readthedocs.io/en/develop/laravel-installation/)
- Rodar o comando (composer dumpautoload)
- Acessar a pasta "angular-front"
- Rodar o comando (npm install)
- Instalar a bibliooteca bootstrap (npm install bootstrap)
- Instalar a biblioteca jquery (npm install jquery)
- Instalar a biblioteca auth0 angular2-jwt (https://github.com/auth0/angular2-jwt)
- Instalar a biblioteca ngx-pagination (https://www.npmjs.com/package/ngx-pagination)
- Instalar a biblioteca ngx-mask (https://www.npmjs.com/package/ngx-mask)
- Instalar a biblioteca br-masks (https://www.npmjs.com/package/br-masks)
- Instalar a biblioteca types (npm install @types/node --save-dev)

## Subir Servidor

- Rodar o comando (php artisan serve) na pasta da api.
- Rodar o comando (ng serve) na pasta angular-front

## Observações

- Foram implementados os design patterns repository e service layer.
- Foi construído comandos para gerar ambos designs que estão no diretório Commands.
- Caso queria utilizar o comando para gerar um reposity rode (php artisan make:respository "Nome que deseja dar para a model"). Será gerado o repositório, a model, a migration e a factory.
- Caso queria utilizar o comando para gerar um service rode (php artisan make:service "Nome da model" "Nome da ação que deseja que o service faça. ex.: Cadastrar"). Será gerado o service com a interface, base, abstract, client e o provider.

