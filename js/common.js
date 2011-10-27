var jsOptions = {
	jqAlert: {
		overlay: 0,
		onShow: function(hash) {
			hash.w.fadeIn('slow');
		},
		onHide: function(hash) {
			hash.w.fadeOut('slow');
		}
	}
};

function validateForm() {}

function reportSpam(spammer, email_id) {
	$.post('/ajax_report_spam.php', 'spammer=' + spammer + '&email_id=' + email_id, function(data) {
		alert('Thanks for reporting!');
	});
}

function addHotBlock(type, id) {
	$.get('/ajax_hot-block.php?id=' + id + '&t=' + type, function(data) {
		eval(data);
	});
}

function ratePlugin(f, id) {
	$.get('/ajax_rateplugin.php?id=' + id + '&f=' + f, function(data) {
		eval(data);
	});
}

function uploadPicsRules(txt) {
	$.post('/ajax_upload_pics_rules.php', 'txt=' + txt, function(data) {
		eval(data);
	});
}

function showVideoPlayer(id) {
	$(document.body).append('<div id="video_player" class="jqmWindow"></div>');
	$('#video_player').html('Loading... <img src="/js/busy.gif">');
	$('#video_player').jqm({
		ajax: '/ajax_video_player.php?vid=' + id,
		modal: true,
		overlay: 25
	}).jqmShow();
}

function showPicturePopup(id) {
	$(document.body).append('<div id="picture_popup" class="jqmWindow" style="width:450px"></div>');
	$('#picture_popup').html('Loading... <img src="/js/busy.gif">');
	$('#picture_popup').jqm({
		ajax: '/ajax_picture_popup.php?id=' + id,
		modal: true,
		overlay: 25
	}).jqmShow();
}

function showComposePopup(id) {
	$(document.body).append('<div id="compose_popup" class="jqmWindow"></div>');
	$('#compose_popup').html('Loading... <img src="/js/busy.gif">');
	$('#compose_popup').jqm({
		ajax: '/ajax_message_new.php?id=' + id,
		modal: true,
		overlay: 25
	}).jqmShow();
}

function showFlirtPopup(id) {
	$(document.body).append('<div id="flirt_popup" class="jqmWindow"></div>');
	$('#flirt_popup').html('Loading... <img src="/js/busy.gif">');
	$('#flirt_popup').jqm({
		ajax: '/ajax_flirt.php?id=' + id,
		modal: true,
		overlay: 25
	}).jqmShow();
}

function changeMessageType(id) {
	var type = $('#message_attachment_' + id).is(":visible");
	switch (type) {
		case false:
			$('#message_attachment_' + id).html('<span><a href="javascript:;" onclick="showComposeGallery(' + id + ')">Attach a private picture/video from your library</a></span>');
			$('#message_attachment_' + id).slideDown('fast');
			break;
		default:
			document.forms['mail_form_' + id].message_type.value = 'S';
			$('#message_attachment_' + id).slideUp(function() {
				$('#gallery_thumb_container_' + id).animate({width:"hide"}, function() {
					$('#message_type_label_' + id).html('Standard email');
				});
			});
	}
}

function showComposeGallery(id) {
	window.email_id = id;
	$(document.body).append('<div id="compose_message_type" class="jqmWindow"></div>');
	$('#compose_message_type').html('Loading... <img src="/js/busy.gif">');
	$('#compose_message_type').jqm({
		ajax: '/ajax_mail_type.php',
		modal: true,
		zIndex: 999999,
		overlay: 25
	}).jqmShow();
}

function passwordRequest(type) {
	var url = '/ajax_gallery_password.php?t=' + type;
	$.get(url, function(data) {
		alert(data);
	});
}

function setInputStyle() {
	$('input[type=submit]').addClass('submitbutton');
	$('input[type=button]').addClass('submitbutton');
	$('input[type=text]').addClass('textfield');
	$('input[type=password]').addClass('textfield');
	$('textarea').addClass('textfield');
}

$(document).ready(function() {
	setInputStyle();
	$.ajaxSetup({cache:false});
	$().ajaxStop(setInputStyle);
	$.metadata.setType("attr", "validate");
	$.validator.messages.email = $.validator.messages.required = "";
});