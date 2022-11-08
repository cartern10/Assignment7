<?php
class JSONHelper{
	private static $obfuscator='<?php die() ?>';

	//Function that reads the data of a JSON file and outputs it using print_r
    static function read($file){
		$content=file_get_contents($file);
		$viewable_content=json_decode($content,true);
		print_r($viewable_content);
	}

	//Function that appends data to a JSON file
    static function update($file,$index,$data){
		if(!file_exists($file)) die('File not found');
			$prev_data=json_decode(file_get_contents($file),true);
		if(isset($prev_data[$index])){
			$prev_data[$index]=$data;
			file_put_contents($file,json_encode(array_values($prev_data)));
		}
	}

	//Function that writes new data to a JSON file
    static function write($file,$data){
		if(!file_exists($file)) die('File not found');
		$prev_data=json_decode(file_get_contents($file),true);
		$prev_data[]=$data;
		file_put_contents($file,json_encode($prev_data));
	}

	//Function that deletes data from a JSON file
    static function delete($file,$index=null){
		if(!file_exists($file)) die('File not found');
			$data=json_decode(file_get_contents($file),true);
		if(isset($data[$index])){
			unset($data[$index]);
			file_put_contents($file,json_encode(array_values($data)));
		}
	}
}