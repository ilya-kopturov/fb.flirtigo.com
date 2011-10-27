<?php
/* $Id: image.php 350 2008-05-23 19:06:51Z andi $ */

class Image
{
	var $image = FALSE;
	var $image_type = 2;

	function load($path)
	{
	    if ( $this->image ) {
	        imagedestroy($this->image);
	    }

	    $img_sz = getimagesize($path);
	    switch( $img_sz[2] ){
	        case 1:
	            $this->image_type = "GIF";
	            if ( !($this->image = imageCreateFromGif($path)) ) {
	                return FALSE;
	            } else {
	                return TRUE;
	            }
	            break;
	        case 2:
	            $this->image_type = "JPG";
	            if ( !($this->image = imageCreateFromJpeg($path)) ) {
	                return FALSE;
	            } else {
	                return TRUE;
	            }
	            break;
	        default:
	            return FALSE;
	    }
	}

	function save($path, $quality)
	{
	    if (!$this->image) {
	        return FALSE;
	    }
	    $fp = fopen($path, "w");
	    if (!$fp) {

	        return FALSE;
	    } else {
	        fclose($fp);
	        if (!imageJpeg($this->image, $path, $quality)) {
	            return FALSE;
	        } else {
	            return TRUE;
	        }
	    }
	}


	function resize($width, $height, $str, $font_size)
	{
	    if (!$this->image) {
	        return FALSE;
	    }
	    $oldWidth = imageSX($this->image);
	    $oldHeight = imageSY($this->image);

	    $ratioW = $oldWidth / $width;
	    $ratioH = $oldHeight / $height;
	    if ($ratioH > $ratioW) {
	        $newWidth = $oldWidth;
	        $newHeight = $height * $ratioW;
	        $srcX = 0;
	        $srcY = 0;
	    } else {
	        $newWidth = $width * $ratioH;
	        $newHeight = $oldHeight;
	        $srcX = +($oldWidth - $newWidth) / 2;
	        $srcY = 0;
	    }

	    $imageNew = ImageCreateTrueColor($newWidth, $newHeight);
	    imageCopyResampled($imageNew, $this->image, 0, 0, $srcX, $srcY, $oldWidth, $oldHeight, $oldWidth, $oldHeight);
	    imageDestroy($this->image);
	    $this->image = $imageNew;

	    $oldWidth = $newWidth;
	    $oldHeight = $newHeight;
	    $newWidth = $width;
	    $newHeight = $height;

	    $imageNew = ImageCreateTrueColor($newWidth, $newHeight);
	    imageCopyResampled($imageNew, $this->image, 0, 0, 0, 0, $newWidth, $newHeight, $oldWidth, $oldHeight);

		$dest=$imageNew;

		$w_dest = $newWidth;
		$h_dest = $newHeight;

		if ($font_size>0)
		{
			$size = $font_size; //
			$x_text = $w_dest-imagefontwidth($size)*strlen($str)-3;
			$y_text = $h_dest-imagefontheight($size)-3;

			//
			$white = imagecolorallocate($dest, 255, 255, 255);
			$black = imagecolorallocate($dest, 0, 0, 0);
			$gray = imagecolorallocate($dest, 127, 127, 127);
			if (@imagecolorat($dest,$x_text,$y_text)>$gray) $color = $black;
			if (@imagecolorat($dest,$x_text,$y_text)<$gray) $color = $white;

			//
			imagestring($dest, $size, $x_text-1, $y_text-1, $str,$white-$color);
			imagestring($dest, $size, $x_text+1, $y_text+1, $str,$white-$color);
			imagestring($dest, $size, $x_text+1, $y_text-1, $str,$white-$color);
			imagestring($dest, $size, $x_text-1, $y_text+1, $str,$white-$color);

			imagestring($dest, $size, $x_text-1, $y_text,   $str,$white-$color);
			imagestring($dest, $size, $x_text+1, $y_text,   $str,$white-$color);
			imagestring($dest, $size, $x_text,   $y_text-1, $str,$white-$color);
			imagestring($dest, $size, $x_text,   $y_text+1, $str,$white-$color);

			imagestring($dest, $size, $x_text,   $y_text,   $str,$color);
		}

	    imageDestroy($this->image);
	    $this->image = $dest;

	    return TRUE;
	}
}
?>