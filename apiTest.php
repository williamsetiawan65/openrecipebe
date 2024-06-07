<?php
$coba = "coba";
use PHPUnit\Framework\TestCase;

class apiTest extends TestCase {
    

private function _execute(array $params = array()) {
    $_GET = $params;
    ob_start();
    include 'api.php';
    return ob_get_clean();
}

public function testSomething() {
    $args = array('request'=>'videoList', 'option'=>'view', 'limit'=>1, 'offset'=>'0');
    $expected = '{"data":[{"videoId":"65536330-1ab8-11ef-890c-624c58d5222b","dateAdded":"2024-05-26 00:01:14","videoName":"rendang","videoLink":"rendang.com","ingredients":"meat","country":"indonesia","category":"main course","event":"bangga lokal","viewCount":"1500"}]}';
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