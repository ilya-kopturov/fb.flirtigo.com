{include file="site/dirtyflirting/login/menu.tpl"}

<table class="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td class="menu">
            {* MEMBER PAGE - RIGHT - *}
            <div style="width: 95%">
                <div class="redtitle" style="padding-left: 10px;">Cams</div>
                <div id="xtras">
                    <ul>
                        <li><a href="{$cfg.path.url_site}ajax_xtras_cams.php" title="Live Amateur Cams"><span>Live Amateur Cams</span></a></li>
                        <li><a href="{$cfg.path.url_site}ajax_xtras_cams_porn.php" title="Live PornStar Feeds"><span>Live PornStar Feeds</span></a></li>
                    </ul>
                </div>
            </div>
        </td>
    </tr>
</table>

<script type="text/javascript">
    {literal}
    $(document).ready(function() {
        var tabs = $('#xtras > ul').tabs({
            remote:true,
            spinner:''
        });
    });
    {/literal}
</script>