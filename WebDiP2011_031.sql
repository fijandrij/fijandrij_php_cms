CREATE TABLE komentari (
  id_komentar INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  korisnik_user_id INTEGER UNSIGNED NOT NULL,
  datum DATETIME NULL,
  komentar TEXT NULL,
  PRIMARY KEY(id_komentar),
  INDEX komentari_FKIndex1(korisnik_user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE korisnik (
  user_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tip_korisnika_id INTEGER UNSIGNED NOT NULL,
  status_korisnika_id_status INTEGER UNSIGNED NOT NULL,
  korisnicko_ime VARCHAR(20) NULL,
  lozinka VARCHAR(20) NULL,
  ime VARCHAR(20) NULL,
  prezime VARCHAR(45) NULL,
  email VARCHAR(60) NULL,
  aktivacijski_kod VARCHAR(45) NULL,
  blokiran_do DATETIME NULL,
  neuspjesne_prijave INTEGER UNSIGNED NULL DEFAULT 0,
  PRIMARY KEY(user_id),
  INDEX Korisnik_FKIndex2(status_korisnika_id_status),
  INDEX Korisnik_FKIndex3(tip_korisnika_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE korisnik_has_zajednica (
  korisnik_user_id INTEGER UNSIGNED NOT NULL,
  zajednica_id INTEGER UNSIGNED NOT NULL,
  datum DATETIME NULL,
  opis VARCHAR(100) NULL,
  tip_korisnika INT NULL,
  PRIMARY KEY(korisnik_user_id, zajednica_id),
  INDEX Korisnik_has_zajednica_FKIndex1(korisnik_user_id),
  INDEX Korisnik_has_zajednica_FKIndex2(zajednica_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE kosarica (
  id_kosarica INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  troskovi_idtroskovi INTEGER UNSIGNED NOT NULL,
  korisnik_user_id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_kosarica),
  INDEX kosarica_FKIndex1(korisnik_user_id),
  INDEX kosarica_FKIndex2(troskovi_idtroskovi)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE ocjena (
  id_ocjena INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  troskovi_idtroskovi INTEGER UNSIGNED NOT NULL,
  korisnik_user_id INTEGER UNSIGNED NOT NULL,
  ocjena INTEGER UNSIGNED NULL,
  PRIMARY KEY(id_ocjena),
  INDEX ocjena_FKIndex1(korisnik_user_id),
  INDEX ocjena_FKIndex2(troskovi_idtroskovi)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE predlosci (
  id_predlosci INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tip_predloska_id INTEGER UNSIGNED NOT NULL,
  troskovi_idtroskovi INTEGER UNSIGNED NOT NULL,
  korisnik_user_id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_predlosci),
  INDEX predlosci_FKIndex1(korisnik_user_id),
  INDEX predlosci_FKIndex2(troskovi_idtroskovi),
  INDEX predlosci_FKIndex3(tip_predloska_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE status_korisnika (
  id_status INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  opis VARCHAR(100) NULL,
  PRIMARY KEY(id_status)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tip_korisnika (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  naziv VARCHAR(20) NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tip_predloska (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  naziv VARCHAR(20) NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tip_troskova (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  naziv VARCHAR(20) NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE troskovi (
  idtroskovi INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tip_troskova_id INTEGER UNSIGNED NOT NULL,
  komentari_id_komentar INTEGER UNSIGNED NOT NULL,
  zajednica_id INTEGER UNSIGNED NOT NULL,
  datum DATETIME NULL,
  cijena INTEGER UNSIGNED NULL,
  placen TINYINT UNSIGNED NULL,
  opis TEXT NULL,
  url VARCHAR(45) NULL,
  PRIMARY KEY(idtroskovi),
  INDEX troskovi_FKIndex1(zajednica_id),
  INDEX troskovi_FKIndex2(komentari_id_komentar),
  INDEX troskovi_FKIndex3(tip_troskova_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE zajednica (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  naziv VARCHAR(45) NULL,
  opis TEXT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


