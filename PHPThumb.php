<?php
    
    /**
     * 
     * @param $file_image
     * @param $width_thumbnail
     * @param $height_thumbnail
     * @param $file_name;
     * 
     * @return $thumbnail
     * 
     */


    final class PHPThumb{

        private $type;

        private $width;
        
        private $height;
        
        private $path;
        
        private $image;
        
        private $thumbWidth;

        private $thumbHeight;

        private $file_name;
    
        public function __construct(){
            if (!extension_loaded('gd') OR !function_exists('gd_info')) {
                return 'Extension gd not installed!';
            }
        }

        public function loadImage($src){
            
            if(!$this->checkType($src)):
                echo 'Sorry, somenthing png and jpeg files.';
                return;
            endif;

            if($this->type == 'jpg' OR $this->type == 'jpeg'):
                $this->image = imagecreatefromjpeg($src);
                $this->width = imagesx($this->image);
                $this->height = imagesy($this->image);
                return;
            endif;
    
            $this->image = imagecreatefrompng($src);
            $this->width = imagesx($this->image);
            $this->height = imagesy($this->image);

        }

        public function thumbWidth($width){
            $this->thumbWidth = $width;
        }

        public function thumbHeight($height = null){
            $this->thumbHeight = $height;                
        }

        public function setFileName(string $name){
            $this->file_name = $name;
        }

        public function savePath($dir){
            $this->path = $dir;
        }

        public function generateThumb(){
            try {
                
                $image_generated = imagecreatetruecolor($this->thumbWidth, $this->thumbHeight);

                imagecopyresampled($image_generated, $this->image, 0, 0, 0, 0, $this->thumbWidth, $this->thumbWidth, $this->width, $this->height);

                if($this->type == 'png'):
                    imagepng($image_generated, $this->path);
                    return true;
                endif;
                
                imagejpeg($image_generated, $this->path . $this->file_name);
                return true;

            } catch (\Throwable $th) {
                return $th;
            }
            
        }

        private function checkType($type){
            
            $types = [
                'image/png',
                'image/jpeg',
                'image/jpg'
            ];

            if(!in_array(mime_content_type($type), $types)):
                return false;
            endif;

            $this->type = str_replace('image/', '', mime_content_type($type));

            return true;
        }

    }

