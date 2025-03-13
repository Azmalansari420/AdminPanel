<?php
#[\AllowDynamicProperties]
class MySiteName {

    Public function Mysitetitle()
    {
      $this->CI =& get_instance();
      $mysitename = $this->CI->output->get_output();
      $mysitename = str_replace("EMM GLOBAL HEALTH CARE", "WAARR", $mysitename);
      echo $mysitename;
      return;
 }
}