Esse projeto foi desenvolvido afins de estudos, junto com o professor/mentor Carlos Ferreira CTO-Founder da especializaTi.
Foi desenvolvimento uma mini plataforma de estudos EAD, aonde o principal objetivo era por em prática todos os conhecimentos teóricos passados em aulas e por em prática.

Esse projeto foi de grande aprendizado e fortificou os conhecimentos, principalmente em criações de Fk's e relacionamentos de tabelas. Ele está em processo final, mas deixo ele em total condições de serem incluidos nele novas features conforme a evolução dos estudos e aprendizado diariamente. Podendo futuramente ser refátorado o front-end em Vuejs, que é a ferramenta na qual venho estudando e consolidando junto com o Laravel. Podendo também ser aplicados testes unitários, algo que ainda estou em processo de evolução.

Um dos principais conceitos que foi passado e desenvolvido ao longo desse projeto foi:

:white_check_mark: Blade e tailwind css
:white_check_mark: Relacionamentos entre tabelas no banco de dados com Mysql;
:white_check_mark: Accessors & Mutators
:white_check_mark: Casts
:white_check_mark: Events, Listeners e E-mails
:white_check_mark: Autenticação
:white_check_mark: Conceito de repositorys, presenters e interfaces
:white_check_mark: Criar, editar e deletar dados
:white_check_mark: Filtros de usuários
:white_check_mark: Filtros de cursos
:white_check_mark: Filtros de aulas
:white_check_mark: Filtros de suporte por status(pendente, concluido ou aguardando)
:white_check_mark: Filtros de módulos

Features para implementar
[x] Select mostrar todas as duvidas
[x] Refatorar front em Vuejs e Inertia
[x] Escrever testes

How to start the project

docker-compose up -d

docker exec container bash
cp .env.example .env 


php artisan key:generate


docker exec container php artisan migrate:fresh --seed
 
