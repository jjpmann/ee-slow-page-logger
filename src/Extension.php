<?php

namespace EE\SlowPageLogger;

use EE\Addons\Extension\BaseExtension;

class Extension extends BaseExtension
{

    public $name            = 'Slow Page Logger';
    public $version         = '0.0.4';
    public $description     = 'Logs page benchmarks.';
    public $settings_exist  = 'y';
    public $docs_url        = '';
    public $settings        = array();

    protected $settings_default = array(
        'execution_time'    => 1,
        'memory_usage'      => 20,
        'total_queries'     => 60
    );

    protected $hooks        = array(
        'sessions_end'      => 'sessions_end_hook',
    );


    /**
     * Settings
     *
     * This function returns the settings for the extensions
     *
     * @return settings array
     */
    public function settings()
    {
        $settings['execution_time'] = $this->settings_default['execution_time'];
        $settings['memory_usage']   = $this->settings_default['memory_usage'];
        $settings['total_queries']  = $this->settings_default['total_queries'];

        return $settings;
    }

    /**
     * hook
     */
    public function sessions_end_hook($sess)
    {
        //$this->overloadOutput();
    }


    /**
     * hook
     */
    public function overloadOutput()
    {
        require_once PATH_THIRD . '/vim_custom/libraries/Vim_Output.php';
        ee()->output = new Vim_Output;
        ee()->output->enableSlowPageLogger($this->settings);
    }
}
