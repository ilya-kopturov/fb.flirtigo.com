{*$Id:$*}
<html>
 <head>
  <title>FlirtiGo</title>

	<link rel="stylesheet" type="text/css" href="{$cfg.template.url_template}login/css/style.css">
	<link rel="stylesheet" type="text/css" href="{$cfg.template.url_template}login/css/member.css">

	<script type="text/javascript" src="{$cfg.template.url_template}login/js/functions.js"></script>
	<script type="text/javascript" src="{$cfg.template.url_template}login/js/ajax.js"></script>

	{include file="site/dirtyflirting/common/js+css.tpl"}

</head>
<body>

<form id="upload_form" name="upload_form" method="POST" enctype="multipart/form-data">
<div class="clearfix" style="width:600px">
	<input type="hidden" name="type" value="{$type}">
	<div class="redtitle">Upload {$type}</div>
	<div style="float:right;">
		<a href="javascript:;" onclick="window.close();" title="Close">
			<img src="{$cfg.path.url_site}js/jqm_close.gif" border="0">
		</a>
	</div>
	<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="5"></div>
	<div class="generic_container clearfix">
		<div style="font-weight:bold">File location:</div>
		<div id="flashUI">
			<!-- The UI only gets displayed if SWFUpload loads properly -->
			<div>
				<input class="required textfield" type="text" id="txtFileName" readonly style="width:450px;margin-right:5px; vertical-align: top;" /><div id="swfuploadButtonPlaceHolder"></div>
			</div>
			<input type="hidden" name="hidFileID" id="hidFileID" value="" /><!-- This is where the file ID is stored after SWFUpload uploads the file and gets the ID back from upload.php -->
		</div>
		<div><img src="{$cfg.image.pixel}" height="10"></div>
		<div><input type="submit" value="Upload {$smarty.get.t}" id="btnUpload"></div>
		<div><img src="{$cfg.image.pixel}" height="10"></div>
		<div class="flash" id="fsUploadProgress" style="clear:left;width:100%;">
			<!-- This is where the file progress gets shown.  SWFUpload doesn't update the UI directly.
				The Handlers (in handlers.js) process the upload events and make the UI updates -->
		</div>
		<div id="fs_message" style="text-align:center;font-weight:bold"></div>
		<div><img src="{$cfg.image.pixel}" height="20"></div>
	</div>
</div>
</form>

</body>
</html>

{literal}
<script type="text/javascript">
var swf_upload_control = new SWFUpload({
	// Backend settings
	upload_url: "{/literal}{$cfg.path.url_site}{literal}swfupload.php",	// Relative to the SWF file, you can use an absolute URL as well.
	file_post_name: "uploaded_file",

	// Flash file settings
	file_size_limit : "20480",	// 20 MB
	file_types : "*.*",	// or you could use something like: "*.doc;*.wpd;*.pdf",
	file_types_description : "All Files",
	file_upload_limit : "0", // Even though I only want one file I want the user to be able to try again if an upload fails
	file_queue_limit : "1", // this isn't needed because the upload_limit will automatically place a queue limit

	// Event handler settings
	swfupload_loaded_handler : swfUploadLoaded,

	//file_dialog_start_handler : fileDialogStart,		// I don't need to override this handler
	file_queued_handler : fileQueued,
	file_queue_error_handler : fileQueueError,
	file_dialog_complete_handler : fileDialogComplete,

	//upload_start_handler : uploadStart,	// I could do some client/JavaScript validation here, but I don't need to.
	upload_progress_handler : uploadProgress,
	upload_error_handler : uploadError,
	upload_success_handler : uploadSuccess,
	upload_complete_handler : uploadComplete,

	// Button
	button_placeholder_id: "swfuploadButtonPlaceHolder",
	button_text: '<span class="theFont">Browse...</span>',
	button_width: "80",
	button_height: "22",
	button_text_style: '.theFont { text-align: center; font-size: 13px; font-family: "Trebuchet MS",Trebuchet,Verdana,Helvetica,Arial,sans-serif; }',

	// Flash Settings
	flash_url : "{/literal}{$cfg.path.url_site}{literal}swfupload/swfupload_f9.swf",	// Relative to this file

	// UI settings
	swfupload_element_id : "flashUI",		// setting for the graceful degradation plugin
	degraded_element_id : "degradedUI",

	custom_settings : {
		progress_target : "fsUploadProgress",
		upload_successful : false
	},

	// Debug settings
	debug: false
});

function fileBrowse() {
	var txtFileName = document.getElementById("txtFileName");
	txtFileName.value = "";

	this.cancelUpload();
	this.selectFile();
}

function doSubmit(e) {
	e = e || window.event;
	if (e.stopPropagation) e.stopPropagation();
	e.cancelBubble = true;

	try {
		if (!$("#upload_form").validate().form()) throw new Exception('Invalid form');
		swf_upload_control.startUpload();
		btnSubmit.attr('disabled', true);
	} catch (e) {}
    return false;
}

 // Called by the queue complete handler to submit the form
function uploadDone() {
	try {
		$('#fs_message').html('<blink>Processing, please wait...</blink>');
		$('#upload_form').ajaxSubmit({
			url: '{/literal}{$cfg.path.url_site}admin/addcampmedia.php?e={$smarty.get.e}&u=t{literal}',
			success: function() {},
			dataType: "script"
		});
	} catch (ex) {
		alert("Error submitting form");
	}
}
</script>
{/literal}

{literal}
<script>
$(document).ready(function() {
	$("#upload_form").bind("invalid-form.validate", function(e, validator) {
		var errors = validator.numberOfInvalids();
		if (errors) {
			var message = (errors == 1) ? 'You missed 1 field. It has been highlighted below' : 'You missed ' + errors + ' fields.  They have been highlighted below';
			$('#jqmErrorAlert').jqm(jsOptions.jqAlert);
			$('div.jqmAlertTitle span:first-child').css('color', 'red').html(message);
			$('#jqmErrorAlert').jqmShow();
		} else {
			try {
				$("#jqmErrorAlert").jqmHide();
			} catch (e) {}
		}
	}).validate({
		messages: {},
		submitHandler: uploadDone
	});
});
</script>
{/literal}