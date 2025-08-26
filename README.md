# Gestão (Legacy)

**Status:** 🟠 Legado / Em refatoração

Este projeto é um **sistema de gestão** desenvolvido em **PHP puro** há 5 anos. Ele está atualmente em processo de **modernização**, antes de ser migrado para Laravel, com estrutura mais organizada, boas práticas e, futuramente, arquitetura orientada a microserviços.

## Objetivos do projeto

- Refatorar código legado em PHP puro.
- Organizar branches principais (`main`, `develop`) e criar tag `legacy`.
- Preparar a base para migrar para Laravel.
- Evoluir para uma arquitetura moderna, escalável e orientada a microserviços.

## Funcionalidades atuais

- Gerenciamento de clientes
- Controle administrativo
- Relatórios básicos
- Operações CRUD em PHP puro

> Obs: Algumas funcionalidades ainda podem implementar código antigo, herdado da versão inicial.

## Tecnologias 

- PHP (procedural)
- MySQL
- HTML/CSS/JS básicos
- Git (controle de versão)

## Estrutura de branches

- `main`: versão estável / refatorada mais recente
- `develop`: branch de desenvolvimento ativo

## Tags

- `legacy`: versão original do código (5 anos atrás)

## Próximos passos

1. Modernizar o código PHP puro, separando responsabilidades e aplicando boas práticas.
2. Migrar para **Laravel**, utilizando MVC, Eloquent ORM e Blade Templates.
3. Evoluir para uma arquitetura com **API-first** e possível integração com front-end Vue/React.
4. Eventual adoção de microserviços para modularizar funcionalidades.

## Contribuição

Este projeto é pessoal e em processo de modernização. Contribuições são bem-vindas para sugestões e melhorias, especialmente na refatoração e padronização do código.

## Licença

[MIT](LICENSE)