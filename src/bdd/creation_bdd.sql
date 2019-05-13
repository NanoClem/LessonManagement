
CREATE TABLE formation (
	id_form INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nom ENUM('IDU', 'IAI', 'MM', 'ITII')
);

CREATE TABLE matiere (
	id_mat INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	libelle VARCHAR(100)
);

CREATE TABLE personne (
	id_pers INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nom VARCHAR(100),
	prenom VARCHAR(100),
	mail VARCHAR(255),
	statut ENUM('etu', 'prof', 'interv'),
	id_form INTEGER,
	CONSTRAINT FK_PersFormation FOREIGN KEY(id_form) REFERENCES formation(id_form)
);

CREATE TABLE expertise (
	id_exp INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	domaine VARCHAR(100),
	descr VARCHAR(255)
);

CREATE TABLE intervention (
	id_int INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nb_heures TIME,
	nature ENUM('explications', 'TD', 'TP')
);

CREATE TABLE fichier (
	id_fic INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	chemin VARCHAR(100),
	extension ENUM('pdf', 'txt', 'png', 'jpeg'),
	taille FLOAT
);

CREATE TABLE demande (
	id_dem INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	titre VARCHAR(100),
	descr VARCHAR(255),
	etat ENUM('en cours de validation', 'valide par un enseignant', 'valide par un expert'),
	
	id_intervention INTEGER,
	id_fic INTEGER,
	CONSTRAINT FK_DemInterv FOREIGN KEY(id_intervention) REFERENCES intervention(id_int),
	CONSTRAINT FK_DemFic FOREIGN KEY(id_fic) REFERENCES fichier(id_fic)
);

CREATE TABLE traite (
	id_dem INTEGER,
	id_pers INTEGER,
	CONSTRAINT FK_TraiteDemande FOREIGN KEY(id_dem) REFERENCES demande(id_dem),
	CONSTRAINT FK_TraitePers FOREIGN KEY(id_pers) REFERENCES personne(id_pers),
	PRIMARY KEY (id_dem, id_pers)
);

CREATE TABLE mat_to_pers (
	id_mat INTEGER,
	id_pers INTEGER,
	CONSTRAINT FK_Mat2Pers1 FOREIGN KEY(id_mat) REFERENCES matiere(id_mat),
	CONSTRAINT FK_Mat2Pers2 FOREIGN KEY(id_pers) REFERENCES personne(id_pers),
	PRIMARY KEY (id_mat, id_pers)
);

CREATE TABLE exp_to_pers (
	id_exp INTEGER,
	id_pers INTEGER,
	CONSTRAINT FK_Exp2Pers1 FOREIGN KEY(id_exp) REFERENCES expertise(id_exp),
	CONSTRAINT FK_Exp2Pers2 FOREIGN KEY(id_pers) REFERENCES personne(id_pers),
	PRIMARY KEY (id_exp, id_pers)
);