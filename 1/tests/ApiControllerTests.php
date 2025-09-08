<?php
use App\Controller;
use App\Controller\ApiController;
use PHPUnit\Framework\TestCase;

class ApiControllerTests extends TestCase
{
    public $path_file = "/home/mikhail/likee_api/public/likes.txt";

    public function testApiController()
    {   
        $this->assertTrue(file_exists($this->path_file)); 
        
    }
    
    
}
