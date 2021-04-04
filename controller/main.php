<?php

use \Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class main
{
    /* @var \phpbb\config\config */
   protected $config;

   /* @var \phpbb\controller\helper */
   protected $helper;

   /* @var \phpbb\template\template */
   protected $template;

   /* @var \phpbb\user */
   protected $user;

   /**
    * Constructor
    *
    * @param \phpbb\config\config      $config
    * @param \phpbb\controller\helper  $helper
    * @param \phpbb\template\template  $template
    * @param \phpbb\user               $user
    * @param \phpbb\$language          $language
    */

    public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user, \phpbb\language\ $language)
    {
        $this->config   = $config;
        $this->helper   = $helper;
        $this->template = $template;
        $this->user     = $user;
        $this->language = $language
    }

    public function handle()
    {
        $this->language->add_lang('searchgiphy', 'andreask/giphyforphpbb');
        $this->template->assign_var('TESTING',array('one', 'two');
        echo "kourades";
        return $this->helper->render('posting_topic_custom_panel.html');
    }
}
