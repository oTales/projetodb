# projetodb
INSERT INTO db_construtora.endereco (idcliente,Rua,UF,cidade,Bairro,cadastro) VALUES (1,'Rua das Rosas','MG','Governador Valadares','Penha','2020-05-05')


INSERT INTO db_construtora.conta (idcliente,idtipoconta,idstatusConta,Valor,cadastro) VALUES (1,2,3,60.50,'2020-05-05');

INSERT INTO db_construtora.construcao (idstatusConstrucao,DataInicio,DataTermino,cadastro) VALUES (1,'2010-05-05','2012-05-05','2020-05-05');

INSERT INTO db_construtora.arquiteto (idconstrucao,idprojetosArquitetura,CAU) VALUES (1,1,'20345-5');


INSERT INTO db_construtora.engenheiro (idconstrucao,idprojetosEngenharia,CREA) VALUES (1,1,'20345-5');

INSERT INTO db_construtora.orcamento (idconstrucao,Orcamento,cadastro) VALUES (1,300.000,'20345-5');

INSERT INTO db_construtora.funcionario (idcliente,idcondominio,idsetorFuncionario,Admissao,cadastro) VALUES (1,1,1,'2010-07-04','2010-07-04');
