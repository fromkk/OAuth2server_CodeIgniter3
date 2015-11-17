<?php

/* CREATE TABLE oauth_scopes (scope TEXT, is_default BOOLEAN); */

class Migration_Create_table_oauth_scopes extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'scope' => array(
                'type' => 'TEXT',
            ),
            'is_default' => array(
                'type' => 'BOOLEAN',
            ),
        ));
        $this->dbforge->create_table('oauth_scopes');
    }

    public function down()
    {
        $this->dbforge->drop_table('oauth_scopes');
    }
}
