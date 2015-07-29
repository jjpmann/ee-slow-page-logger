<?php  

namespace EE\SlowPageLogger;

use EE\SlowPageLogger\SlowPageLogger as SPL;

class Output extends \EE_Output
{

    protected $settings = false;

    var $out_type       = 'webpage';
    var $refresh_msg    = TRUE;         // TRUE/FALSE - whether to show the "You will be redirected in 5 seconds" message.
    var $refresh_time   = 1;            // Number of seconds for redirects

    var $remove_unparsed_variables = FALSE; // whether to remove left-over variables that had bad syntax

    // --------------------------------------------------------------------

    public function __construct(SPL $spl)
    {
        parent::__construct();
        $this->spl = $spl;
    }

    function _display($output = '')
    {

        // normal Output Display
        parent::_display($output);

        $this->spl->run();
        
    }

}
