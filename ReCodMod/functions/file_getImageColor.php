<?php
/**
 * Class for  Generator Image Color Palette.  
 * This file is class for return  mamimum used colors in image, format return in HTML or RGB format. 
 *
 * PHP versions 4 and 5
 * Licensed under The GPL License
 *
 * Developed By 	Kalpeh Gamit
 * E-mail 			Kalpa.programmer@gmail.com
 *
 * @filesource
 * @copyright     Copyright 2009, InScripter Inc. (http://www.inscripter.com)
 * @link          http://www.inscripter.com
 * @package       PHP
 * @version       GetImageColor-1.0.0
 * @license       http://www.opensource.org/licenses/gpl-2.0.php The GPL License
 */
 
// start of class : Generator Image Color Palette 
class GeneratorImageColorPalette 
{
	// get image color in RGB format function 
	function getImageColor($imageFile_URL, $numColors, $image_granularity = 5)
	{
   		$image_granularity = max(1, abs((int)$image_granularity));
   		$colors = array();
   		//find image size
   		$size = @getimagesize($imageFile_URL);
   		if($size === false)
   		{
      		user_error("Unable to get image size data");
      		return false;
   		}
   		// open image
   		$img = @imagecreatefromjpeg($imageFile_URL);
   		if(!$img)
   		{
   	  		user_error("Unable to open image file");
   		   return false;
   		}
   		
   		// fetch color in RGB format
   		for($x = 0; $x < $size[0]; $x += $image_granularity)
   		{
      		for($y = 0; $y < $size[1]; $y += $image_granularity)
      		{
         		$thisColor = imagecolorat($img, $x, $y);
         		$rgb = imagecolorsforindex($img, $thisColor);
        		$red = round(round(($rgb['red'] / 0x33)) * 0x33);
         		$green = round(round(($rgb['green'] / 0x33)) * 0x33);
         		$blue = round(round(($rgb['blue'] / 0x33)) * 0x33);
         		$thisRGB = sprintf('%02X%02X%02X', $red, $green, $blue);
         		if(array_key_exists($thisRGB, $colors))
         		{
           			 $colors[$thisRGB]++;
         		}
         		else
         		{
           			 $colors[$thisRGB] = 1;
         		}
      		}
   		}
   		arsort($colors);
   		// returns maximum used color of image format like #C0C0C0.
   		return array_slice(array_keys($colors), 0, $numColors);
	}

	// html color to convert in RGB format color like R(255) G(255) B(255)  
	function getHtml2Rgb($str_color)
	{
    	if ($str_color[0] == '#')
        	$str_color = substr($str_color, 1);

  	  	if (strlen($str_color) == 6)
        	list($r, $g, $b) = array($str_color[0].$str_color[1],
                                 $str_color[2].$str_color[3],
                                 $str_color[4].$str_color[5]);
    	elseif (strlen($str_color) == 3)
        	list($r, $g, $b) = array($str_color[0].$str_color[0], $str_color[1].$str_color[1], $str_color[2].$str_color[2]);
    	else
        	return false;

    	$r = hexdec($r); $g = hexdec($g); $b = hexdec($b);
    	$arr_rgb = array($r, $g, $b);
		// Return colors format liek R(255) G(255) B(255)  
    	return $arr_rgb;
	}

// end of class here : Generator Image Color Palette  
}



/**
 * @param string $aInitialImageFilePath - строка, представляющая путь к обрезаемому изображению
 * @param string $aNewImageFilePath - строка, представляющая путь куда нахо сохранить выходное обрезанное изображение
 * @param int $aNewImageWidth - ширина выходного обрезанного изображения
 * @param int $aNewImageHeight - высота выходного обрезанного изображения
 */
