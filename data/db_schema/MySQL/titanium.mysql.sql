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




-- Role table.
create table access_role (
    role_id   integer(11)  not null auto_increment,
    role      nvarchar(64) not null collate utf8_general_ci,
    parent    nvarchar(64)     null collate utf8_general_ci,
    role_type nvarchar(32) not null collate utf8_general_ci,
    primary key (
        role_id
    )
) ENGINE=InnoDB;

-- Inbuilt default roles (do not delete).
insert into access_role (role, parent, role_type) values ('guest', null, 'Built in role.');
insert into access_role (role, parent, role_type) values ('user', 'guest', 'Built in role.');
insert into access_role (role, parent, role_type) values ('operator', 'user', 'Built in role.');
insert into access_role (role, parent, role_type) values ('author', 'user', 'Built in role.');
insert into access_role (role, parent, role_type) values ('admin', 'user', 'Built in role.');

-- Resources table.
create table access_resource (
    resource_id    integer(11)   not null auto_increment,
    resource       nvarchar(128) not null collate utf8_general_ci,
    display_name   nvarchar(64)  not null collate utf8_general_ci,
    primary key (
        resource_id
    )
) ENGINE=InnoDB;

-- Resources.
insert into access_resource (resource_id, resource, display_name) values (1, 'CivAccess\\Controller\\Index', 'Access Index');
insert into access_resource (resource_id, resource, display_name) values (2, 'CivAccess\\Controller\\Role', 'Roles');
insert into access_resource (resource_id, resource, display_name) values (3, 'CivAccess\\Controller\\Rule', 'Rules');
insert into access_resource (resource_id, resource, display_name) values (4, 'CivAccess\\Controller\\Resource', 'Resources');
insert into access_resource (resource_id, resource, display_name) values (5, 'CivAccess\\Controller\\Privilege', 'Privileges');

-- Rule table.
create table access_rule (
    rule_id    integer(11) not null auto_increment,
    role       nvarchar(64)  not null collate utf8_general_ci,
    resource   nvarchar(128)     null collate utf8_general_ci,
    privilege nvarchar(64)      null collate utf8_general_ci, 
    primary key (
        rule_id
    )
) ENGINE=InnoDB;

-- Some useful rules.
insert into access_rule (role, resource, privilege) values ('guest', 'Application\\Controller\\Index', 'index');
insert into access_rule (role, resource, privilege) values ('admin', 'CivAccess\\Controller\\Rule', 'index');
insert into access_rule (role, resource, privilege) values ('admin', 'CivAccess\\Controller\\Rule', 'add');
insert into access_rule (role, resource, privilege) values ('admin', 'CivAccess\\Controller\\Rule', 'edit');
insert into access_rule (role, resource, privilege) values ('admin', 'CivAccess\\Controller\\Rule', 'delete');
insert into access_rule (role, resource, privilege) values ('admin', 'CivAccess\\Controller\\Role', 'index');
insert into access_rule (role, resource, privilege) values ('admin', 'CivAccess\\Controller\\Role', 'add');
insert into access_rule (role, resource, privilege) values ('admin', 'CivAccess\\Controller\\Role', 'edit');
insert into access_rule (role, resource, privilege) values ('admin', 'CivAccess\\Controller\\Role', 'delete');
insert into access_rule (role, resource, privilege) values ('admin', 'CivAccess\\Controller\\Resource', 'index');
insert into access_rule (role, resource, privilege) values ('admin', 'CivAccess\\Controller\\Resource', 'add');
insert into access_rule (role, resource, privilege) values ('admin', 'CivAccess\\Controller\\Resource', 'edit');
insert into access_rule (role, resource, privilege) values ('admin', 'CivAccess\\Controller\\Resource', 'delete');
insert into access_rule (role, resource, privilege) values ('admin', 'CivAccess\\Controller\\Privilege', 'index');
insert into access_rule (role, resource, privilege) values ('admin', 'CivAccess\\Controller\\Privilege', 'add');
insert into access_rule (role, resource, privilege) values ('admin', 'CivAccess\\Controller\\Privilege', 'edit');
insert into access_rule (role, resource, privilege) values ('admin', 'CivAccess\\Controller\\Privilege', 'delete');