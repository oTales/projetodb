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