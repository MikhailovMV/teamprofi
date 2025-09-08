<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;



class ApiController
{ 
    #[Route('/api/articles/{id}/like', methods: ['POST', 'GET'])]
    public function like($id): Response
    {   
       
        $file = "likes.txt"; 
        if (!file_exists($file)){
                file_put_contents($file, "");  
        }
        $content = file_get_contents($file); 

        $ucontent = unserialize($content);
        $stop = 1;
        $headers = apache_request_headers();
            foreach ($headers as $header => $value) {
            //echo "$header: $value <br />\n";
            if ($header == "X-Api-Key" && $value=="TEST_KEY"){
                $stop = 0;
            }
        }
 
         if($id > 1000 && $stop > 0){

            $answer = array(
                "success" => false,
                "message" => "Article not found");
                $status = 404;
  
        }elseif($id > 1000 && $stop == 0){     
            $answer = array(
                "success" => false,
                "message" => "Wrong key");
                $status = 401; 

         }else{
                if(!empty($ucontent[$id])){
                    $ucontent[$id] = $ucontent[$id]+1;
                }else{
                    $ucontent[$id] = 1;
                }
            $answer = array(
                "success" => true,
                "likes_count" => $ucontent[$id]); 
                $status = 200; 
         
        }

        $result = file_put_contents($file, serialize($ucontent)); 

        return new JsonResponse($answer, $status);
    }
}