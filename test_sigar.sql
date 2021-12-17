#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: module
#------------------------------------------------------------

USE test_sigar;
CREATE TABLE module(
        id_mod   Int  Auto_increment  NOT NULL ,
        name_mod Varchar (50) NOT NULL
	,CONSTRAINT module_PK PRIMARY KEY (id_mod)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: session
#------------------------------------------------------------

CREATE TABLE session(
        id_session   Int  Auto_increment  NOT NULL ,
        name_session Varchar (50) NOT NULL
	,CONSTRAINT session_PK PRIMARY KEY (id_session)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: stagiaire
#------------------------------------------------------------

CREATE TABLE stagiaire(
        id_stg     Int  Auto_increment  NOT NULL ,
        name_stg   Varchar (50) NOT NULL ,
        prenom_stg Varchar (50) NOT NULL ,
        id_session Int
	,CONSTRAINT stagiaire_PK PRIMARY KEY (id_stg)

	,CONSTRAINT stagiaire_session_FK FOREIGN KEY (id_session) REFERENCES session(id_session)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: admin
#------------------------------------------------------------

CREATE TABLE admin(
        id_adm     Int  Auto_increment  NOT NULL ,
        name_adm   Varchar (50) NOT NULL ,
        pseudo_adm Varchar (50) NOT NULL ,
        mdp_adm    Varchar (100) NOT NULL
	,CONSTRAINT admin_PK PRIMARY KEY (id_adm)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: formateur
#------------------------------------------------------------

CREATE TABLE formateur(
        id_form         Int  Auto_increment  NOT NULL ,
        name_form       Varchar (50) NOT NULL ,
        first_name_form Varchar (50) NOT NULL ,
        pseudo_form     Varchar (50) NOT NULL ,
        mdp_form        Varchar (100) NOT NULL
	,CONSTRAINT formateur_PK PRIMARY KEY (id_form)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: cours
#------------------------------------------------------------

CREATE TABLE cours(
        id_cours      Int  Auto_increment  NOT NULL ,
        tag_cours     Varchar (50) NOT NULL ,
        date_cours    Date NOT NULL ,
        crenaux_cours Varchar (50) NOT NULL ,
        id_mod        Int ,
        id_form       Int
	,CONSTRAINT cours_PK PRIMARY KEY (id_cours)

	,CONSTRAINT cours_module_FK FOREIGN KEY (id_mod) REFERENCES module(id_mod)
	,CONSTRAINT cours_formateur0_FK FOREIGN KEY (id_form) REFERENCES formateur(id_form)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: participer
#------------------------------------------------------------

CREATE TABLE participer(
        id_stg   Int NOT NULL ,
        id_cours Int NOT NULL ,
        presence TinyINT NOT NULL
	,CONSTRAINT participer_PK PRIMARY KEY (id_stg,id_cours)

	,CONSTRAINT participer_stagiaire_FK FOREIGN KEY (id_stg) REFERENCES stagiaire(id_stg)
	,CONSTRAINT participer_cours0_FK FOREIGN KEY (id_cours) REFERENCES cours(id_cours)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

