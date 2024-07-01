CREATE DATABASE STAGE;

USE STAGE;

CREATE TABLE VEHICULE(
    immatriculation VARCHAR(10) NOT NULL,
    premiereMiseEnCirculation VARCHAR(10) NOT NULL,
    dateImmatriculation VARCHAR(10) NOT NULL,
    numeroTitulaire VARCHAR(20) NOT NULL,
    titulaire VARCHAR(100) NOT NULL,
    immatriculationPrecedente VARCHAR(10),
    adresseCommune VARCHAR(100) NOT NULL,
    regionDepartement VARCHAR(100) NOT NULL,
    marque VARCHAR(20) NOT NULL,
    model VARCHAR(20) NOT NULL,
    origine VARCHAR(50) NOT NULL,
    anneeFabrication YEAR NOT NULL,
    kilometrage INT NOT NULL,
    CONSTRAINT pk_VEH PRIMARY KEY(immatriculation)
);

CREATE TABLE CHAUFFEUR(
    numeroPermis VARCHAR(10) NOT NULL,
    nom VARCHAR(15) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    dateNaissance VARCHAR(10) NOT NULL,
    lieuNaissance VARCHAR(50) NOT NULL,
    dateEmission VARCHAR(10) NOT NULL,
    dateExpiration VARCHAR(10) NOT NULL,
    delivrePar VARCHAR(20) NOT NULL,
    categorie ENUM('A1', 'A', 'B', 'C1', 'C', 'D', 'BE', 'C1E','CE','DE') NOT NULL,
    groupeSanguin ENUM('A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-') NOT NULL,
    CONSTRAINT pk_CHAU PRIMARY KEY(numeroPermis)
);

CREATE TABLE EMPLOYE(
    idEmploye CHAR(10) NOT NULL,
    nom VARCHAR(15) NOT NULL,
    prenom VARCHAR(60) NOT NULL,
    email VARCHAR(80) NOT NULL,
    telephone VARCHAR(13) NOT NULL,
    adresse VARCHAR(100) NOT NULL,
    service ENUM('Entretien Et Maintenance', 'Reparation Mecanique', 'Diagnostique Et Electronique', 'Pneumatiques', 'Carrosserie Et Peinture', 'Climatisation', 'Accessoire Et Personnalisation', 'Assistance Routiere', 'Controle Technique','administration') NOT NULL,
    poste ENUM('Chef de Garage', 'Chef de Service', 'Employe de Service','administrateur') NOT NULL,
    login VARCHAR(20) NOT NULL,
    motDePasse VARCHAR(20) NOT NULL,
    CONSTRAINT pk_EMP PRIMARY KEY(idEmploye)
);

CREATE TABLE STATISTIQUES(
    idStatistique VARCHAR(10) NOT NULL,
    immatriculation VARCHAR(10) NOT NULL,
    entretienEtMaintenance BOOLEAN NOT NULL,
    reparationMecanique BOOLEAN NOT NULL,
    diagnostiqueEtElectronique BOOLEAN NOT NULL,
    pneumatiques BOOLEAN NOT NULL,
    carrosserieEtPeinture BOOLEAN NOT NULL,
    climatisation BOOLEAN NOT NULL,
    accessoireEtPersonnalisation BOOLEAN NOT NULL,
    assistanceRoutiere BOOLEAN NOT NULL,
    controleTechnique BOOLEAN NOT NULL,
    moyenne DECIMAL(4,2),
    appreciation VARCHAR(20),
    CONSTRAINT pk_STAT PRIMARY KEY(idStatistique),
    CONSTRAINT fk_STAT_immatriculation FOREIGN KEY(immatriculation) REFERENCES VEHICULE(immatriculation) ON DELETE CASCADE
);

CREATE TABLE RAPPORT(
    idRapport VARCHAR(10) NOT NULL,
    immatriculation VARCHAR(10) NOT NULL,
    numeroPermis VARCHAR(20) NOT NULL,
    idEmploye VARCHAR(10) NOT NULL,
    entretienEtMaintenance BOOLEAN NOT NULL,
    reparationMecanique BOOLEAN NOT NULL,
    diagnostiqueEtElectronique BOOLEAN NOT NULL,
    pneumatiques BOOLEAN NOT NULL,
    carrosserieEtPeinture BOOLEAN NOT NULL,
    climatisation BOOLEAN NOT NULL,
    accessoireEtPersonnalisation BOOLEAN NOT NULL,
    assistanceRoutiere BOOLEAN NOT NULL,
    controleTechnique BOOLEAN NOT NULL,
    date VARCHAR(10) NOT NULL,
    montant DECIMAL(11,2) NOT NULL,
    CONSTRAINT pk_RAP PRIMARY KEY(idRapport),
    CONSTRAINT fk_RAP_immatriculation FOREIGN KEY(immatriculation) REFERENCES VEHICULE(immatriculation) ON DELETE CASCADE,
    CONSTRAINT fk_RAP_numeroPermis FOREIGN KEY(numeroPermis) REFERENCES CHAUFFEUR(numeroPermis) ON DELETE CASCADE,
    CONSTRAINT fk_RAP_idEmploye FOREIGN KEY(idEmploye) REFERENCES EMPLOYE(idEmploye) ON DELETE CASCADE
);

