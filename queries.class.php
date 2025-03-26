<?php
class Query {
    public static $SQL_INSERT_CATEGORIE = "insert into categorie (libelle, couleur) values (:libelle, :couleur)";
    //public static $SQL_INSERT_CATEGORIE = "insert into nt_categorie (libelle, couleur) values (:libelle, :couleur)";
    public static $SQL_SELECT_CATEGORIES = "select id, libelle, couleur from categorie";
    //public static $SQL_SELECT_CATEGORIES = "select id, libelle, couleur from nt_categorie";
    public static $SQL_SELECT_CATEGORIE = "select id, libelle, couleur from categorie where id = :id";
    //public static $SQL_SELECT_CATEGORIE = "select id, libelle, couleur from nt_categorie where id = :id";
    public static $SQL_UPDATE_CATEGORIE = "update categorie set libelle = :libelle , couleur = :couleur where id = :id";
    //public static $SQL_UPDATE_CATEGORIE = "update nt_categorie set libelle = :libelle , couleur = :couleur where id = :id";
    public static $SQL_DELETE_CATEGORIE = "delete from categorie where id = :id";
    //public static $SQL_DELETE_CATEGORIE = "delete from nt_categorie where id = :id";

    public static $SQL_INSERT_NOTE = "insert into note(titre, contenu, id_categorie) values (:titre, :contenu, :id_categorie)";
    //public static $SQL_INSERT_NOTE = "insert into nt_note(titre, contenu, id_categorie) values (:titre, :contenu, :id_categorie)";
    public static $SQL_SELECT_NOTES = "select id, titre, contenu, id_categorie from note";
    //public static $SQL_SELECT_NOTES = "select id, titre, contenu, id_categorie from nt_note";
    public static $SQL_SELECT_NOTE = "select id, titre, contenu, id_categorie from note where id = :id";
    //public static $SQL_SELECT_NOTE = "select id, titre, contenu, id_categorie from nt_note where id = :id";
    public static $SQL_UPDATE_NOTE = "update note set titre = :titre, contenu = :contenu, id_categorie = :id_categorie where id = :id";
    //public static $SQL_UPDATE_NOTE = "update nt_note set titre = :titre, contenu = :contenu, id_categorie = :id_categorie where id = :id";
    public static $SQL_DELETE_NOTE = "delete from note where id = :id";
    //public static $SQL_DELETE_NOTE = "delete from nt_note where id = :id";

}