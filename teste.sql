-- Active: 1684205998041@@localhost@3306@db_construtora
SELECT *
FROM
    db_construtora.funcionario
    LEFT JOIN db_construtora.setorfuncionario ON funcionario.idsetorFuncionario = setorfuncionario.idsetorFuncionario;

    SELECT
    funcionario.idFuncionario,
    funcionario.IdCliente,
    funcionario.idsetorFuncionario,
    funcionario.idcondominio,
    setorfuncionario.setorFuncionario
FROM
    db_construtora.funcionario
    LEFT JOIN db_construtora.setorfuncionario ON funcionario.idsetorFuncionario = setorfuncionario.idsetorFuncionario;

SELECT * FROM cliente;
    SELECT
    funcionario.idFuncionario,
    funcionario.IdCliente,
    cliente.nome AS Nome,
    funcionario.idsetorFuncionario,
    funcionario.idcondominio,
    condominio.nomeCondominio AS Condominio,
    setorfuncionario.setorFuncionario
FROM
    db_construtora.funcionario
    INNER JOIN db_construtora.setorfuncionario ON funcionario.idsetorFuncionario = setorfuncionario.idsetorFuncionario
    INNER JOIN db_construtora.cliente ON funcionario.IdCliente = cliente.idCliente
    INNER JOIN db_construtora.condominio ON funcionario.idcondominio = condominio.idCondominio;

    SELECT construcao.idconstrucao, construcao.idstatusConstrucao FROM db_construtora.construcao INNER JOIN db_construtora.statusconstrucao ON construcao.idstatusConstrucao = statusconstrucao.idstatusConstrucao;

    SELECT
    condominio.idCondominio,
    condominio.nomeCondominio,
    condominio.Rua,condominio.UF,condominio.Bairro,Condominio.numero,
    COUNT(predio.idPredio) AS totalPredios
FROM condominio
    LEFT JOIN predio ON condominio.idCondominio = predio.idCondominio
GROUP BY
    condominio.idCondominio,
    condominio.nomeCondominio,
    condominio.Rua,condominio.UF,condominio.Bairro,Condominio.numero;

    INSERT INTO cliente(idgenero,Nome) VALUES (1,'talesiewqeqw');
DELETE FROM db_construtora.funcionario WHERE idfuncionario = 19;
    SELECT construcao.idconstrucao,construcao.idstatusconstrucao,construcao.DataInicio,construcao.DataTermino,statusconstrucao.idstatusconstrucao,statusconstrucao.statusConstrucao FROM db_construtora.construcao
INNER JOIN db_construtora.statusConstrucao ON construcao.idstatusConstrucao = statusconstrucao.idstatusConstrucao;
SELECT
    tc.idconstrucao,
    ta.idconstrucao,
    tc.DataInicio,
    tc.DataTermino,
    ta.idArquiteto
FROM construcao AS tc
    INNER JOIN arquiteto AS ta ON tc.idconstrucao = ta.idconstrucao;
SELECT
tc.idconstrucao,
ta.idconstrucao,
tc.DataInicio,
tc.DataTermino,
ta.idArquiteto,
tc.NomeConstrucao,
tpa.idconstrucao,
ta.CAU,
te.idcliente,
ta.idcliente,
tcl.idcliente,
tcl.Nome,
tpa.ProjetosArquitetura
FROM construcao as tc 
INNER JOIN arquiteto as ta ON tc.idconstrucao = ta.idconstrucao 
INNER JOIN projetosarquitetura AS tpa ON tc.idconstrucao = tpa.idconstrucao 
INNER JOIN cliente as tcl and engenheiro as te ON tcl.idcliente = ta.idcliente and te.cliente
INNER JOIN projetosengenharia AS tpe ON tc.idconstrucao = tpe.idconstrucao;
SELECT
    tc.idconstrucao,
    ta.idconstrucao,
    tc.DataInicio,
    tc.DataTermino,
    ta.idArquiteto,
    tc.NomeConstrucao,
    tpa.idconstrucao,
    ta.CAU,
    te.idcliente,
    ta.idcliente,
    tcl.idcliente,
    tcl.Nome,
    tpa.ProjetosArquitetura
FROM construcao AS tc
    INNER JOIN arquiteto AS ta ON tc.idconstrucao = ta.idconstrucao
    INNER JOIN projetosarquitetura AS tpa ON tc.idconstrucao = tpa.idconstrucao
    INNER JOIN cliente AS tcl ON tcl.idcliente = ta.idcliente
    INNER JOIN cliente as tcl ON tcl.idcliente = te.idcliente
    INNER JOIN projetosengenharia AS tpe ON tc.idconstrucao = tpe.idconstrucao;
SELECT
    tc.idconstrucao,
    tpa.idconstrucao,
    tc.NomeConstrucao,
    tpa.ProjetosArquitetura
FROM construcao AS tc
    INNER JOIN projetosarquitetura AS tpa ON tc.idconstrucao = tpa.idconstrucao;
ALTER TABLE
    projetosArquitetura
ADD
    CONSTRAINT fk_projetosArquitetura_idArquiteto FOREIGN KEY (idArquiteto) REFERENCES arquiteto(idArquiteto);
ALTER TABLE
    projetosArquitetura
ADD COLUMN idArquiteto INT UNSIGNED,
ADD
    FOREIGN KEY (idArquiteto) REFERENCES arquiteto(idArquiteto);

SELECT 
tc.idcliente,
tc.Nome,
tco.NomeCondominio,
tf.idcliente,
tf.idsetorFuncionario,

tf.idcondominio,
tco.idcondominio,
tsf.idsetorFuncionario
from funcionario as tf 
INNER JOIN cliente as tc ON tf.idcliente = tc.idcliente
INNER JOIN setorfuncionario as tsf ON tf.idsetorFuncionario = tsf.idsetorFuncionario
INNER JOIN condominio as tco on tf.idcondominio = tco.idcondominio