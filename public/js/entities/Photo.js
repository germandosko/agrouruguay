/**
 * This class represents a Photo
 *
 * @author		German Dosko
 * @version		March 7, 2013
 */
var Photo = function(genericObj) {

	/**
	 * @var		Number
	 */
	var _id = 0;

	/**
	 * @var		String
	 */
	var _alt = '';

	/**
	 * @var		String
	 */
	var _thumbnail = '';

	/**
	 * @var		String
	 */
	var _url = '';

	/**
	 * Constructor
	 */
	var init = function() {
		if(Validator.IsInstanceOf('Object', genericObj)){
			$.each(genericObj, function(property, value){
				switch (property.toUpperCase()) {
					case 'ID':
						_setId(value);
						break;
					case 'ALT':
						_setAlt(value);
						break;
					case 'THUMBNAIL':
						_setThumbnail(value);
						break;
					case 'URL':
						_setUrl(value);
						break;
				}
			});
		}
	};

	/**
	 * @param		Number		id
	 */
	var _setId = function(id){
		_id = Number(id);
	};

	/**
	 * @param		String		alt
	 */
	var _setAlt = function(alt){
		_alt = String(alt);
	};

	/**
	 * @param		String		thumbnail
	 */
	var _setThumbnail = function(thumbnail){
		_thumbnail = String(thumbnail);
	};

	/**
	 * @param		String		url
	 */
	var _setUrl = function(url){
		_url = String(url);
	};

	/**
	 * @return		Number
	 */
	var _getId = function(){
		return _id;
	};

	/**
	 * @return		String
	 */
	var _getAlt = function(){
		return _alt;
	};

	/**
	 * @return		String
	 */
	var _getThumbnail = function(){
		return _thumbnail;
	};

	/**
	 * @return		String
	 */
	var _getUrl = function(){
		return _url;
	};

	/**
	 * @return		JSON
	 */
	var _convertToArray = function(){
		return {
				"id":_id,
				"alt":_alt,
				"thumbnail":_thumbnail,
				"url":_url
			};
	};

	/**
	 * Executes constructor
	 */
	init();

	/**
	 * Returns public functions
	 */
	return{

		/**
		 * @param		Number		id
		 */
		setId : function(id){
			_setId(id);
		},

		/**
		 * @param		String		alt
		 */
		setAlt : function(alt){
			_setAlt(alt);
		},

		/**
		 * @param		String		thumbnail
		 */
		setThumbnail : function(thumbnail){
			_setThumbnail(thumbnail);
		},

		/**
		 * @param		String		url
		 */
		setUrl : function(url){
			_setUrl(url);
		},

		/**
		 * @return		Number
		 */
		getId : function(){
			return _getId();
		},

		/**
		 * @return		String
		 */
		getAlt : function(){
			return _getAlt();
		},

		/**
		 * @return		String
		 */
		getThumbnail : function(){
			return _getThumbnail();
		},

		/**
		 * @return		String
		 */
		getUrl : function(){
			return _getUrl();
		},

		/**
		 * @return		JSON
		 */
		convertToArray : function(){
			return _convertToArray();
		}
	};
};