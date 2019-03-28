<?php
namespace Rigo\Controller;

use Rigo\Types\Course;
use Rigo\Types\Product;

class SampleController{
    
    public function getHomeData(){
        return [
            'name' => 'Rigoberto'
        ];
    }
    
    public function getDraftCourses(){
        $query = Course::all([ 'status' => 'draft' ]);
        return $query->posts;
    }
    
    public function getAllProducts(){
        $query = Product::all();
         if($query->have_posts()){
    
            while($query->have_posts()){
            
                $query->the_post();
                
                //include the meta tags and values
                
                $query->post->meta_keys = get_post_meta($query->post->ID);
                
                $query->post->image_1 = get_field("image_1",$query->post->ID);
            
            }
        }
        return $query->posts;
    }
    
}
?>