<?php

use app\models\Blog;

class BlogTest extends \Codeception\Test\Unit
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


    public function testCreateBlog()
    {
        $b = new Blog();
        $b->author_id = 12;
        $b->publish_date = date('Y-m-d H:i:s');
        $b->title= "tstB";
        $b->slug = "lorem ipsa";
        $b->inleiding = "inleidingtje";
        $this->assertTrue($b->save());
    }

    public function testUpdateBlog()
    {
        $b = new Blog();
        $b->author_id = 12;
        $b->publish_date = date("Y-m-d H:i:s");
        $b->title = "tietel";
        $b->slug = "inhoud van deze tekst";
        $b->inleiding = "inhoud";
        $this->assertTrue($b->save());
        $b = Blog::find()->where(['title' => "tietel"])->one();
        $b->title = "title";
        $this->assertEquals("title", $b->title);
    }

    public function testDeleteBlog() {
        $b = Blog::find()->where(['title' => "piet"])->one();
        $this->assertNotNull($b);
        Blog::deleteAll(['title' => $b->title]);
        $b = Blog::find()->where(['title' => "piet"])->one();
        $this->assertNull($b);

    }
}