CREATE TABLE DAILYSTATS(
    idStatistique VARCHAR(10) NOT NULL,
    idEmploye VARCHAR(10) NOT NULL,
    nomEmploye VARCHAR(60) NOT NULL,
    prenomEmploye VARCHAR(60) NOT NULL,
    immatriculation VARCHAR(10) NOT NULL,
    piece VARCHAR(100) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    date VARCHAR(10) NOT NULL,
    service ENUM('entretien Et Maintenance', 'reparation Mecanique', 'diagnostique Et Electronique', 'pneumatiques', 'carrosserie Et Peinture', 'climatisation', 'accessoire Et Personnalisation', 'assistance Routiere', 'controle Technique','administration') NOT NULL,
    CONSTRAINT pk_DAILYSTATS PRIMARY KEY(idStatistique),
    CONSTRAINT fk_DAILYSTATS_immatriculation FOREIGN KEY(immatriculation) REFERENCES VEHICULE(immatriculation) ON DELETE CASCADE,
    CONSTRAINT fk_DAILYSTATS_idEmploye FOREIGN KEY(idEmploye) REFERENCES EMPLOYE(idEmploye) ON DELETE CASCADE,
);

CREATE TABLE JOURNEE(
    immatriculation VARCHAR(10) NOT NULL,
    premiereMiseEnCirculation VARCHAR(10) NOT NULL,
    dateImmatriculation VARCHAR(10) NOT NULL,
    numeroTitulaire VARCHAR(20) NOT NULL,
    titulaire VARCHAR(100) NOT NULL,
    immatriculationPrecedente VARCHAR(10),
    adresseCommune VARCHAR(100) NOT NULL,
    regionDepartement VARCHAR(100) NOT NULL,
    marque VARCHAR(20) NOT NULL,
    model VARCHAR(20) NOT NULL,
    origine VARCHAR(50) NOT NULL,
    anneeFabrication YEAR NOT NULL,
    kilometrage INT NOT NULL,
    date DATE NOT NULL,
    clefPrimaire VARCHAR(10) NOT NULL,
    numeroPermis VARCHAR(10) NOT NULL,
    CONSTRAINT pk_VEH PRIMARY KEY(immatriculation)
);



-- CREATION DE L ADMINSTRATEUR ET ATTRIBUTION DES DROIT
CREATE USER 'administrateurGarage'@'localhost' IDENTIFIED BY 'passer';

GRANT SELECT ON STAGE.STATISTIQUES TO 'administrateurGarage'@'localhost';
GRANT SELECT ON STAGE.RAPPORT TO 'administrateurGarage'@'localhost';
GRANT SELECT ON STAGE.DAILYSTATS TO 'administrateurGarage'@'localhost';

GRANT INSERT ON STAGE.VEHICULE TO 'administrateurGarage'@'localhost';
GRANT INSERT ON STAGE.CHAUFFEUR TO 'administrateurGarage'@'localhost';
GRANT INSERT ON STAGE.EMPLOYE TO 'administrateurGarage'@'localhost';
GRANT INSERT ON STAGE.STATISTIQUES TO 'administrateurGarage'@'localhost';

GRANT UPDATE ON STAGE.STATISTIQUES TO 'administrateurGarage'@'localhost';




-- CREATION DU CHEF DE GARAGE ET ATTRIBUTION DES DROIT
CREATE USER 'chefDeGarage'@'localhost' IDENTIFIED BY 'passer';

GRANT SELECT ON STAGE.VEHICULE TO 'chefDeGarage'@'localhost';
GRANT SELECT ON STAGE.CHAUFFEUR TO 'chefDeGarage'@'localhost';

GRANT INSERT ON STAGE.JOURNEE TO 'chefDeGarage'@'localhost';
GRANT INSERT ON STAGE.RAPPORT TO 'chefDeGarage'@'localhost';

GRANT UPDATE ON STAGE.EMPLOYE TO 'chefDeGarage'@'localhost'




-- CREATION DU CHEF DE SERVICE ET ATTRIBUTION DES DROIT
CREATE USER 'chefDeService'@'localhost' IDENTIFIED BY 'passer';

GRANT SELECT ON STAGE.JOURNEE TO 'chefDeService'@'localhost';

