//improved honeypot
$honeypot = FALSE;
if (!empty($_REQUEST['contact_me_by_fax_only']) && (bool) $_REQUEST['contact_me_by_fax_only'] == TRUE) {
    $honeypot = TRUE;
    log_spambot($_REQUEST);
    # treat as spambot
} else {
    # process as normal
}





<div class="input_field">
    <input type="checkbox" name="contact_me_by_fax_only" value="1" style="display:none !important" tabindex="-1" autocomplete="off">
</div>