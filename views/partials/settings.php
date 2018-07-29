<?php

/**
 * @file
 * Logger settings entry view.
 */
?>

<div>
    <div class="uk-panel uk-panel-space uk-panel-box uk-panel-card">

        <img src="@url('assets:app/media/icons/email.svg')" width="50" height="50" alt="@lang('Email on Save')" />

        <div class="uk-text-truncate uk-margin">
            @lang('Email on Save')
        </div>
        <a class="uk-position-cover" href="@route('/settings/email-on-save')"></a>
    </div>
</div>
