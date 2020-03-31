<?php
namespace app\migrations;
use yii\db\Migration;

/**
 * Class m200304_141705_alter_user_table
 */
class m200304_141705_alter_user_table extends Migration
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
        echo "m200304_141705_alter_user_table cannot be reverted.\n";

        return false;
    }

    public function up() {
        $this->addColumn("user", "accessLevel", \yii\db\Schema::TYPE_INTEGER);
    }

    public function down() {
        $this->dropColumn("user", "accessLevel");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200304_141705_alter_user_table cannot be reverted.\n";

        return false;
    }
    */
}
