<?php
class Timezone_hook {
    public function set_mysql_timezone() {
        $CI =& get_instance();
        if (isset($CI->db)) {
            $CI->db->query("SET time_zone = '+05:30'");
        }
    }
}