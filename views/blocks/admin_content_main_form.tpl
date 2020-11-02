[{$smarty.block.parent}]

<tr>
    <td class="edittext">
        SEO-URL disabled?
    </td>
    <td class="edittext">
        <input class="edittext" type="hidden" name="editval[oxcontents__pccmssnippets_disable]" value='0'>
        <input class="edittext" type="checkbox" name="editval[oxcontents__pccmssnippets_disable]" value='1'
               [{if $edit->oxcontents__pscmssnippets_disable->value == 1}]checked[{/if}] [{ $readonly }]>
        [{ oxinputhelp ident="HELP_ARTICLE_EXTEND_ISSEARCH" }]
    </td>
</tr>
