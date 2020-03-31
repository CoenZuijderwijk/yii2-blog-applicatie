<?php

namespace app\migrations;

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m200304_105641_create_tabel_user
 */
class m200304_105641_create_tabel_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200304_105641_create_tabel_user cannot be reverted.\n";

        return false;
    }

    public function up() {
        $this->createTable("user" ,[
           "id" => Schema::TYPE_PK,
           "username" => Schema::TYPE_STRING,
           "password" => Schema::TYPE_JSON,
           "authKey" => Schema::TYPE_STRING,
           "accesToken" => Schema::TYPE_STRING,
        ]);
    }

    public function down() {
        $this->dropTable("user");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200304_105641_create_tabel_user cannot be reverted.\n";

        return false;
    }
    */
}
