<?php

/*
 CREATE TABLE oauth_jwt (
   client_id VARCHAR(80) NOT NULL,
   subject VARCHAR(80),
   public_key VARCHAR(2000),
   CONSTRAINT jwt_client_id_pk PRIMARY KEY (client_id));
*/

class Migration_Create_table_oauth_jwt extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'client_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
            ),
            'subject' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
                'null' => TRUE,
            ),
            'pubilc_key' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('client_id', TRUE);
        $this->dbforge->create_table('oauth_jwt');
    }

    public function down()
    {
        $this->dbforge->drop_table('oauth_jwt');
    }
}
