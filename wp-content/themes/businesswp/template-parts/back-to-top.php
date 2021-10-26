<?php 
$ft_back_to_top = businesswp_get_option('footer_back_to_top');

if($ft_back_to_top=='disable'){
	return;
}
?>
<a href="#" class="back-to-top"></button><i class="fa fa-long-arrow-up"></i></a>