function cropImagezin($aInitialImageFilePath, $aNewImageFilePath, $aNewImageWidth, $aNewImageHeight) {
    if (($aNewImageWidth < 0) || ($aNewImageHeight < 0)) {
        return false;
    }

    // Массив с поддерживаемыми типами изображений
    $lAllowedExtensions = array(1 => "gif", 2 => "jpeg", 3 => "png"); 
    
    // Получаем размеры и тип изображения в виде числа
    list($lInitialImageWidth, $lInitialImageHeight, $lImageExtensionId) = getimagesize($aInitialImageFilePath); 
    
    if (!array_key_exists($lImageExtensionId, $lAllowedExtensions)) {
        return false;
    }
    $lImageExtension = $lAllowedExtensions[$lImageExtensionId];
    
    // Получаем название функции, соответствующую типу, для создания изображения
    $func = 'imagecreatefrom' . $lImageExtension; 
    // Создаём дескриптор исходного изображения
    $lInitialImageDescriptor = $func($aInitialImageFilePath);

    // Определяем отображаемую область
    $lCroppedImageWidth = 0;
    $lCroppedImageHeight = 0;
    $lInitialImageCroppingX = 0;
    $lInitialImageCroppingY = 0;
    if ($aNewImageWidth / $aNewImageHeight > $lInitialImageWidth / $lInitialImageHeight) {
        $lCroppedImageWidth = floor($lInitialImageWidth);
        $lCroppedImageHeight = floor($lInitialImageWidth * $aNewImageHeight / $aNewImageWidth);
        $lInitialImageCroppingY = floor(($lInitialImageHeight - $lCroppedImageHeight) / 2);
    } else {
        $lCroppedImageWidth = floor($lInitialImageHeight * $aNewImageWidth / $aNewImageHeight);
        $lCroppedImageHeight = floor($lInitialImageHeight);
        $lInitialImageCroppingX = floor(($lInitialImageWidth - $lCroppedImageWidth) / 2);
    }
    
    // Создаём дескриптор для выходного изображения
    $lNewImageDescriptor = imagecreatetruecolor($aNewImageWidth, $aNewImageHeight);
    imagecopyresampled($lNewImageDescriptor, $lInitialImageDescriptor, 0, 0, $lInitialImageCroppingX, $lInitialImageCroppingY, $aNewImageWidth, $aNewImageHeight, $lCroppedImageWidth, $lCroppedImageHeight);
    $func = 'image' . $lImageExtension;
    
    // сохраняем полученное изображение в указанный файл
    return $func($lNewImageDescriptor, $aNewImageFilePath);
}

class SimpleImage {

   var $image;
   var $image_type;

   function load($filename) {
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image,$filename);
      }
      if( $permissions != null) {
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image);
      }
   }
   function getWidth() {
      return imagesx($this->image);
   }
   function getHeight() {
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }
}		



function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec($hex[0].$hex[0]);
      $g = hexdec($hex[1].$hex[1]);
      $b = hexdec($hex[2].$hex[2]);
   } else {
      $r = hexdec($hex[0].$hex[1]);
      $g = hexdec($hex[2].$hex[3]);
      $b = hexdec($hex[4].$hex[5]);
   }

   return array($r, $g, $b); // returns an array with the rgb values
}








function rgb2html($r, $g=-1, $b=-1)
{
    if (is_array($r) && sizeof($r) == 3)
        list($r, $g, $b) = $r;

    $r = intval($r); $g = intval($g);
    $b = intval($b);

    $r = dechex($r<0?0:($r>255?255:$r));
    $g = dechex($g<0?0:($g>255?255:$g));
    $b = dechex($b<0?0:($b>255?255:$b));

    $color = (strlen($r) < 2?'0':'').$r;
    $color .= (strlen($g) < 2?'0':'').$g;
    $color .= (strlen($b) < 2?'0':'').$b;
    return '#'.$color;
}









// возвращает расстояние между двумя цветами
function getDistanceFromColor($a, $b) 
{
    list($r1, $g1, $b1) = $a;
    list($r2, $g2, $b2) = $b;
    
    return sqrt(pow($r2-$r1, 2)+pow($g2-$g1, 2)+pow($b2-$b1, 2));
}

// Возвращает наиболее подходящий цвет из палитры
function getClosestColor($color, array $pallet) {
    $distances = array_map(function ($colorFromPallet) use ($color) {
         return getDistanceFromColor($color, $colorFromPallet);
    }, $pallet);
    
    ksort($distances);
    $keys = array_keys($distances);
    
    return $pallet[$keys[0]];    
}

?>