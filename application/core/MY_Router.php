<?php
class MY_Router extends CI_Router {

protected function _validate_request($segments)
 {
 $c = count($segments);
 $directory_override = isset($this->directory);

 // Loop through our segments and return as soon as a controller
 // is found or when such a directory doesn't exist
 while ($c-- > 0)
 {
 $test = $this->directory
 .ucfirst($this->translate_uri_dashes === TRUE ? str_replace('-', '_', $segments[0]) : $segments[0]);

 if ( ! file_exists(APPPATH.'controllers/'.$test.'.php')
 && $directory_override === FALSE
 && is_dir(APPPATH.'controllers/'.$this->directory.$segments[0])
 )
 {
 $this->set_directory(array_shift($segments), TRUE);
                while(count($segments) > 0 && is_dir(APPPATH.'controllers/'.$this->directory.$segments[0]))
                {
                    $this->set_directory($this->directory . $segments[0]);
                    $segments = array_slice($segments, 1);
                }
 continue;
 }

 return $segments;
 }

 // This means that all segments were actually directories
 return $segments;
 }
} 