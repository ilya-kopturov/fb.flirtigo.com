{* $Id: profile_video.tpl 588 2008-06-20 18:21:48Z bogdan $ *}

<div class="redtitle" style="float:left">Add or Edit Videos</div><div style="float:right"><a href="javascript:;" onclick="$('#profile > ul').tabs('load', 3)">[back to videos]</a></div>
<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
<div style="text-align:left;">
    <div style="float:left;margin-right:20px;">
        <div style="font-weight:bold">Preview</div>
        <div class="video_container">
            {if $video}
            <img id="video_{$video.id}" width="121" src="videothumb.php?{rnd_md5}&id={$video.id}">
            <div style="text-align:right"><a href="javascript:;" onclick="doDeleteVideo('{$video.id}')">[Delete]</a></div>
            {else}
            <img id="video_{$video.id}" src="{$cfg.path.url_photos}novideo.jpg" width="121" height="121">
            {/if}
        </div>
    </div>
    <div style="float:left">
        <form id="frm_profile_video" method="POST" enctype="multipart/form-data" onsubmit="return false;">
            <input type="hidden" name="video_id" value="{$video.id}">
            <div style="font-weight:bold">Title:</div>
            <div><input style="width:550px" class="required textfield" type="text" name="title" value="{$video.video_name|escape:'htmlall'}"></div>
            <div style="font-weight:bold">Description:</div>
            <div><textarea class="textfield" style="width:550px" name="description" rows="5">{$video.video_description|escape:'htmlall'}</textarea></div>
            <div style="font-weight:bold">File location:</div>
            <div id="flashUI">
                <!-- The UI only gets displayed if SWFUpload loads properly -->
                <div>
                    <input class="{if $video}{else}required {/if}textfield" type="text" id="txtFileName" readonly style="width:450px;margin-right:5px; vertical-align: top;" /><div id="swfuploadButtonPlaceHolder"></div>
                </div>
                <input type="hidden" name="hidFileID" id="hidFileID" value="" /><!-- This is where the file ID is stored after SWFUpload uploads the file and gets the ID back from upload.php -->
            </div>
            <div id="degradedUI">
                <!-- This is the standard UI.  This UI is shown by default but when SWFUpload loads it will be
                hidden and the "flashUI" will be shown -->
                <input type="file" name="resume_degraded" id="resume_degraded" /><br/>
            </div>
            <div>
                <span style="font-weight:bold">Show Video in:</span>
                {if $video}
                {html_options name=gallery options=$galleries selected=$video.gallery}
                {else}
                {html_options name=gallery options=$galleries selected="1"}
                {/if}
            </div>
            <div><img src="{$cfg.image.pixel}" height="10"></div>
            <div><input type="submit" value="{if $video}Apply{else}Upload Video{/if}" id="btnUpload"></div>
        </form>
    </div>
    <div class="flash" id="fsUploadProgress" style="clear:left;">
        <!-- This is where the file progress gets shown.  SWFUpload doesn't update the UI directly.
            The Handlers (in handlers.js) process the upload events and make the UI updates -->
    </div>
    <div><img src="{$cfg.image.pixel}" height="20"></div>
    <div class="clear"></div>
    <div style="font-size:11px;text-align:left;">
        <div><p>By uploading content to your profile you agree to the following:</p>
            <ul class="f_none">
                <li class="f_none">Only video of yourself and your partner (if applicable) are allowed.</li>
                <li class="f_none">If you upload sexually explicit content you agree to comply with <a href="javascript:;" onclick="$('#profile_videos').load('{$cfg.path.url_site}2257.php?tabname=video&{rnd_md5}');">the additonal terms stated here</a></li>
                <li class="f_none">No video of animals, anyone appearing under 18 or other items other than the person(s) featured in the profile. No images of acts such as torture or pain.</li>
                <li class="f_none">No contact details to be included in any video.</li>
                <li class="f_none">Don't upload single images bigger than 20MB</li>
            </ul>
        </div>
    </div>
</div>

{literal}
<script type="text/javascript">
    function doDeleteVideo(id) {
        $.ajax({
            type: "POST",
            url: {/literal}'{$cfg.path.url_site}ajax_profile_video.php?{rnd_md5}&u=d'{literal},
            data: "video_id=" + id,
            success: function(result) {
                if (parseInt(result) > 0) {
                    $('input[name="video_id"]').attr('value', 0);
                    $('#video_' + id).replaceWith('<img id="video_' + id + '" src="{/literal}{$cfg.path.url_photos}{literal}novideo.jpg" width="121" height="121">');
                }
            }
        });
    }
</script>
{/literal}

{literal}
<script type="text/javascript">
    var swf_upload_control = new SWFUpload({
        // Backend settings
        upload_url: "{/literal}{$cfg.path.url_site}{literal}swfupload.php",	// Relative to the SWF file, you can use an absolute URL as well.
        file_post_name: "uploaded_file",

        // Flash file settings
        file_size_limit : "20480",	// 20 MB
        file_types : "*.*",	// or you could use something like: "*.doc;*.wpd;*.pdf",
        file_types_description : "All Video Files",
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

        // Flash Settings
        flash_url : "swfupload/swfupload_f9.swf",	// Relative to this file

        // Button
        button_placeholder_id: "swfuploadButtonPlaceHolder",
        button_text: '<span class="theFont">Browse...</span>',
        button_width: "80",
        button_height: "22",
        button_text_style: '.theFont { text-align: center; font-size: 13px; font-family: "Trebuchet MS",Trebuchet,Verdana,Helvetica,Arial,sans-serif; }',
	
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

    function uploadComplete(fileObj) {
        try {
            if (this.customSettings.upload_successful) {
                uploadDone();
            } else {
                fileObj.id = "singlefile";	// This makes it so FileProgress only makes a single UI element, instead of one for each file
                var progress = new FileProgress(fileObj, this.customSettings.progress_target);
                progress.SetError();
                progress.SetStatus("File rejected");
                progress.ToggleCancel(false);

                var txtFileName = document.getElementById("txtFileName");
                txtFileName.value = "";
                validateForm();

                alert("There was a problem with the upload.\nThe server did not accept it.");
                $('input[type="submit"]').attr('disabled', false);
            }
        } catch (e) {  }
    }

    function doSubmit(e) {
        e = e || window.event;
        if (e.stopPropagation) e.stopPropagation();
        e.cancelBubble = true;

        try {
            if (!$("#frm_profile_video").validate().form()) throw new Exception('Invalid form');

            var is_update = '{/literal}{$video.id}{literal}';
            if ((is_update != '') && ($('input#txtFileName').attr('value') == '')) return true;

            swf_upload_control.startUpload();
            btnSubmit.attr('disabled', true);
        } catch (ex) {

        }
        return false;
    }

    // Called by the queue complete handler to submit the form
    function uploadDone() {
        try {
            $('#frm_profile_video').ajaxSubmit({
                url: {/literal}'{$cfg.path.url_site}ajax_profile_video.php?u=t'{literal},
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
    $("#frm_profile_video").bind("invalid-form.validate", function(e, validator) {
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
</script>
{/literal}