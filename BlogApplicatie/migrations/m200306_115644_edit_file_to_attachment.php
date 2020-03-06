<?php

use yii\db\Migration;

/**
 * Class m200306_115644_edit_file_to_attachment
 */
class m200306_115644_edit_file_to_attachment extends Migration
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
        echo "m200306_115644_edit_file_to_attachment cannot be reverted.\n";

        return false;
    }

    public function up() {
        $this->dropColumn("blog", "file");
        $this->addColumn("blog", "attachment", \yii\db\Schema::TYPE_TEXT);
    }
    public function down() {
    $this->addColumn("blog", "file", \yii\db\Schema::TYPE_TEXT);
    $this->dropColumn("blog", "attachment");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200306_115644_edit_file_to_attachment cannot be reverted.\n";

        return false;
    }
    */
}
