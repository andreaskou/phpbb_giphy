<?php

namespace andreask\giphyforphpbb\acp;

/**
 *
 */
class main_module
{
    public $u_action;
    public $tpl_name;
    public $page_title;

    public function main($id, $mode)
    {
        global $language, $template, $request, $config;

        $this->tpl_name = 'acp_giphyforphpbb_settings';
        $this->page_title = $language->lang('ACP_GIPHYFORPHPBB_SETTINGS_TITLE');
	$language->add_lang('settings', 'andreask/giphyforphpbb');

        add_form_key('andreask_giphyforphpbb');

        if ($request->is_set_post('submit'))
        {
            if (!check_form_key('andreask_giphyforphpbb'))
            {
                trigger_error('FORM_INVALID');
            }
            // save setting
        }

        $template->assign_vars([
            'ANDREASK_GIPHYFORPHPBB_DEV_CODE'   => $config['giphyforphpbb_dev_code'],
            'U_ACTION'                          => $this->u_action
        ]);

    }
}
