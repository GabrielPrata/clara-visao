CREATE TABLE USUARIOS(
	ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	NOME VARCHAR(100) NOT NULL,
	SOBRENOME VARCHAR(100) NOT NULL,
	USERNAME VARCHAR(25) NOT NULL,
	EMAIL VARCHAR(255) NOT NULL,
	SENHA VARCHAR(80) NOT NULL,
	ADM INT(1) NOT NULL DEFAULT 0,
	TELEFONE VARCHAR(20),
	IMAGEM VARCHAR(255) DEFAULT 'user_padrao.jpg'
);

CREATE TABLE CLIENTES(
	ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	CLIENTE VARCHAR(255) NOT NULL,
	PROFISSAO VARCHAR(100) DEFAULT 'Não informado',
	DATA_NASCIMENTO DATE NOT NULL,
	TELEFONE_1 VARCHAR(18) NOT NULL,
	TELEFONE_2 VARCHAR(18) DEFAULT 'Não informado',
	CIDADE VARCHAR(60) DEFAULT 'Descalvado',
	FOTO VARCHAR(150) DEFAULT 'user_padrao.jpg',
	OBSERVACAO TEXT
);

CREATE TABLE FUNCIONARIOS(
	ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	CODIGO VARCHAR(50) NOT NULL,
	NOME VARCHAR(255) NOT NULL,
	TELEFONE VARCHAR(20) DEFAULT 'Não informado',
	EMAIL VARCHAR(255) DEFAULT 'Não informado',
	ENDERECO VARCHAR(255) DEFAULT 'Não informado',
	BAIRRO VARCHAR(100) DEFAULT 'Não informado'
);

CREATE TABLE LABORATORIOS(
	ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	NOME VARCHAR(255) NOT NULL,
	TELEFONE VARCHAR(20) DEFAULT 'Não Cadastrado',
	ENDERECO VARCHAR(255) DEFAULT 'Não Cadastrado'
);

CREATE TABLE ARMACAO(
	ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	ARMACAO VARCHAR(100) NOT NULL 
);

CREATE TABLE OFTALMOLOGISTA(
	ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	OFTALMOLOGISTA VARCHAR(100) NOT NULL,
	TELEFONE VARCHAR(20) DEFAULT 'Não Cadastrado'
);

CREATE TABLE MEDIDAS(
	ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	LONGE_OD_ESF VARCHAR(8) DEFAULT '0',
	LONGE_OD_CIL VARCHAR(8) DEFAULT '0',
	LONGE_OD_EIXO VARCHAR(8) DEFAULT '0',
	LONGE_OD_ADICAO VARCHAR(8) DEFAULT '0',
	LONGE_OD_DNP VARCHAR(8) DEFAULT '0',
	LNGE_OD_ALTURA VARCHAR(8) DEFAULT '0',
	LONGE_OE_ESF VARCHAR(8) DEFAULT '0',
	LONGE_OE_CIL VARCHAR(8) DEFAULT '0',
	LONGE_OE_EIXO VARCHAR(8) DEFAULT '0',
	LONGE_OE_ADICAO VARCHAR(8) DEFAULT '0',
	LONGE_OE_DNP VARCHAR(8) DEFAULT '0',
	LONGE_OE_ALTURA VARCHAR(8) DEFAULT '0',
	PERTO_OD_ESF VARCHAR(8) DEFAULT '0',
	PERTO_OD_CIL VARCHAR(8) DEFAULT '0',
	PERTO_OD_EIXO VARCHAR(8) DEFAULT '0',
	PERTO_OD_ADICAO VARCHAR(8) DEFAULT '0',
	PERTO_OD_DNP VARCHAR(8) DEFAULT '0',
	PERTO_OD_ALTURA VARCHAR(8) DEFAULT '0',
	PERTO_OE_ESF VARCHAR(8) DEFAULT '0',
	PERTO_OE_CIL VARCHAR(8) DEFAULT '0',
	PERTO_OE_EIXO VARCHAR(8) DEFAULT '0',
	PERTO_OE_ADICAO VARCHAR(8) DEFAULT '0',
	PERTO_OE_DNP VARCHAR(8) DEFAULT '0',
	PERTO_OE_ALTURA VARCHAR(8) DEFAULT '0',
	MEDIA_OD_ESF VARCHAR(8) DEFAULT '0',
	MEDIA_OD_CIL VARCHAR(8) DEFAULT '0',
	MEDIA_OD_EIXO VARCHAR(8) DEFAULT '0',
	MEDIA_OD_ADICAO VARCHAR(8) DEFAULT '0',
	MEDIA_OD_DNP VARCHAR(8) DEFAULT '0',
	MEDIA_OD_ALTURA VARCHAR(8) DEFAULT '0',
	MEDIA_OE_ESF VARCHAR(8) DEFAULT '0',
	MEDIA_OE_CIL VARCHAR(8) DEFAULT '0',
	MEDIA_OE_EIXO VARCHAR(8) DEFAULT '0',
	MEDIA_OE_ADICAO VARCHAR(8) DEFAULT '0',
	MEDIA_OE_DNP VARCHAR(8) DEFAULT '0',
	MEDIA_OE_ALTURA VARCHAR(8) DEFAULT '0',
	CLIENTE INT,
	FOREIGN KEY (CLIENTE) REFERENCES CLIENTES(ID)
);

