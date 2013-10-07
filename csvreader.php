<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CSVReader {

    function parse($path) 
    {
        if (($handle = fopen($path, "r")) !== FALSE) {
            $fields = fgetcsv($handle, 1000, ";");
            $num = count($fields);
            for ($i=0; $i < $num; $i++) {
                    $index[$i] =  $fields[$i];
            }

            $i = 0;
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $content[$i] = array();
                if( $data != null ) { // skip empty lines
                    if(count($index) == count($data)) {
                        $num = count($data);
                        for ($c=0; $c < $num; $c++) {
                            $content[$i][$index[$c]] = $data[$c];
                        }
                    }
                }
                $i++;
            }
            fclose($handle);
        }
        return $content;
    }

}