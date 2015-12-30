<?php

namespace EE\SlowPageLogger;

use EE\SlowPageLogger\SlowPageLogger as SPL;

class Output extends \EE_Output
{
    protected $settings = false;

    public $out_type = 'webpage';
    public $refresh_msg = true;         // TRUE/FALSE - whether to show the "You will be redirected in 5 seconds" message.
    public $refresh_time = 1;            // Number of seconds for redirects

    public $remove_unparsed_variables = false; // whether to remove left-over variables that had bad syntax

    // --------------------------------------------------------------------

    public function __construct(SPL $spl)
    {
        parent::__construct();
        $this->spl = $spl;
    }

    public function _display($output = '')
    {

        // normal Output Display
        parent::_display($output);

        $this->spl->run();
    }
}
