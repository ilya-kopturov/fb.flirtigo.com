{* $Id: profile_picture.tpl 588 2008-06-20 18:21:48Z bogdan $ *}

<div class="redtitle" style="float:left">Add or Edit Pictures</div><div style="float:right"><a href="javascript:;" onclick="$('#profile > ul').tabs('load', 2)">[back to pictures]</a></div>
<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
<form id="frm_profile_picture" method="POST" enctype="multipart/form-data" >
    <div style="text-align:left;">
        <div style="float:left;margin-right:20px;">
            <div style="font-weight:bold">Preview</div>
            <div class="photo_container">
                {if $photo}
                <img id="photo_{$photo.id}" width="121" src="showphoto.php?{rnd_md5}&photo_id={$photo.id}&t=m">
                <div style="text-align:right"><a href="javascript:;" onclick="doDeletePicture('{$photo.id}')">[Delete]</a></div>
                {else}
                <img id="photo_{$photo.id}" src="{$cfg.path.url_photos}nophoto.jpg" width="121" height="121">
                {/if}
            </div>
        </div>
        <div style="float:left">

            <input type="hidden" name="photo_id" value="{$photo.id}">
            <div style="font-weight:bold">Title:</div>
            <div><input style="width:550px" class="required textfield" type="text" name="title" value="{$photo.photo_name|escape:'htmlall'}"></div>
            <div style="font-weight:bold">Description:</div>
            <div><textarea class="textfield" style="width:550px" name="description" rows="5">{$photo.photo_description|escape:'htmlall'}</textarea></div>
            <div style="font-weight:bold">File location:</div>
            <div id="flashUI">
                <!-- The UI only gets displayed if SWFUpload loads properly -->
                <div>
                    <input class="{if $photo}{else}required {/if}textfield" type="text" id="txtFileName" readonly style="width:450px;margin-right:5px; vertical-align: top;" /><div id="swfuploadButtonPlaceHolder"></div>
                </div>
                <input type="hidden" name="hidFileID" id="hidFileID" value="" /><!-- This is where the file ID is stored after SWFUpload uploads the file and gets the ID back from upload.php -->
            </div>
            <div id="degradedUI">
                <!-- This is the standard UI.  This UI is shown by default but when SWFUpload loads it will be
                hidden and the "flashUI" will be shown -->
                <input type="file" name="resume_degraded" id="resume_degraded" /><br/>
            </div>
            <div>
                <span style="font-weight:bold">Show Picture in:</span>
                {if $photo}
                {html_options name=gallery options=$galleries selected=$photo.gallery}
                {else}
                {html_options name=gallery options=$galleries selected="1"}
                {/if}
            </div>
            <div><img src="{$cfg.image.pixel}" height="10"></div>


        </div>
        <div class="flash" id="fsUploadProgress" style="clear:left;">
            <!-- This is where the file progress gets shown.  SWFUpload doesn't update the UI directly.
                The Handlers (in handlers.js) process the upload events and make the UI updates -->
        </div>
        <div><img src="{$cfg.image.pixel}" height="20"></div>
        <div style="text-align: left;"><input type="submit" value="{if $photo}SUBMIT{else}Upload Picture{/if}" id="btnUpload"></div>
        <div style="font-size:11px;text-align:left;">
            <div><p>By uploading content to your profile you agree to the following:</p>
            <ul class="f_none">
                <li class="f_none">Only images of yourself and your partner (if applicable) are allowed.</li>
                <li class="f_none">If you upload sexually explicit content you agree to comply with <a href="javascript:;" onclick="$('#profile_pictures').load('{$cfg.path.url_site}2257.php?tabname=picture&{rnd_md5}');">the additonal terms stated here</a></li>
                <li class="f_none">No images of animals, anyone appearing under 18 or other items other than the person(s) featured in the profile. No images of acts such as torture or pain.</li>
                <li class="f_none">No contact details to be included in any images.</li>
                <li class="f_none">Don't upload single images bigger than 1MB</li>
                <li class="f_none"><STRONG>GUYS: No Pics of your ugly stick on its own. If it takes up more than 20% of the picture, take another. If you are worried about showing your face or more than your stick, use the private gallery function above.</strong></li>
            </ul>
            </div>
        </div>
    </div>
    
</form>
{literal}
<script type="text/javascript">
    function doDeletePicture(id) {
        $.ajax({
            type: "POST",
            url: {/literal}'{$cfg.path.url_site}ajax_profile_picture.php?{rnd_md5}&u=d'{literal},
            data: "photo_id=" + id,
            success: function(result) {
                if (parseInt(result) > 0) {
                    $('input[name="photo_id"]').attr('value', 0);
                    $('#photo_' + id).replaceWith('<img id="photo_' + id + '" src="{/literal}{$cfg.path.url_photos}{literal}nophoto.jpg" width="121" height="121">');
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
        upload_url: "../swfupload.php",	// Relative to the SWF file, you can use an absolute URL as well.
        file_post_name: "uploaded_file",

        // Flash file settings
        file_size_limit : "5120",	// 5 MB
        file_types : "*.jpg;*.gif;*.png",	// or you could use something like: "*.doc;*.wpd;*.pdf",
        file_types_description : "All Image Files",
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

    function doSubmit(e) {
        e = e || window.event;
        if (e.stopPropagation) e.stopPropagation();
        e.cancelBubble = true;

        try {
            if (!$("#frm_profile_picture").validate().form()) throw new Exception('Invalid form');

            var is_update = '{/literal}{$photo.id}{literal}';
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
            $('#frm_profile_picture').ajaxSubmit({
                url: {/literal}'{$cfg.path.url_site}ajax_profile_picture.php?u=t'{literal},
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
        $("#frm_profile_picture").bind("invalid-form.validate", function(e, validator) {
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