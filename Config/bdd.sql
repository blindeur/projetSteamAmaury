create table utilisateur (
utilisateurID int NOT NULL AUTO_INCREMENT,
utilisateurNom varchar(30) not null,
utilisateurPrenom varchar(30),
utilisateurDate date,
utilisateurMotDePasse varchar(30),
 utilisateurLogin varchar(25) DEFAULT NULL,
primary key (utilisateurID)
);

create table type (
typeID int NOT NULL AUTO_INCREMENT,
jeuxType varchar(50),
primary key (typeID)
);

create table magasin (
magasinID int NOT NULL AUTO_INCREMENT,
magasinJeux varchar(50),
magasinSection varchar(50),
primary key (magasinID)
);

create table biblioteque (
biblioID int NOT NULL AUTO_INCREMENT,
biblioJeux varchar(50),
biblioTypeDeJeu varchar(50),
primary key (biblioID)
);

create table promo (
promoID int NOT NULL AUTO_INCREMENT,
promoJeux varchar(30),
promoPrix int,
promoDateDebut datetime,
promoDateFin datetime,
primary key (promoID)
);
create table jeux (
jeuxID int NOT NULL AUTO_INCREMENT,
jeuxPrix int,
jeuxDescpriptif varchar(200),
jeuxPegi int,
jeuxType varchar(50),
primary key (jeuxID)
);

CREATE TABLE changementPrix (
    changementPrixID int NOT NULL AUTO_INCREMENT,
    promoID int,
    jeuxID int,
    PRIMARY KEY (changementPrixID),
    FOREIGN KEY (promoID) REFERENCES promo (promoID),
    FOREIGN KEY (jeuxID) REFERENCES jeux (jeuxID)
);

create table possede (
possedeID int NOT NULL AUTO_INCREMENT,
magasinID int,
jeuxID int,
primary key (possedeID),
FOREIGN KEY (magasinID) REFERENCES magasin (magasinID),
FOREIGN KEY (jeuxID) REFERENCES jeux (jeuxID)
);

ALTER TABLE utilisateur
ADD utilisateurStatut varchar(10);

create table contient (
contientID int NOT NULL AUTO_INCREMENT,
biblioID int,
jeuxID int,
primary key (contientID),
FOREIGN KEY (biblioID) REFERENCES biblioteque (biblioID),
FOREIGN KEY (jeuxID) REFERENCES jeux (jeuxID)
);

create table appartient (
appartientID int NOT NULL AUTO_INCREMENT,
typeID int,
jeuxID int,
primary key (appartientID),
FOREIGN KEY (typeID) REFERENCES type (typeID),
FOREIGN KEY (jeuxID) REFERENCES jeux (jeuxID)
);


create table achete (
acheteID int NOT NULL AUTO_INCREMENT,
utilisateurID int,
jeuxID int,
primary key (acheteID),
FOREIGN KEY (utilisateurID) REFERENCES utilisateur (utilisateurID),
FOREIGN KEY (jeuxID) REFERENCES jeux (jeuxID)
);

INSERT INTO utilisateur (utilisateurNom, utilisateurPrenom, utilisateurDate, utilisateurMotDePasse,utilisateurStatut)
VALUES
('test','test','2000-12-31','test','admin'),
('Aibach','Amaury','2006-08-30','AA-230610','admin'),
('steam','csgo','2000-08-30','dragonLore','user'),
('teen','roblox','2010-06-12','dragonLore','user');




