# Conversor de Moedas

Este projeto é um conversor de moedas desenvolvido em PHP. Ele consome uma API para obter dados de cotação de moedas em tempo real. O frontend utiliza JQuery para algumas funções, como requisições Ajax, e Bootstrap para estilização.

## Requisitos

- **PHP 8.0** ou superior
- **Composer** para o gerenciamento de dependências
- **XAMPP** para execução do servidor Apache
- **cURL** habilitado no PHP

## Instalação

### 1. Instalando PHP e Composer

Para instalar o PHP e o Composer, utilize os comandos abaixo (no Windows, usando o Chocolatey):

```bash
choco install php
choco install composer
```

### 2. Ativando o cURL no PHP
Verifique se a extensão cURL está habilitada no seu PHP. Para fazer isso:

Abra o arquivo php.ini localizado na pasta de instalação do XAMPP (geralmente xampp/php/php.ini).

Encontre a linha que contém ;extension=curl e remova o ponto e vírgula (;) no início da linha para descomentá-la:

```bash
extension=curl
```

### 3. Clonando o Repositório

Clone este repositório e coloque-o dentro de um diretório chamado conversor

```bash
git clone <URL_DO_REPOSITORIO> conversor
```

### 4. Movendo o Projeto para o Diretório do XAMPP

Após o clone, mova o diretório conversor para dentro do diretório htdocs do XAMPP:

```bash
xampp/htdocs/conversor
```

### 5. Instalando Dependências

No terminal, navegue até o diretório conversor dentro de htdocs e execute o comando abaixo para instalar as dependências do projeto:

```bash
composer install
```

## Execução

- Inicie o Apache pelo XAMPP.
- Acesse o projeto pela URL:

``` bash
http://localhost/conversor/
```
> **Nota:** A execução deve ser feita exclusivamente por essa URL. Caso contrário, o controle de rotas do projeto não conseguirá renderizar o frontend corretamente.

## API Utilizada

Este projeto consome a API de Moedas da <a href="https://docs.awesomeapi.com.br/api-de-moedas">AwesomeAPI</a> para obter cotações em tempo real.

## Desenvolvido por:

- Djonatan Rodrigues de Oliveira;
- Ayrton Lorenzo Klettenberg 