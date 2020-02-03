// just a click event for accordion

jQuery(document).ready( function(){
	

	jQuery('.dg_acc_wrap').on('click' , function(){
	
		//alert('clicked');
		jQuery(this).toggleClass('openitem');
		jQuery(this).find('.dg_acc_cont').toggleClass('open');
		jQuery(this).siblings().find('.dg_acc_cont').removeClass('open');
		jQuery(this).siblings().removeClass('openitem');

	});

});
