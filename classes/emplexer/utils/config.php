<?php


/**
* Class to handle all dune plugin_cookies
*/
class Config {

	// private const $pluginCookiesFile = '/config/emplexer_plugin_cookies.properties'
	private $pluginCookies;
	public static $instance;

	/**
	 * Read initial plugin cookies from /config dir
	 */
	private function __construct(){

	}

    public function __destruct(){

    }

	public static function getInstance() {
		if (!isset(self::$instance)){
			self::$instance =  new Config();
		}
		return self::$instance;
	}

	public function setPluginCookies(&$pluginCookies){
        $this->pluginCookies = $pluginCookies;


        if (!filter_var($pluginCookies->plexIp, FILTER_VALIDATE_IP)|| !filter_var($pluginCookies->plexPort, FILTER_VALIDATE_INT)){
            throw new DuneException(
                 _("Error: The emplexer is not configured, please, go to settings and add the ip and port."),
                0,
                ActionFactory::show_configuration_modal(_("Enter the ip and port for the plex media server"),
                    array(
                        GuiAction::handler_string_id => PLUGIN_HANDLE_USER_INPUT_ACTION_ID
                    )
                )
            );

        }
	}

	public function __get($key)
	{

		// //echo ("key = $key\n");
		if ($key === "pluginCookies") {
			//echo "retornando pluginCookies\n";
			return  $this->pluginCookies;
		}

		if (!isset($this->pluginCookies->{$key})){
			return null;
		}

		// print_r($this->pluginCookies);
		return $this->pluginCookies->{$key};
	}

	public function __set($key, $value){

		$this->pluginCookies->{$key} = $value;
	}

}


?>