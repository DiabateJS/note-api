<?php
class Constants {
    /*public static $SQL_INSERT_PROFIL = "insert into profil (name) values (:name)";
    public static $SQL_SELECT_PROFILS = "select id, name from profil";
    public static $SQL_SELECT_PROFIL = "select id, name from profil where id = :id";*/

    public static $SQL_INSERT_PROFIL = "insert into na_profil (name) values (:name)";
    public static $SQL_SELECT_PROFILS = "select id, name from na_profil";
    public static $SQL_SELECT_PROFIL = "select id, name from na_profil where id = :id";

    /*public static $SQL_INSERT_USER = "insert into user(nom, prenom, email, login, password, idprofil) values (:nom, :prenom, :email, :login, :password, :idprofil)";
    public static $SQL_SELECT_USERS = "select id, nom, prenom, email, login, password, idprofil from user";
    public static $SQL_SELECT_USER = "select id, nom, prenom, email, login, password, idprofil from user where id = :id";*/

    public static $SQL_INSERT_USER = "insert into na_user(nom, prenom, email, login, password, idprofil) values (:nom, :prenom, :email, :login, :password, :idprofil)";
    public static $SQL_SELECT_USERS = "select id, nom, prenom, email, login, password, idprofil from na_user";
    public static $SQL_SELECT_USER = "select id, nom, prenom, email, login, password, idprofil from na_user where id = :id";

    public static $SQL_INSERT_ARTICLE = "insert into na_article(label, description, image, prix) values (:label, :description, :image, :prix)";
    public static $SQL_SELECT_ARTICLES = "select id, label, description, image, prix from na_article";
    public static $SQL_SELECT_ARTICLE = "select id, label, description, image, prix from na_article where id = :id";

    /*public static $SQL_INSERT_ARTICLE = "insert into article(label, description, image, prix) values (:label, :description, :image, :prix)";
    public static $SQL_SELECT_ARTICLES = "select id, label, description, image, prix from article";
    public static $SQL_SELECT_ARTICLE = "select id, label, description, image, prix from article where id = :id";*/

    public static $SQL_INSERT_STATUT = "insert into na_statut(libelle) values (:libelle)";
    public static $SQL_SELECT_STATUTS = "select id, libelle from na_statut";
    public static $SQL_SELECT_STATUT = "select id, libelle from na_statut where id = :id";

    /*public static $SQL_INSERT_STATUT = "insert into statut(libelle) values (:libelle)";
    public static $SQL_SELECT_STATUTS = "select id, libelle from statut";
    public static $SQL_SELECT_STATUT = "select id, libelle from statut where id = :id";*/

    public static $SQL_INSERT_LIGNE_COM = "insert into na_ligne_com(article_id, qte, montant, commande_id) values (:article_id, :qte, :montant, :commande_id)";
    public static $SQL_SELECT_LIGNE_COMS = "select id, article_id, qte, montant, commande_id from na_ligne_com";
    public static $SQL_SELECT_LIGNE_COMS_BY_ID = "select id, article_id, qte, montant, commande_id from na_ligne_com where commande_id = :commande_id";
    public static $SQL_SELECT_LIGNE_COM = "select id, article_id, qte, montant, commande_id from na_ligne_com where id = :id";
    public static $SQL_UPDATE_LIGNE_COM = "update na_ligne_com set article_id = :article_id, qte = :qte, montant = :montant, commande_id = :commande_id where id = :id";

    /*public static $SQL_INSERT_LIGNE_COM = "insert into ligne_com(article_id, qte, montant, commande_id) values (:article_id, :qte, :montant, :commande_id)";
    public static $SQL_SELECT_LIGNE_COMS = "select id, article_id, qte, montant, commande_id from ligne_com";
    public static $SQL_SELECT_LIGNE_COMS_BY_ID = "select id, article_id, qte, montant, commande_id from ligne_com where commande_id = :commande_id";
    public static $SQL_SELECT_LIGNE_COM = "select id, article_id, qte, montant, commande_id from ligne_com where id = :id";
    public static $SQL_UPDATE_LIGNE_COM = "update ligne_com set article_id = :article_id, qte = :qte, montant = :montant, commande_id = :commande_id where id = :id";*/

    public static $SQL_INSERT_COMMANDE = "insert into na_commande(statutid, userid, livreurid, montant, datecmd) values (:statut_id, :user_id, :livreur_id, :montant, :date_cmd)";
    public static $SQL_SELECT_COMMANDES = "select id, statutid, userid, livreurid, montant, datecmd from na_commande";
    public static $SQL_SELECT_COMMANDE = "select id, statutid, userid, livreurid, montant, datecmd from na_commande where id = :id";
    public static $SQL_UPDATE_COMMANDE = "update na_commande set statutid = :statut_id, userid = :user_id, livreurid = :livreur_id, montant = :montant, datecmd = :date_cmd where id = :id";

    /*public static $SQL_INSERT_COMMANDE = "insert into commande(statutid, userid, livreurid, montant, datecmd) values (:statut_id, :user_id, :livreur_id, :montant, :date_cmd)";
    public static $SQL_SELECT_COMMANDES = "select id, statutid, userid, livreurid, montant, datecmd from commande";
    public static $SQL_SELECT_COMMANDE = "select id, statutid, userid, livreurid, montant, datecmd from commande where id = :id";
    public static $SQL_UPDATE_COMMANDE = "update commande set statutid = :statut_id, userid = :user_id, livreurid = :livreur_id, montant = :montant, datecmd = :date_cmd where id = :id";*/
}