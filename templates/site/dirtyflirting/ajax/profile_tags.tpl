<div class="generic_container clearfix" id="profile_tags">
	<div class="redtitle">My Search Tags</div>
	<p>
		Use these search tags to best describe your personality, location and profile to others
		searching. The tags can be anything but bear in mind they will categorize you to others when
		users search the tag clouds on the site.
	</p>
	<p>
		We have added some automatically based on your profile but feel free to adjust them and they
		will be uses in the tag clouds instead.
	</p>
	<div style="font-size:16px">Edit your tags:</div>
	<div class="clear"><img src="{$cfg.image.pixel}" height="10"/></div>
	<form id="frm_tags" method="POST">
		<div style="float:left;margin-right:30px;">
			{foreach name=tags from=$tags item=tag}
				<div style="float:left;{if ($smarty.foreach.tags.index mod 2) eq 0}margin-right:10px;{/if}">
					<div><input class="not_email textfield" name="tags[id_{$tag.id}]" type="text" value="{$tag.value}"/></div>
				</div>
				{if $smarty.foreach.tags.index mod 2}
					<div class="clear"><img src="{$cfg.image.pixel}" height="5"/></div>
				{/if}
			{/foreach}
			{if $add_one}
				<div style="float:left;"><input class="not_email textfield" name="tags[{rnd_md5}]" type="text" value=""/></div>
				<div class="clear"><img src="{$cfg.image.pixel}" height="5"/></div>
			{/if}
			<div id="last" class="clear"><img src="{$cfg.image.pixel}" height="5"/></div>
			<div>More <a href="javascript:;" onclick="createFields()" title="click to add more fields">[+]</a></div>
		</div>
		<div style="width:350px;float:left;">
			<div style="float:left;">
				For example, if you use a tag such as "Los Angeles"
				you will be shown in that Tag Cloud search result if
				someone clicks on the "Los Angeles" Tag (providing its
				popular enough to be shown in the cloud).
			</div>
			<p style="float:left;">
				<b>Popular tags currently are</b>:
				{foreach name=popular from=$popular item=tag}
				<a href="{$cfg.path.url_site}tag/{$tag.tag}" target="_blank">{$tag.tag}</a>{if $smarty.foreach.popular.iteration neq $smarty.foreach.popular.last},{else}.{/if}
				{/foreach}
			</p>
		</div>
		<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="10"/></div>
		<div><input type="image" src="{$cfg.template.url_template}/login/images/submit_tags.gif"/></div>
	</form>
</div>

{literal}
<script>
$.validator.addMethod("not_email", function(value, element) {
  return this.optional(element) || !(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i.test(element.value));
}, "Emails not allowed");

$("#frm_tags").bind("invalid-form.validate", function(e, validator) {
	var errors = validator.numberOfInvalids();
	if (errors) {
		var message = (errors == 1) ? 'You missed 1 field. It has been highlighted below' : 'You missed ' + errors + ' fields.  They have been highlighted below';
		//$('#jqmErrorAlert').jqm(jsOptions.jqAlert);
		//$('div.jqmAlertTitle span:first-child').css('color', 'red').html(message);
		//$('#jqmErrorAlert').jqmShow();
		$('#error_alert table').removeClass('error');
		$('#error_alert table').addClass('success');
		$('#error_alert div.errorTextBig').html(message);
		$('#error_alert').fadeIn('slow');
		window.scrollTo(0, 0);
	} else {
		try {
			$("#error_alert").fadeOut('slow');
		} catch (e) {}
	}
}).validate({
	errorElement: "div",
	submitHandler: function() {
		$("#frm_tags").ajaxSubmit({
			url: {/literal}'{$cfg.path.url_site}ajax_profile_tags.php?u=t'{literal},
			dataType: 'script'
		});
	}
});

function createFields() {
	var id = Math.round(Math.random() * 99999999999);
	var template = '\
		<div id="' + id + '" class="clear" style="float:left;display:none">\
			<div style="float:left;margin-right:10px;">\
				<div><input class="not_email textfield" name="tags[' + (id + 1) + ']" type="text" value=""/></div>\
			</div>\
			<div style="float:left;">\
				<div><input class="not_email textfield" name="tags[' + (id + 2) + ']" type="text" value=""/></div>\
			</div>\
		</div>\
		<div class="clear"><img src="{/literal}{$cfg.image.pixel}{literal}" height="5"/></div>';
	$('#last').before(template);
	$('#' + id).slideDown('fast');
}
</script>
{/literal}
