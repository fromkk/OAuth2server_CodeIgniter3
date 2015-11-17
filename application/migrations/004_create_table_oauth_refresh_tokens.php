<?php

/*
 CREATE TABLE oauth_refresh_tokens (
   refresh_token VARCHAR(40) NOT NULL,
   client_id VARCHAR(80) NOT NULL,
   user_id VARCHAR(255),
   expires TIMESTAMP NOT NULL,
   scope VARCHAR(2000),
   CONSTRAINT refresh_token_pk PRIMARY KEY (refresh_token));
*/

class Migration_Create_table_oauth_refresh_tokens extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'refresh_token' => array(
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
            'expires' => array(
                'type' => 'DATETIME',
            ),
            'scope' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('refresh_token', TRUE);
        $this->dbforge->create_table('oauth_refresh_tokens');
    }

    public function down()
    {
        $this->dbforge->drop_table('oauth_refresh_tokens');
    }
}
