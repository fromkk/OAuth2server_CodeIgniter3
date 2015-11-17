<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* CREATE TABLE oauth_access_tokens (
  access_token VARCHAR(40) NOT NULL,
  client_id VARCHAR(80) NOT NULL,
  user_id VARCHAR(255),
  expires TIMESTAMP NOT NULL,
  scope VARCHAR(2000),
  CONSTRAINT access_token_pk PRIMARY KEY (access_token));
*/

class Migration_Create_table_oauth_access_tokens extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'access_token'   => array(
                'type'       => 'VARCHAR',
                'constraint' => '40',
            ),
            'client_id'      => array(
                'type'       => 'VARCHAR',
                'constraint' => '80',
            ),
            'user_id' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => TRUE,
            ),
            'expires' => array(
                'type'       => 'DATETIME',
            ),
            'scope' => array(
                'type'       => 'TEXT',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('access_token', TRUE);
        $this->dbforge->create_table('oauth_access_tokens');
    }

    public function down()
    {
        $this->dbforge->drop_table('oauth_access_tokens');
    }
}
