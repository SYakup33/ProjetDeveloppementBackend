CREATE DATABASE evaluation;

USE evaluation;

CREATE TABLE civilite(
	id INT NOT NULL,
	libelle_court VARCHAR(5) NOT NULL,
	libelle_long VARCHAR(50) NOT NULL,
	CONSTRAINT PK_CIV PRIMARY KEY(id)
);



CREATE TABLE pays(
	id INT NOT NULL,
	code VARCHAR(5) NOT NULL,
	nom VARCHAR(150) NOT NULL,
	CONSTRAINT PK_PAYS PRIMARY KEY(id)
);

CREATE TABLE cp_ville(
	id INT NOT NULL,
	codepostal CHAR(5),
	ville VARCHAR(150),
	idcpville INT NOT NULL,
	CONSTRAINT PK_CP_VILLE PRIMARY KEY(id),
	CONSTRAINT FK_CPVILLE_PAYS FOREIGN KEY(idcpville) REFERENCES pays(id)
);

CREATE TABLE module(
	id INT NOT NULL,
	code VARCHAR(10) NOT NULL,
	libele VARCHAR(250) NOT NULL,
	description TEXT NOT NULL,
	CONSTRAINT PK_MODULE PRIMARY KEY(id)
);


CREATE TABLE participant(
	id INT NOT NULL,
	nom VARCHAR(50) NOT NULL,
	prenom VARCHAR(50) NOT NULL,
	date_naissance DATE NOT NULL,
	adresse1 VARCHAR(250) NOT NULL,
	adresse2 VARCHAR(250) DEFAULT NULL,
	idcpville INT NOT NULL,
	idcivilite INT NOT NULL,
	CONSTRAINT PK_PART PRIMARY KEY(id),
	CONSTRAINT FK_PART_CPVILLE FOREIGN KEY(idcpville) REFERENCES cp_ville(id),
	CONSTRAINT FK_PART_CIV FOREIGN KEY(idcivilite) REFERENCES civilite(id)
);
ALTER TABLE participant DROP adresse2;
ALTER TABLE participant ADD adresse2 VARCHAR(250) DEFAULT NULL ;

CREATE TABLE email(
	id INT NOT NULL,
	adresse VARCHAR(250) NOT NULL,
	idparticipant INT NOT NULL,
	CONSTRAINT PK_EMAIL PRIMARY KEY(id),
	CONSTRAINT FK_EMAIL_PART FOREIGN KEY(idparticipant) REFERENCES participant(id)
);

CREATE TABLE attribuer(
	id INT NOT NULL,
	note FLOAT(5,2) NOT NULL,
	dateevaluation DATE NOT NULL,
	idmodule INT NOT NULL,
	idparticipant INT NOT NULL,
	CONSTRAINT PK_ATTRIBUE PRIMARY KEY(id),
	CONSTRAINT FK_ATTR_MOD FOREIGN KEY(idmodule) REFERENCES module(id),
	CONSTRAINT FK_ATTR_PART FOREIGN KEY(IDPARTICIPANT) REFERENCES participant(id)
);

CREATE TABLE societe(
	id INT NOT NULL,
	nom VARCHAR(100) NOT NULL,
	CONSTRAINT PK_SOC PRIMARY KEY(id)
);

CREATE TABLE travailler(
	id INT NOT NULL,
	idparticipant INT NOT NULL,
	idsociete INT NOT NULL,
	dateembauche DATE NOT NULL,
	datedebauche DATE DEFAULT NULL,
	CONSTRAINT PK_TRAV PRIMARY KEY(id),
	CONSTRAINT FK_TRAV_PART FOREIGN KEY(idparticipant) REFERENCES participant(id),
	CONSTRAINT FK_TRAV_SOC FOREIGN KEY(idsociete) REFERENCES societe(id)
);

ALTER TABLE participant ADD idpermis INT DEFAULT NULL;
ALTER TABLE participant 
	ADD CONSTRAINT FK_PART_PERM FOREIGN KEY(idpermis) REFERENCES permis(id);

CREATE TABLE permis(
	id INT NOT NULL,
	libelle VARCHAR(50) NOT NULL,
	CONSTRAINT PK_PERMIS PRIMARY KEY(id)
);
-- ------------------6 sociétés----------------------------
INSERT INTO societe(id,nom) VALUES(1,'Duck & Coé');
INSERT INTO societe(id,nom) VALUES(2,'Avande');
INSERT INTO societe(id,nom) VALUES(3,'Technomade');
INSERT INTO societe(id,nom) VALUES(4,'Absys');
INSERT INTO societe(id,nom) VALUES(5,'Orange');
INSERT INTO societe(id,nom) VALUES(6,'Talan');

