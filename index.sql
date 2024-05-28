USE tutocrudphp;

create table usuarios(
    id INT NOT NULL primary key auto_increment,
    nome VARCHAR(100),
    usuario VARCHAR(100),
    senha VARCHAR(100)
);