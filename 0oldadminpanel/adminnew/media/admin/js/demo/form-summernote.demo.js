
var handleRenderSummernote = function() {
	var totalHeight = $(window).height() - $('.summernote').offset();
	$('.summernote').summernote({
		height: totalHeight
	});
};


/* Controller
------------------------------------------------ */
$(document).ready(function() {
	handleRenderSummernote();
});