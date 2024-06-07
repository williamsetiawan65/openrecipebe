<?php
use PHPUnit\Framework\TestCase;

class apiTest extends TestCase {
    

private function _execute(array $params = array()) {
    $_GET = $params;
    ob_start();
    include 'apiAjax.php';
    return ob_get_clean();
}

public function testSomething() {
    $args = array('par1'=>'videoList', 'par2'=>'view', 'par3'=>'1', 'par4'=>'0');
    $expected = '{"datas":[{"videoId":"65536330-1ab8-11ef-890c-624c58d5222b","dateAdded":"2024-05-25 17:01:14","videoName":"rendang","videoLink":"rendang.com","ingredients":"meat","country":"indonesia","category":"main course","event":"bangga lokal","viewCount":"1500"}]}';
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