<?php
defined('BASEPATH') or exit('No direct script access allowed');

add_option('axios_template_enabled', 1);

//get codeigniter instance
$CI = &get_instance();

// create table product type 
if (!$CI->db->table_exists(db_prefix().'axios_template')) {
    $CI->db->query('CREATE TABLE `'.db_prefix().'axios_template` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
	  PRIMARY KEY (`id`)
	)  ENGINE = InnoDB DEFAULT CHARSET='.$CI->db->char_set.';');
}



/*End of file install.php */