CREATE TABLE `user` (
  id                  Integer NOT NULL AUTO_INCREMENT,
  username            VarChar(128),
  password            VarChar(128),
  domain              Varchar(128),
  email_address       VarChar(256),
  sam_account_name    VarChar(128),
  user_principal_name VarChar(128),
  telephone_number    VarChar(32),
  mobile_number       Varchar(32),
  extension_number    VarChar(32),
  display_name        VarChar(64),
  description         VarChar(128),
  photo_filename      VarChar(64),
  PRIMARY KEY (id)
) ENGINE=InnoDb DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Part table
CREATE TABLE part (
  id                 Integer(11) NOT NULL AUTO_INCREMENT,
  partNumber         VarChar(256),
  name               VarChar(128),
  length             Integer,
  width              Integer,
  material_id        Integer(11) NOT NULL,
  debur              Boolean,
  kanban             Boolean,
  created            DateTime NOT NULL,
  created_by_id      Integer(11) NOT NULL,
  modified           DateTime,
  modified_by_id     Integer(11),
  PRIMARY KEY (id),
  INDEX idx_user_created_by (created_by_id),
  FOREIGN KEY (created_by_id)  REFERENCES user(id) ON DELETE NO ACTION,
  INDEX idx_user_modified_by (modified_by_id),
  FOREIGN KEY (modified_by_id)  REFERENCES user(id) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;