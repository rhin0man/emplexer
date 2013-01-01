<?php 

class EmplexerMovieList extends  EmplexerVideoList
{
	
	const ID='emplexer_movie_list';

	function __construct()
	{
		parent::__construct(self::ID, $this->get_folder_views());
	}



	public static function get_media_url_str($key, $filter_name =null, $type='movie')
	{
		hd_print("key: $key" );
		
		self::$type = $type;

		return MediaURL::encode(
			array
			(
				'screen_id'      => self::ID,
				'key'  			 => $key,
				'category_id'  	 => $key,
				'filter_name'  	 => $filter_name,
				'type'			 => $type
				)
			);
	}

	public  function get_folder_views()
	{
		return EmplexerConfig::GET_VIDEOS_LIST_VIEW();
	}

	public function getDetailedInfo(SimpleXMLElement &$node){
		$info = (string)$node->attributes()->title;
		// 'Serie:' . (string)$c->attributes()->grandparentTitle . ' || ' .
		// 'Episode Name :' . (string)$c->attributes()->title. ' || ' .
		// 'EP:'  . 'S'.(string)$c->attributes()->parentIndex . 'E'. (string)$c->attributes()->index . '||' .
		// 'summary:'. str_replace('"', '' , (string)$c->attributes()->summary);

		return $info;

	}
}


?>