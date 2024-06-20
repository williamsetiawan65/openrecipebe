<?php
use PHPUnit\Framework\TestCase;

class apiTest extends TestCase {
    

private function _execute(array $params = array()) {
    $_GET = $params;
    ob_start();
    include './deploy/api.php';
    return ob_get_clean();
}

public function testSomething() {
    $args = array('par1'=>'videoList', 'par2'=>'view', 'par3'=>'1', 'par4'=>'0');
    $expected = '{"data":[{"videoId":"83ec2644-2996-11ef-8694-feed01060016","dateAdded":"2024-06-13 15:06:30","videoName":"IKAN BAKAR","videoLink":"https:\/\/www.youtube.com\/embed\/aE_hY1aThSg?si=iqAIJbBTTHbVgBqu","ingredients":"Fish","country":"indonesia","category":"Main Course","event":"bangga lokal","viewCount":"2000000000"}]}';
    $this->assertEquals($expected, $this->_execute($args)); // passes

    // $args = array('arg1'=>30, 'arg2'=>12);
    // $this->assertEquals(42, $this->_execute($args)); // passes

    // $args = array('arg1'=>-30, 'arg2'=>40);
    // $this->assertEquals(10, $this->_execute($args)); // passes

    // $args = array('arg1'=>0, 'arg2' =>10);
    // $this->assertEquals(10, $this->_execute($args)); // fails
}

}
?>