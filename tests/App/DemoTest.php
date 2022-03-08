<?php
    
    namespace Test\App;
    
    use App\App\Demo;
    use App\App\HttpRequest;
    use App\Service\AppLogger;
    use PHPUnit\Framework\TestCase;
    
    class DemoTest extends TestCase
    {
        public function testUserInfo ()
        {
            $logger      = new AppLogger( 'think-log' );
            $httpRequest = new HttpRequest();
            $result      = (new Demo( $logger,$httpRequest ))->mock_get_user_info();
            //断言json数据
            $this->assertJson( $result );
            $this->assertJsonStringEqualsJsonString( '{"error":0,"data":{"id":1,"username":"hello world"}}',$result );
            //转成数组
            $result = json_decode( $result,true );
            //error为0
            $this->assertEquals( 0,$result['error'] );
            //断言数据不为空
            $this->assertNotEmpty( $result['data'] );
        }
    }