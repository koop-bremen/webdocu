<?php

namespace App\Tools;

use File;
use Storage;

class VueFileUploadHandler
{


	public static function saveFile($file, $filename, $directory){
	    
	    $image_parts = explode(";base64,", $file);

	    $f = base64_decode($image_parts[1]);

	    $storagePath  = Storage::disk('local')
	    					->getDriver()
	    					->getAdapter()
	    					->getPathPrefix();

	    $path = $storagePath . 'public' . DIRECTORY_SEPARATOR . $directory .DIRECTORY_SEPARATOR. $filename;

    	$bytes_written = File::put($path, $file);

    	return DIRECTORY_SEPARATOR . $directory .DIRECTORY_SEPARATOR. $filename;

	}


}
