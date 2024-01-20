<?php

/**
* It will load your header to inculde header.
*/

$this->load->view('layout/header');

/**
* This content will include loading view and its data.
*/
echo $template_contents;


/**
* It will load your footer to inculde footer.
*/
$this->load->view('layout/footer');

/* End of file body.php and path \application\views\body.php */