-- ------------------3 permis------------------------------
INSERT INTO permis(id,libelle) VALUES(1,'Permis A');
INSERT INTO permis(id,libelle) VALUES(2,'Permis B');
INSERT INTO permis(id,libelle) VALUES(3,'Permis C');

-- -----------------12 modules---------------------------
INSERT INTO module(id,code,libele,description)
	VALUES 
		(1,'234aaa','HTML','cours html'),
		(2,'234aab','CSS','cours css'),
		(3,'234aac','ALGO','cours d\'algorithmique'),
		(4,'234aad','BOOTSTRAP','initiation bootstrap'),
		(5,'234aae','PHP','cours php'),
		(6,'234aaf','HUMAN SKILLS','cours human skills'),
		(7,'234aag','POWER APPS','cours power apps'),
		(8,'234aah','AUTOMATE','cours power automate'),
		(9,'234aai','CDC','cours cahier des charges'),
		(10,'234aaj','PL200','certification microsoft PL200'),
		(11,'234aak','PL400','certification microsoft PL400'),
		(12,'234aal','SQL','cours sql');

-- -----------------3 civilités---------------------------------
INSERT INTO civilite(id,libelle_court,libelle_long)
	VALUES
		(1,'Mme','Madame'),
		(2,'Mr','Monsieur'),
		(3,'SPP','Se prononce pas');

-- -----------------4 villes + 1 pays---------------------------
INSERT INTO pays(id,code,nom) VALUES (1,'FRA','France');

INSERT INTO cp_ville(id,codepostal,ville,idcpville)
	VALUES
		(1,'33100','Bordeaux',1),
		(2,'75000','Paris',1),
		(3,'31000','Toulouse',1),
		(4,'69000','Lyon',1);	

-- ----------------6 participants--------------------------------


INSERT INTO participant(id,nom,prenom,date_naissance,adresse1,adresse2,idcpville,idcivilite,idpermis)
	VALUES
		(1,'Duck','Ducky','2022/09/02','j\'habite chez moi',null,1,2,1),
		(2,'SENEL','Yakup','1994/07/13','I live at home',null,1,2,2),
		(3,'myName','my1stName','2022/10/02','j\'ai pas encore d\'adresse',null,2,3,1),
		(4,'DUCK','Donald','1900/01/01','j\'ai plus d\'adresse',null,3,2,3),
		(5,'DUKE','Daisy','1700/01/15','j\'ai oublié mon adresse',null,4,1,null),
		(6,'DUKEy','Daisys','1800/01/15','j\'ai oublié mon adresse',null,4,1,2),
		(7,'UKEy','aisys','1500/01/15','j\'ai oublié mon adresse',null,4,1,null),
		(8,'Ey','sys','1500/01/15','j\'ai oublié mon adresse',null,4,1,1);
-- ----------------4 travailleurs--------------------------------
	INSERT INTO travailler(id, idparticipant, idsociete, dateembauche, datedebauche)
		VALUES
			(1, 2, 2, '2022/02/25', NULL),
			(2, 1, 1, '2022/10/02',NULL),
			(3,3,5,'2023/10/02','2063/01/01'),
			(4,7,1,'1550/10/02','1550/10/03');
-- ----------------4 notes--------------------------------
	INSERT INTO attribuer(id, note, dateevaluation, idmodule, idparticipant)
		VALUES
			(1, 18.00, '1800/01/16', 1, 6),
			(2, 10.00, '1800/01/17', 2, 6),
			(3, 20.00, '1800/01/18', 3, 6),
			(4, 20.00, '2022/01/01', 4, 2),
			(5, 20.00, '2022/01/02', 5, 2),
			(6, 20.00, '2022/01/02', 6, 2),
			(7, 10.00, '2022/01/02', 7, 7),
			(8, 12.00, '2022/01/02', 8, 7),
			(9, 14.00, '2022/01/02', 9, 7),
			(10, 16.00, '2022/01/02', 9, 7);
-- ----------------3 emails--------------------------------			
INSERT INTO email(id, adresse, idparticipant)
	VALUES
		(1, 'aisys@UKEy.com', 7),
		(2, 'aisys@UKEy-and-coe.com', 7),
		(3, 'sys@UKEy.com', 8);