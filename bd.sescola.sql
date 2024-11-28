git config --global user.name "show databases;

create database SistemaEscolar;

use SistemaEscolar;

create table aluno
(matricula int,
nomeal varchar (50),
nasc date,
turma varchar (10)
);
insert into aluno values(1, 'José', '20140101', '1A');
create table professor
(codprof int,
nomeprof varchar (50),
disci varchar (20),
cargahr time
);
insert into professor values(1,'Maria', 'Matemática', '200');
create table grade
(semes int,
disci varchar (20),
turma varchar (10),
hr time
);
insert into grade values(1, 'Matemática', '1A', '200');
create table boletim
(matricula int,
disci varchar (20),
nota varchar (10),
nota2 varchar (10)
);
insert into boletim values(1, 'Matemática', '10', '10');
SELECT
a.matricula
a.nasc,
a.nomeal,
p.nomeprof,
a.turma,
p.codprof,
p.cargahr,
g.disci
g.semes,
g.hr

FROM 
    boletim b
INNER JOIN 
    aluno a ON a.matricula = b.matricula
INNER JOIN 
    grade g ON g.disc = b.disci;


show tables ; -- ver tabelas

desc aluno;

select * from aluno; -- executa tabela

select * from professor; -- executa tabela

select * from grade; -- executa tabela

drop table boletim;







