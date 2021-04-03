<?php

namespace andreask\giphyforphpbb\migrations;

/**
 *
 */
class add_modules extends \phpbb\db\migration\migration
{

    static public function depends_on()
    {
        return ['\phpbb\db\migration\data\v31x\v314'];
    }

    public function update_data()
    {
        return [
            // ['config.add', ['andreask_giphyforphpbb_dev_code', 0]],

            ['module.add', [
                'acp',
                'ACP_CAT_DOT_MODS',
                'ANDREASK_GIPHYFORPHPBB_ACP_MAIN_MODULE_TITLE'
            ]],

            ['module.add', [
                'acp',
                'ANDREASK_GIPHYFORPHPBB_ACP_MAIN_MODULE_TITLE',
                [
                    'module_basename'   =>  '\andreask\giphyforphpbb\acp\main_module',
                    'modes'             =>  ['settings'],
                ],
            ]],
        ];
    }
}
