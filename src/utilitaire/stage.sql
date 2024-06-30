CREATE DATABASE STAGE;

USE STAGE;

CREATE TABLE VEHICULE(
    immatriculation VARCHAR(10) NOT NULL,
    premiereMiseEnCirculation DATE NOT NULL,
    dateImmatriculation DATE NOT NULL,
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
    dateNaissance DATE NOT NULL,
    lieuNaissance VARCHAR(50) NOT NULL,
    dateEmission DATE NOT NULL,
    dateExpiration DATE NOT NULL,
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
    moyenne DECIMAL(10,4),
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
    date DATE NOT NULL,
    montant DECIMAL(10,3) NOT NULL,
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
    date DATE NOT NULL,
    service ENUM('Entretien Et Maintenance', 'Reparation Mecanique', 'Diagnostique Et Electronique', 'Pneumatiques', 'Carrosserie Et Peinture', 'Climatisation', 'Accessoire Et Personnalisation', 'Assistance Routiere', 'Controle Technique','administration') NOT NULL,
    CONSTRAINT pk_DAILYSTATS PRIMARY KEY(idStatistique),
    CONSTRAINT fk_DAILYSTATS_immatriculation FOREIGN KEY(immatriculation) REFERENCES VEHICULE(immatriculation) ON DELETE CASCADE,
    CONSTRAINT fk_DAILYSTATS_idEmploye FOREIGN KEY(idEmploye) REFERENCES EMPLOYE(idEmploye) ON DELETE CASCADE,
);

CREATE TABLE JOURNEE(
    immatriculation VARCHAR(10) NOT NULL,
    premiereMiseEnCirculation DATE NOT NULL,
    dateImmatriculation DATE NOT NULL,
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


INSERT INTO chauffeur VALUES ('11078352','DIOP','Jacques Raphael Amar','07-07-2003','THIES','22-12-2023','21-12-2033','MITTD','B','A+');
INSERT INTO chauffeur VALUES ('12345678','DIALLO','ALIOUNE','2004-01-01','quelque part','22-12-2022','21-12-2032','MITTD','B','AB+');
INSERT INTO chauffeur VALUES ('98765432','SOW','OUSMANE','2004-01-01','quelque part','22-12-2022','21-12-2032','MITTD','B','B+');

INSERT INTO vehicule VALUES ('BB-947-RM','2002-14-10','2023-19-12','2000789463','raphael','UI-2249-D','quelque part','quelque part','Toyota','Avensis','Dakar Port Nord','2007',0);
INSERT INTO vehicule VALUES ('BB-947-RM','2002-14-10','2023-19-12','2000789463','raphael','UI-2249-D','quelque part','quelque part','Toyota','Avensis','Dakar Port Nord','2007',0);
INSERT INTO vehicule VALUES ('BB-947-RM','2002-14-10','2023-19-12','2000789463','raphael','UI-2249-D','quelque part','quelque part','Toyota','Avensis','Dakar Port Nord','2007',0);