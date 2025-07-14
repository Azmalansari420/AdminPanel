

var handleRenderjQueryFileUpload = function() {
	$('#fileupload').fileupload({
		url: 'http://jquery-file-upload.appspot.com/',
		disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
		maxFileSize: 999000,
		acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
	});
	$('#fileupload').bind('fileuploadchange', function (e, data) {
		$('#fileupload .empty-row').hide();
	});
	$('#fileupload').bind('fileuploadfail', function(e, data){
		if (data.errorThrown === 'abort') {
			if ($('#fileupload .files tr').not('.empty-row').length == 1) {
				$('#fileupload .empty-row').show();
			}
		}
	});
	
	if ($.support.cors) {
		$.ajax({
			url: 'http://jquery-file-upload.appspot.com/',
			type: 'HEAD'
		}).fail(function () {
			var alert = '<div class="alert alert-danger m-b-0 m-t-15">Upload server currently unavailable - ' + new Date() + '</div>';
			$('#fileupload #error-msg').html(alert);
		});
	}
};


/* Controller
------------------------------------------------ */
$(document).ready(function() {
	handleRenderjQueryFileUpload();
});