CREATE TABLE ORCAMENTOS(
	ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	CLIENTE INT NOT NULL,
	FOREIGN KEY (CLIENTE) REFERENCES CLIENTES(ID),
	VENDEDOR_ID INT,
	FOREIGN KEY (VENDEDOR_ID) REFERENCES FUNCIONARIOS(ID),
	DATA_CRIACAO DATE,
	DATA_ENTREGA DATE,
	OS VARCHAR(10),
	MEDIDAS INT,
	FOREIGN KEY (MEDIDAS) REFERENCES MEDIDAS(ID),
	OFTALMOLOGISTA VARCHAR(255),
	ARMACAO VARCHAR(255),
	COD_LOJA VARCHAR(50),
	ARMACAO_REFERENCIA VARCHAR(255),
	ARMACAO_PRECO VARCHAR(18),
	ARMACAO_TIPO INT,
	FOREIGN KEY (ARMACAO_TIPO) REFERENCES ARMACAO(ID),
	LENTE VARCHAR(255),
	LENTE_PRECO VARCHAR(18),
	OBSERVACAO TEXT,
	LABORATORIO INT,
	FOREIGN KEY (LABORATORIO) REFERENCES LABORATORIOS(ID),
	PONTE_ARO VARCHAR(10),
	DIAG_MAIOR VARCHAR(10),
	VERTICAL VARCHAR(10), 
	DESCONTO VARCHAR(18),
	TOTAL VARCHAR(18),
	FORMA_PAG VARCHAR(30),
	NUM_PARCELAS INT
);

CREATE TABLE TEMPEMAIL(
	ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	TEMP_LINK VARCHAR(255) NOT NULL,
	EXPIRA TIMESTAMP NOT NULL,
	ID_ACCOUNT INT,
	FOREIGN KEY (ID_ACCOUNT) REFERENCES USUARIOS(ID)
);

CREATE TABLE SITE_SETTINGS(
	SETTING_ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	ATRIBUTO VARCHAR(75) NOT NULL,
	VALUE1 VARCHAR(255) DEFAULT 'NULL',
	VALUE2 VARCHAR(255) DEFAULT 'NULL',
	VALUE3 VARCHAR(255) DEFAULT 'NULL',
	VALUE4 VARCHAR(255) DEFAULT 'NULL',
	VALUE5 VARCHAR(255) DEFAULT 'NULL',
	VALUE6 VARCHAR(255) DEFAULT 'NULL'
);

INSERT INTO USUARIOS(NOME, SOBRENOME, USERNAME, EMAIL, SENHA, ADM, TELEFONE) VALUES ('Admin', 'Admin', 'admin', 'admin@admin.com', '$2y$10$OpTJpSSwmuhcMygfKg4DG.I1z/J6rtUU9sRD53BLOwB8hH.M4vnd2', 1, '12345');
INSERT INTO USUARIOS(NOME, SOBRENOME, USERNAME, EMAIL, SENHA, ADM, TELEFONE) VALUES ('Usuário', 'Tester', 'usuario', 'usuario@admin.com', '$2y$10$OpTJpSSwmuhcMygfKg4DG.I1z/J6rtUU9sRD53BLOwB8hH.M4vnd2', 0, '54321');

INSERT INTO SITE_SETTINGS(ATRIBUTO, VALUE1, VALUE2, VALUE3, VALUE4, VALUE5, VALUE6) VALUES ('recuperar_senha', 'seuemail@seuemail.com', 'senha_do_email', 'smtp.gmail.com', '587', '', '');