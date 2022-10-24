CREATE TABLE account(
   Id_account INT AUTO_INCREMENT,
   login VARCHAR(255),
   password VARCHAR(255),
   is_deleted BOOLEAN,
   PRIMARY KEY(Id_account),
   UNIQUE(login)
);

CREATE TABLE role(
   Id_role INT AUTO_INCREMENT,
   title VARCHAR(255),
   is_deleted BOOLEAN,
   PRIMARY KEY(Id_role)
);

CREATE TABLE theme(
   Id_theme INT AUTO_INCREMENT,
   title VARCHAR(255),
   is_deleted BOOLEAN,
   PRIMARY KEY(Id_theme)
);

CREATE TABLE tag(
   Id_tag INT AUTO_INCREMENT,
   title VARCHAR(255),
   is_deleted BOOLEAN,
   PRIMARY KEY(Id_tag)
);

CREATE TABLE commande(
   Id_commande INT AUTO_INCREMENT,
   date_achat DATETIME,
   PRIMARY KEY(Id_commande)
);

CREATE TABLE appUser(
   Id_appUser INT AUTO_INCREMENT,
   pseudo VARCHAR(255),
   is_deleted BOOLEAN,
   Id_account INT,
   Id_role INT,
   PRIMARY KEY(Id_appUser),
   UNIQUE(Id_account),
   UNIQUE(pseudo),
   FOREIGN KEY(Id_account) REFERENCES account(Id_account),
   FOREIGN KEY(Id_role) REFERENCES role(Id_role)
);

CREATE TABLE article(
   Id_article INT AUTO_INCREMENT,
   tilte VARCHAR(255),
   content TEXT,
   created_at DATETIME,
   updated_at DATETIME,
   is_deleted BOOLEAN,
   Id_appUser INT,
   Id_theme INT,
   PRIMARY KEY(Id_article),
   FOREIGN KEY(Id_appUser) REFERENCES appUser(Id_appUser),
   FOREIGN KEY(Id_theme) REFERENCES theme(Id_theme)
);

CREATE TABLE image(
   Id_image INT AUTO_INCREMENT,
   src VARCHAR(255),
   alt VARCHAR(255),
   is_deleted BOOLEAN,
   Id_tag INT,
   Id_article INT,
   PRIMARY KEY(Id_image),
   FOREIGN KEY(Id_tag) REFERENCES tag(Id_tag),
   FOREIGN KEY(Id_article) REFERENCES article(Id_article)
);

CREATE TABLE article_tag(
   Id_article INT,
   Id_tag INT,
   PRIMARY KEY(Id_article, Id_tag),
   FOREIGN KEY(Id_article) REFERENCES article(Id_article),
   FOREIGN KEY(Id_tag) REFERENCES tag(Id_tag)
);

CREATE TABLE acheter(
   Id_article INT,
   Id_commande INT,
   prix DECIMAL(15,2),
   quantité INT,
   PRIMARY KEY(Id_article, Id_commande),
   FOREIGN KEY(Id_article) REFERENCES article(Id_article),
   FOREIGN KEY(Id_commande) REFERENCES commande(Id_commande)
);

CREATE TABLE appUser_commande(
   Id_appUser INT,
   Id_commande INT,
   PRIMARY KEY(Id_appUser, Id_commande),
   FOREIGN KEY(Id_appUser) REFERENCES appUser(Id_appUser),
   FOREIGN KEY(Id_commande) REFERENCES commande(Id_commande)
);

