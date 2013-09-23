
<?php
// load Smarty library
require('Smarty.class.php');

// The setup.php file is a good place to load
// required application library files, and you
// can do that right here. An example:
// require('guestbook/guestbook.lib.php');

class Yecol_Smarty extends Smarty {

   function __construct()
   {
        // Class Constructor.
        // These automatically get set with each new instance.
        parent::__construct();

        $this->setCaching(Smarty::CACHING_LIFETIME_CURRENT);
        $this->setCacheLifetime(3600);

        $this->setTemplateDir('../inc/templates/');
        $this->setCompileDir('../inc/templates_c/');
        $this->setConfigDir('../inc/configs/');
        $this->setCacheDir('../inc/cache/');

        $this->assign('app_name', 'Yecols.cn');
   }
}

?>