<?
define("IN_MAINSITE", TRUE);

include ("includes/require/site_head.php");
?>
<!-- These are sample configuration properties... however, you may wish to add more! Please add as many configuration properties as you reasonably can -->
<config>
	<AUTO_START>true</AUTO_START>
	<AUTORESIZE>true</AUTORESIZE>

	<!-- time in seconds -->
	<BUFFER_TIME>3</BUFFER_TIME>

	<!-- options: Off, On -->
	<CONTROLS>On</CONTROLS>

	<LABEL_ON_START_CLICK>Press start to play</LABEL_ON_START_CLICK>
	<LOOPING>true</LOOPING>

	<VIDEO_FILE_PATH>videofeed.php?type=new</VIDEO_FILE_PATH>
	<VIDEOS_PATH><?= $cfg['path']['url_site'] ?></VIDEOS_PATH>
	<VIDEOS_URL></VIDEOS_URL>

	<CURRENT_VIDEO_FILE_PATH>./</CURRENT_VIDEO_FILE_PATH>

	<CURRENT_VIDEO_FILE_TITLE>Some title</CURRENT_VIDEO_FILE_TITLE>
	<CURRENT_VIDEO_FILE_RUNTIME>auto</CURRENT_VIDEO_FILE_RUNTIME>
	<PHP_PATH>./</PHP_PATH>

	<!-- number 0-100 -->
	<VOLUME>50</VOLUME>
	<skin_color>0x550000</skin_color>

	<speaker_icon>0x313131</speaker_icon>
	<time_color>0x000000</time_color>
	<video_bar_back_color>0x474747</video_bar_back_color>
	<video_bar_loading_color>0xB62A2A</video_bar_loading_color>
	<video_bar_progress_color>0xf21515</video_bar_progress_color>
	<volume_bar_back_color>0x313131</volume_bar_back_color>

	<volume_bar_progress_color>0x313131</volume_bar_progress_color>

	<!-- DISABLED. PLEASE PURCHASE REBRANDING SERVICE. options: Up Left, Down Left, Up Right, Down Right -->
	<LOGO_APPEARANCE>Up Left</LOGO_APPEARANCE>
	<LOGO_CLICK_URL>http://dev.flirtigo.com</LOGO_CLICK_URL>

	<!-- DISABLED. PLEASE PURCHASE REBRANDING SERVICE. relative path to a non-progressive JPG image -->
	<LOGO_PATH>logo.jpg</LOGO_PATH>
	<SHOW_LOGO>true</SHOW_LOGO>

	<visible>true</visible>
	<minHeight>150</minHeight>
	<minWidth>200</minWidth>

	<!-- number 0-100 -->
	<LOGO_ALPHA>40</LOGO_ALPHA>
	<VIDEO_ALPHA>100</VIDEO_ALPHA>


	<!-- options: _self, _blank, _parent, _top -->
	<LOGO_CLICK_URL_TARGET>_blank</LOGO_CLICK_URL_TARGET>

	<!-- number 0-100 -->
	<videoBrightness>50</videoBrightness>

	<!-- options: Up, Down -->
	<CONTROLS_LAYOUT>Down</CONTROLS_LAYOUT>

	<!-- work only if LOOPING == false. options: true, false -->

	<auto_reset_playhead>false</auto_reset_playhead>
	<video_back_color>0x000000</video_back_color>
	<panel_back_color>0x9F9F9F</panel_back_color>

	<!-- number 0-100 -->
	<panel_back_alpha>30</panel_back_alpha>

	<!-- rate_video.php uses next 3 nodes  -->
	<share_from_mail>service@yourdomain.com</share_from_mail>

	<share_from_name>Your_Domain Service</share_from_name>
	<share_text>
		<![CDATA[
	<H2>YouDomain<sup>TM</sup> - Broadcast Yourself</H2>
	<HR SIZE=1 WIDTH=90% ALIGN=left>
	<B>I want to share the following video with you:</B>
	<BR>
	<a href="http://www.yourdomain.com/index.php?video=##VIDEO_NAME##">VIDEO LINK</A>
	<br>
	<B>Personal Message</B>
	<BR>
	#PERS_MESSAGE#
	<BR>
	Thanks,<BR>
	##FIRST_NAME##
	<HR SIZE=1 WIDTH=90% ALIGN=left>
	<font color="#BFBFBF">Copyright 2007 Dirty Flirting, Inc.</font>
	]]>
	</share_text>
</config>