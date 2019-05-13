CREATE TYPE form AS ENUM ('IDU', 'IAI', 'MM', 'ITII');

CREATE TYPE statut AS ENUM ('etu', 'prof', 'int');

CREATE TYPE avancement AS ENUM ('en cours de validation', 'valide par l'enseignant', 'valide par l'intervenant');

CREATE TYPE nat AS ENUM ('explication', 'TD', 'TP');

CREATE TYPE type_fichier AS ENUM ('pdf', 'txt', 'png', 'jpeg');




CREATE TABLE formation (
	id_form INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	type form
);



CREATE TABLE matiere (
	id_mat INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	libelle VARCHAR(100)
);

CREATE TABLE mat_to_pers (
	id_mat INT FOREIGN KEY REFERENCES matiere(id_mat),
	id_pers INT FOREIGN KEY REFERENCES personne(id_pers),
	PRIMARY KEY (id_mat, id_pers)
);



CREATE TABLE expertise (
	id_exp INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	domaine VARCHAR(100),
	description VARCHAR(255)
);

CREATE TABLE exp_to_pers (
	id_exp INT FOREIGN KEY REFERENCES expertise(id_exp),
	id_pers INT FOREIGN KEY REFERENCES personne(id_pers),
	PRIMARY KEY (id_exp, id_pers)
);







CREATE TABLE personne (
	id_pers INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nom VARCHAR(100),
	prenom VARCHAR(100),
	mail VARCHAR(255),
	type statut,
	id_form INT FOREIGN KEY REFERENCES formation(id_form)
);






CREATE TABLE intervention (
	id_int INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nb_heures TIME,
	nature nat
);


CREATE TABLE fichier (
	id_fic INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	chemin VARCHAR(100),
	type type_fichier,
	taille FLOAT
);




CREATE TABLE demande (
	id_dem INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	titre VARCHAR(100),
	description VARCHAR(255),
	etat avancement,
	
	id_intervention INT FOREIGN KEY REFERENCES intervention(id_intervention),
	id_fic INT FOREIGN KEY REFERENCES fichier(id_fichier)
);


CREATE TABLE traite (
	id_dem INT FOREIGN KEY REFERENCES demande(id_dem),
	id_pers INT FOREIGN KEY REFERENCES personne(id_pers),
	PRIMARY KEY (id_dem, id_pers)
);






