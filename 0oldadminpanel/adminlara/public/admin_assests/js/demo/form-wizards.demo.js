

var handleRenderFormWizards = function() {
	$('#rootwizard').bootstrapWizard({
		'nextSelector': '.wizard-next-btn', 
		'previousSelector': '.wizard-prev-btn'
	});
};


/* Controller
------------------------------------------------ */
$(document).ready(function() {
	handleRenderFormWizards();
});