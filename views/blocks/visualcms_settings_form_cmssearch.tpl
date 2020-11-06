[{$smarty.block.parent}]

<div class="form-group">

    <div class="">
        <input type="hidden" name="editval[oxcontents__pccmssnippets_disable]" value="0"/>
        <input type="checkbox" name="editval[oxcontents__pccmssnippets_disable]" id="elm_edit_pccmssnippets_disable"
               value="1"/>
        SEO-URL disabled (pcCmsSnippets)
    </div>

</div>

[{capture name="pcJsData"}]
    var inp = $('#elm_edit_ident');
    val = saved = inp.val();
    tid = setInterval(function() {
        val = inp.val();
        if ( saved != val ) {
            var sURI = "[{$oViewConf->getSelfLink()}]" + "&cl=content&fnc=getPcCmsSnippetsStatus" + "&oxloadid=" + val;
            sURI = sURI.replace(/&amp;/g, '&');
            $.ajax({
                url: sURI,
                type: "GET",
                success: function (data) {
                    if(data == 1) {
                        $('#elm_edit_pccmssnippets_disable').prop('checked', 'checked');
                    } else {
                        $('#elm_edit_pccmssnippets_disable').prop('checked', '');
                    }
                }
            })
            saved = val;
        }
    },50);
[{/capture}]
[{oxscript add=$smarty.capture.pcJsData priority=100}]
