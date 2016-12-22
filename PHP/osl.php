<?php
// The MIT License (MIT)
// 
// Copyright (c) 2016 erdb4ertorte@gmail.com
// 
// Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
// 
// The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
// 
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

   if(!empty($_GET["api_version"]) && !empty($_GET["unit_name"])){
   $csvData = array($_GET["api_version"],$_GET["unit_name"],$_GET["temperature"],$_GET["inclination_x"],$_GET["inclination_y"],$_GET["voltage"],$_GET["epoch"]);
   $csvDataNames = array("api_version", "unit_name", "temperature", "inclination_x", "inclination_y", "voltage", "epoch");
   $csv_name = "osl_data.csv";
   if (!file_exists ( "$csv_name" )){
      $fp = fopen("$csv_name","w");
      if($fp)    {
       fputcsv($fp,$csvDataNames, chr(32));
       fclose($fp);
      }
   }
   $fp = fopen("$csv_name","a");
   if($fp)    {  
       fputcsv($fp,$csvData, chr(32));
       fclose($fp);
   }
   $rc_file = "osl_rc.txt";
   if(file_exists ( "$rc_file" )) {
     echo file_get_contents("$rc_file");
   }

}

?>
