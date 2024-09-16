<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
function compress()
{
  $CI =& get_instance();
  $buffer = $CI->output->get_output();
 
   $search = array(
    '/(\n|^)(\x20+|\t)/',
    '/(\n|^)\/\/(.*?)(\n|$)/',
    '/\n/',
    '/\<\!--.*?-->/',
    '/(\x20+|\t)/', # Delete multispace (Without \n)
    '/\>\s+\</', # strip whitespaces between tags
    '/(\"|\')\s+\>/', # strip whitespaces between quotation ("') and end tags
    '/=\s+(\"|\')/'); # strip whitespaces between = "'

   $replace = array(
    "\n",
    "\n",
    " ",
    "",
    " ",
    "><",
    "$1>",
    "=$1");

 
  $buffer = preg_replace($search, $replace, $buffer);
 
  $CI->output->set_output($buffer);
  $CI->output->_display();
}
 
/* End of file compress.php */
/* Location: ./system/application/hooks/compress.php */
