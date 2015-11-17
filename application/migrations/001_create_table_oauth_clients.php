<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
CREATE TABLE oauth_clients (
  client_id VARCHAR(80) NOT NULL,
  client_secret VARCHAR(80) NOT NULL,
  redirect_uri VARCHAR(2000) NOT NULL,
  grant_types VARCHAR(80),
  scope VARCHAR(100),
  user_id VARCHAR(80),
  CONSTRAINT clients_client_id_pk PRIMARY KEY (client_id));
 */

class Migration_Create_table_oauth_clients extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'client_id' => array(
                'type'       => 'VARCHAR',
                'constraint' => '80',
                'null'       => FALSE,
            ),
            'client_secret' => array(
                'type'       => 'VARCHAR',
                'constraint' => '80',
                'null'       => FALSE,
            ),
            'redirect_uri' => array(
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => FALSE,
            ),
            'grant_types' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
                'null' => TRUE,
            ),
            'scope' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'user_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('client_id', TRUE);
        $this->dbforge->create_table('oauth_clients');
    }

    public function down()
    {
        $this->dbforge->drop_table('oauth_clients');
    }
}
