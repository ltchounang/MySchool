#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: etudiant
#------------------------------------------------------------

CREATE TABLE etudiant(
        idEtud            Int  Auto_increment  NOT NULL ,
        numEtudApogee     Int NOT NULL ,
        nomEtud           Varchar (64) NOT NULL ,
        prenomEtud        Varchar (64) NOT NULL ,
        dateNaiss         Date ,
        courriel          Varchar (64) ,
        tel               Int ,
        adr1              Varchar (100) ,
        adr2              Varchar (100) ,
        anneePromotion    Varchar (100) ,
        situationActuelle Varchar (100)
	,CONSTRAINT etudiant_PK PRIMARY KEY (idEtud)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: responsable
#------------------------------------------------------------

CREATE TABLE responsable(
        idResp      Int  Auto_increment  NOT NULL ,
        identifiant Varchar (32) NOT NULL ,
        motDePasse  Varchar (32) NOT NULL
	,CONSTRAINT responsable_PK PRIMARY KEY (idResp)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: etablissement
#------------------------------------------------------------

CREATE TABLE etablissement(
        idEtablissement  Int  Auto_increment  NOT NULL ,
        nomEtablissement Varchar (64) NOT NULL ,
        typeEtab         Varchar (250) NOT NULL
	,CONSTRAINT etablissement_PK PRIMARY KEY (idEtablissement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: groupe
#------------------------------------------------------------

CREATE TABLE groupe(
        idGroupe  Int  Auto_increment  NOT NULL ,
        nomGroupe Varchar (250) NOT NULL
	,CONSTRAINT groupe_PK PRIMARY KEY (idGroupe)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: former
#------------------------------------------------------------

CREATE TABLE former(
        idEtablissement Int NOT NULL ,
        idEtud          Int NOT NULL ,
        infoFormation   Varchar (32) NOT NULL ,
        dateDebut       Date NOT NULL ,
        dateFin         Date
	,CONSTRAINT former_PK PRIMARY KEY (idEtablissement,idEtud)

	,CONSTRAINT former_etablissement_FK FOREIGN KEY (idEtablissement) REFERENCES etablissement(idEtablissement)
	,CONSTRAINT former_etudiant0_FK FOREIGN KEY (idEtud) REFERENCES etudiant(idEtud)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: appartenirAuGroupe
#------------------------------------------------------------

CREATE TABLE appartenirAuGroupe(
        idEtud   Int NOT NULL ,
        idGroupe Int NOT NULL
	,CONSTRAINT appartenirAuGroupe_PK PRIMARY KEY (idEtud,idGroupe)

	,CONSTRAINT appartenirAuGroupe_etudiant_FK FOREIGN KEY (idEtud) REFERENCES etudiant(idEtud)
	,CONSTRAINT appartenirAuGroupe_groupe0_FK FOREIGN KEY (idGroupe) REFERENCES groupe(idGroupe)
)ENGINE=InnoDB;


