<?php
        // config pagination
		$config['base_url'] = 'http://localhost/tailwind/Produk/index';
        $config['num_links'] = 5;

		// styling pagination
		$config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="inline-flex -space-x-px">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = 'Prevous';
		$config['prev_tag_open'] = '<li>';	
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li><a href="#" aria-current="page" class="py-2 px-3 text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white');
