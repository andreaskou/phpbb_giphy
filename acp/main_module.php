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
        global $language, $template, $request, $config, $phpbb_container;

        $config_text = $phpbb_container->get('config_text');
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
            echo "<pre>";
            var_dump($request);
            var_dump($request->variable('andreask_giphyforphpbb_dev_key', 0));
            echo "</pre>";
            // $config_text->set('andreask_giphyforphpbb_dev_key', $request->variable('andreask_giphyforphpbb_dev_key', 0));
            // trigger_error($language->lang('CONFIG_UPDATED') . adm_back_link($this->u_action));
        }

        $template->assign_vars([
            'GIPHYFORPHPBB_DEV_KEY'   => $config_text->get('andreask_giphyforphpbb_dev_key'),
            'U_ACTION'                          => $this->u_action
        ]);

    }
}
