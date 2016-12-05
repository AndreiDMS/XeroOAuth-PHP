<?php
/**
 * 
 */
class Xero extends XeroOAuth 
{
    const CONFIG_PATH = 'lib/Xero/config.php';
    
    function __construct()
    {
        $signatures = require(self::CONFIG_PATH);
        
        parent::__construct(array_merge(array(
            		'application_type' => XRO_APP_TYPE,
            		'oauth_callback' => OAUTH_CALLBACK,
            		'user_agent' => XRO_USERAGENT 
                    ), $signatures));
        
        
        $initialCheck = $this->diagnostics();
        
        $checkErrors = count($initialCheck);
        
        if ($checkErrors > 0) {
            foreach ($initialCheck as $check)
            {
                echo 'Error: ' . $check . PHP_EOL;
            }
        }
        else
        {
            $this->config['access_token'] = $this->config['consumer_key'];
            $this->config['access_token_secret'] = $this->config['shared_secret'];
        }
        
    }
    
    /**
     * 
     * @param string $method
     * @param string $url
     * @param array $params
     * @param string $data
     * @param string $format
     */
    function request($method, $url, $params = array(), $data = "", $format = 'json')
    {
        return parent::request($method, $url, $params = array(), $data, $format);
    }
}