GRANT INSERT ON STAGE.DAILYSTATS TO 'chefDeService'@'localhost';
GRANT INSERT ON STAGE.RAPPORT TO 'chefDeService'@'localhost';

GRANT UPDATE ON STAGE.RAPPORT TO 'chefDeService'@'localhost';
GRANT UPDATE ON STAGE.EMPLOYE TO 'chefDeService'@'localhost';




-- CREATION DE L EMPLOYE DE SRVICE ET ATTRIBUTION DES DROIT
CREATE USER 'employeDeService'@'localhost' IDENTIFIED BY 'passer';

GRANT SELECT ON STAGE.JOURNEE TO 'employeDeService'@'localhost';

GRANT INSERT ON STAGE.DAILYSTATS TO 'employeDeService'@'localhost';
GRANT INSERT ON STAGE.RAPPORT TO 'employeDeService'@'localhost';

GRANT UPDATE ON STAGE.RAPPORT TO 'employeDeService'@'localhost';
GRANT UPDATE ON STAGE.EMPLOYE TO 'employeDeService'@'localhost';




-- APPLICATION DES MODIFICATIONS
FLUSH PRIVILEGES;





-- PHASE TEST - DONNEES FACULTATIFS


INSERT INTO chauffeur VALUES ('0000000000','DIOP','Raphael','00-00-2000','quelque part','01-01-2001','02-02-2002','MITTD','B','A+');
INSERT INTO chauffeur VALUES ('0000000001','DIALLO','Alioune','00-00-2000','quelque part','01-01-2001','02-02-2002','MITTD','B','AB+');
INSERT INTO chauffeur VALUES ('0000000002','SOW','Ousmane','00-00-2000','quelque part','01-01-2001','02-02-2002','MITTD','B','B+');


INSERT INTO vehicule VALUES ('AA-947-ZZ','14-10-2002','05-07-2002','2000789463','Ndonguo FALL','UI-2249-D','quelque part','quelque part','Toyota','Avensis','Dakar','2007',37);
INSERT INTO vehicule VALUES ('BB-947-YY','04-10-2002','15-08-2002','2150789463','Ndonguo FALL','VJ-2249-E','quelque part','quelque part','Toyota','Avensis','Dakar','2007',45);
INSERT INTO vehicule VALUES ('CC-947-XX','20-10-2002','28-09-2002','2007689463','Ndonguo FALL','WK-2249-F','quelque part','quelque part','Toyota','Avensis','Dakar','2007',20);
INSERT INTO vehicule VALUES ('DD-947-WW','24-10-2002','20-09-2002','2091689463','Ndonguo FALL','XL-2249-G','quelque part','quelque part','Toyota','Avensis','Dakar','2007',18);
INSERT INTO vehicule VALUES ('EE-947-VV','21-10-2002','18-08-2002','2091726463','Ndonguo FALL','YM-2249-H','quelque part','quelque part','Toyota','Avensis','Dakar','2007',50);
INSERT INTO vehicule VALUES ('FF-947-UU','30-10-2002','12-07-2002','2091179463','Ndonguo FALL','ZN-2249-I','quelque part','quelque part','Toyota','Avensis','Dakar','2007',12);


INSERT INTO `employe`  VALUES ('0000000000', 'Raphael', 'DIOP', 'raphaeldiop@employe.com', '+221 79 444 55 66', 'somewhere', 'administration', 'administrateur', 'raphael', 'passer');
INSERT INTO `employe`  VALUES ('0000000001', 'Alioune', 'DIALLO', 'aliounediallo@employe.com', '+221 79 444 55 66', 'somewhere', 'administration', 'Chef de Garage', 'alioune', 'passer');
INSERT INTO `employe`  VALUES ('0000000002', 'Ousamane', 'SOW', 'ousmanesouw@employe.com', '+221 79 444 55 66', 'somewhere', 'reparation Mecanique', 'Chef de Service', 'ousmane', 'passer');
INSERT INTO `employe`  VALUES ('0000000003', 'Mamadou', 'SOW', 'mamadousow@employe.com', '+221 79 444 55 66', 'somewhere', 'diagnostique Et Electronique', 'Employe de Service', 'mamadou', 'passer');
INSERT INTO `employe`  VALUES ('0000000004', 'Rassoul', 'NAME', 'rassoulname@employe.com', '+221 79 444 55 66', 'somewhere', 'carrosserie Et Peinture', 'Employe de Service', 'rassoul', 'passer');
INSERT INTO `employe`  VALUES ('0000000005', 'Elimane', 'KA', 'elimaneka@employe.com', '+221 79 444 55 66', 'somewhere', 'entretien Et Maintenance', 'Employe de Service', 'elimane', 'passer');

