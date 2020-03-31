<?php
namespace app\tests\unit\models;

use app\models\Comment;

class CommentTest extends \Codeception\Test\Unit
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


    public function testCreateComment()
    {
        $c = new Comment();
        $c->blog_id = 3;
        $c->publish_date = date("Y-m-d H:i:s");
        $c->title = "haat comment";
        $c->slug = "ik haat dit artikel";
        $this->assertTrue($c->save());
    }

    public function testDeleteComment()
    {
       $c = Comment::find()->where(['title' => "php"])->one();
       $this->assertNotNull($c);
       Comment::deleteAll(['title'  =>  $c->title]);
        $c = Comment::find()->where(['title' => "php"])->one();
        $this->assertNull($c);
    }
}