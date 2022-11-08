<?php
class CSVHelper{
	private static $obfuscator='<?php die() ?>';

    //Function reads a csv file
    static function read($file){
        $fh=fopen($file,'r');
        $line_counter=0;
        while($line=fgets($fh)){
            print_r($line);
        }
        fclose($fh);
    }

    //Function writes new data to a csv file
    static function write($file,$data,$assoc=false,$overwrite=false){
        $fh=fopen($file,'a');
        fputs($fh,$data.PHP_EOL);
        fclose($fh);
    }

    //Function that is suppose to update data in a csv file
    //Doesn't work
    static function update($file,$current_data,$data){
        $fh=fopen($file,'r');
        $new_file_content='';
        while($line=fgets($fh)){
            if($line==($current_data)){
                $new_file_content.=$data.PHP_EOL;
            }
            else
            $new_file_content.=$line;
        }
        fclose($fh);
        file_put_contents($file,$new_file_content);
    }

    //Function that deletes data from a csv file
    static function delete($file,$given_line){
        $fh=fopen($file,'r');
        $line_counter=0;
        $new_file_content='';
        while($line=fgets($fh)){
            if($line_counter==$given_line){
                $new_file_content.=PHP_EOL;
        }
            else
                $new_file_content.=$line;
            $line_counter++;
        }
        fclose($fh);
        file_put_contents($file,$new_file_content);
    }
}
