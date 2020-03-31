<?php
namespace app\tests\unit\models;
use app\models\Attachment;

class AttachmentTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }


    public function testCreateAttachment()
    {
        $a = new Attachment();
        $a->blog_id = 3;
        $a->file_name = "bestand";
        $a->file_extension = "png";
        $a->file_full_name = $a->file_name . "." .$a->file_extension;
        $this->assertTrue($a->save());
    }

    public function testDeleteAttachment()
    {
        $a = Attachment::find()->where(['file_name' => "smile"])->one();
        $this->assertNotNull($a);
        Attachment::deleteAll(['file_name' => $a->file_name]);
        $a = Attachment::find()->where(['file_name' => "smile"])->one();
        $this->assertNull($a);

    }
}