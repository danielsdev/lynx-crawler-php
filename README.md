# lynx-crawler-php

Esse é um simples desafio técnico proposto pela crawly

## Desafio

O desafio é recuperar a resposta que está em uma página por trás de um click de botão,
essa página pode ser encontrada nesse [link](http://applicant-test.us-east-1.elasticbeanstalk.com/).
A restrição é não poder usar emuladores de browser (como puppeteer, selenium, phantomjs, jsdom, etc.), ou seja, apenas criar um crawler que faça as requisições para a página.

## Como usar
Basta executar os seguintes comandos:

```bash
docker-compose run --rm lynx-crawler-php bash

php bin/get-answer.php
```
- O primeiro comando irá fazer o build do container e te dar acesso a um shell interativo.
- O segundo comando irá executar um script PHP que irá buscar a resposta.

Após executar isso, você terá uma saída semelhante a essa:

```bash
A resposta é: 60
```

## Tecnologias
- PHP 8
- Docker
- Docker Compose

## Ferramentas e bibliotecas
- PHPUnit
- PHP-CS-Fixer
- HTTP Client Component
- DomCrawler Component

## Testes
Nesse projeto foram criados alguns testes unitários e testes funcionais.

Para executar esses testes, basta rodar o seguinte comando:

```bash
./vendor/bin/phpunit --testdox tests
```

Após isso, você irá notar que foi criado um pequeno relatório em: `/QA/phpunit/testdox.txt` contendo informações sobre os testes que foram realizados.

## Design de código
Esse projeto também conta com uma ferramenta para auxiliar no design de código.

Foram usadas algumas regras específicas que você pode encontrar no arquivo `.php-cs-fixer.php`. Caso precise editar essas regras, basta consultar essa [documentação](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst).

Para analisar os arquivos de código do projeto, basta executar o seguinte comando:

```bash
PHP_CS_FIXER_IGNORE_ENV=1 ./vendor/bin/php-cs-fixer --dry-run -v --diff fix --config=.php-cs-fixer.php
```

## License
