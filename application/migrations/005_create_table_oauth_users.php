<?php

/*
CREATE TABLE oauth_users (
  email VARCHAR(255) NOT NULL,
  password VARCHAR(2000),
  name VARCHAR(255),
  CONSTRAINT username_pk PRIMARY KEY (username));
  */

class Migration_Create_table_oauth_users extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
        ));
        $this->dbforge->add_key('email', TRUE);
        $this->dbforge->create_table('oauth_users');
    }

    public function down()
    {
        $this->dbforge->drop_table('oauth_users');
    }
}
