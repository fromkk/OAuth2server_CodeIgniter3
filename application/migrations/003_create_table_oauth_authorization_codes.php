<?php

/* CREATE TABLE oauth_authorization_codes (
  authorization_code VARCHAR(40) NOT NULL,
  client_id VARCHAR(80) NOT NULL,
  user_id VARCHAR(255),
  redirect_uri VARCHAR(2000),
  expires TIMESTAMP NOT NULL,
  scope VARCHAR(2000),
  CONSTRAINT auth_code_pk PRIMARY KEY (authorization_code)); */

class Migration_Create_table_oauth_authorization_codes extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'authorization_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
            ),
            'client_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
            ),
            'user_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'redirect_uri' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'expires' => array(
                'type' => 'DATETIME',
            ),
            'scope' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('authorization_code', TRUE);
        $this->dbforge->create_table('oauth_authorization_codes');
    }

    public function down()
    {
        $this->dbforge->drop_table('oauth_authorization_codes');
    }
}
