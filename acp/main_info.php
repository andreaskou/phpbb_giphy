<?php

namespace andreask\giphyforphpbb\acp;

/**
 *
 */
class main_info
{

    public function module()
    {
        return [
            'filename'  =>  '\andreask\giphyforphpbb\main_module',
            'title'     =>  'ANDREASK_GIPHYFORPHPBB_ACP_MAIN_MODULE_TITLE',
            'modes'     =>  [
                'settings'  =>  [
                    'title' =>  'ANDREASK_GIPHYFORPHPBB_SETTINGS',
                    'auth'  =>  'ext_andreask/giphyforphpbb && acl_a_board',
                    'cat'   =>  ['ANDREASK_GIPHYFORPHPBB_ACP_MAIN_MODULE_TITLE'],
                ],
            ],
        ];
    }
}
