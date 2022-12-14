### Resumo:

```sh
Esse projeto foi desenvolvido afins de estudos, junto com o professor/mentor Carlos Ferreira CTO-Founder da especializaTi.
Foi desenvolvimento uma mini plataforma de estudos EAD, aonde o principal objetivo
era por em prática todos os conhecimentos teóricos passados em aulas e por em prática.
Esse projeto foi de grande aprendizado e fortificou os conhecimentos, principalmente em criações de Fks e relacionamentos de tabelas. 
Ele está em processo final, mas deixo ele em total condições 
de serem incluidos nele novas features conforme a evolução dos estudos e aprendizado diariamente. 
Podendo futuramente ser refátorado o front-end em Vuejs, que é a ferramenta na qual venho estudando
e consolidando junto com o Laravel. 
Podendo também ser aplicados testes unitários, algo que ainda estou em processo de evolução.
```

### Um dos principais conceitos que foi passado e desenvolvido ao longo desse projeto foi:

```sh
[x] Blade e tailwind css
[x] Relacionamentos entre tabelas no banco de dados com Mysql;
[x] Accessors & Mutators
[x] Casts
[x] Events, Listeners e E-mails
[x] Autenticação
[x] Conceito de repositorys, presenters e interfaces
[x] Criar, editar e deletar dados
[x] Filtros de usuários
[x] Filtros de cursos
[x] Filtros de aulas
[x] Filtros de suporte por status(pendente, concluido ou aguardando)
[x] Filtros de módulos
```

### Features para implementar
```sh
[x] Select mostrar todas as duvidas
[x] Refatorar front em Vuejs e Inertia
[x] Escrever testes
```

### Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=Teste
APP_URL=http://localhost:8180

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


### Suba os containers do projeto
```sh
docker-compose up -d
```


### Acessar o container
```sh
docker-compose exec app bash
```


### Instalar as dependências do projeto
```sh
composer install
```


### Gerar a key do projeto Laravel
```sh
php artisan key:generate
```
 
