/**
 * This class represents a Estate
 *
 * @author		German Dosko
 * @version		March 7, 2013
 */
var Estate = function(genericObj) {

	/**
	 * @var		Number
	 */
	var _id = 0;

	/**
	 * @var		Type
	 */
	var _type = new Type();

	/**
	 * @var		Photo
	 */
	var _photo = new Photo();

	/**
	 * @var		String
	 */
	var _date = '';

	/**
	 * @var		String
	 */
	var _description = '';

	/**
	 * @var		String
	 */
	var _title = '';

	/**
	 * @var		Boolean
	 */
	var _active = false;

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
					case 'TYPE':
						_setType(value);
						break;
					case 'PHOTO':
						_setPhoto(value);
						break;
					case 'DATE':
						_setDate(value);
						break;
					case 'DESCRIPTION':
						_setDescription(value);
						break;
					case 'TITLE':
						_setTitle(value);
						break;
					case 'ACTIVE':
						_setActive(value);
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
	 * @param		Type		type
	 */
	var _setType = function(type){
		if(Validator.IsInstanceOf('Object', type)){
			_type = new Type(type);
		} else {
			console.error('Function expects an object as param. ( Estate.setType )');
		}
	};

	/**
	 * @param		Photo		photo
	 */
	var _setPhoto = function(photo){
		if(Validator.IsInstanceOf('Object', photo)){
			_photo = new Photo(photo);
		} else {
			console.error('Function expects an object as param. ( Estate.setPhoto )');
		}
	};

	/**
	 * @param		String		date
	 */
	var _setDate = function(date){
		_date = String(date);
	};

	/**
	 * @param		String		description
	 */
	var _setDescription = function(description){
		_description = String(description);
	};

	/**
	 * @param		String		title
	 */
	var _setTitle = function(title){
		_title = String(title);
	};

	/**
	 * @param		Boolean		active
	 */
	var _setActive = function(active){
		_active = Boolean(active);
	};

	/**
	 * @return		Number
	 */
	var _getId = function(){
		return _id;
	};

	/**
	 * @return		Type
	 */
	var _getType = function(){
		return _type;
	};

	/**
	 * @return		Photo
	 */
	var _getPhoto = function(){
		return _photo;
	};

	/**
	 * @return		String
	 */
	var _getDate = function(){
		return _date;
	};

	/**
	 * @return		String
	 */
	var _getDescription = function(){
		return _description;
	};

	/**
	 * @return		String
	 */
	var _getTitle = function(){
		return _title;
	};

	/**
	 * @return		Boolean
	 */
	var _getActive = function(){
		return _active;
	};

	/**
	 * @return		JSON
	 */
	var _convertToArray = function(){
		return {
				"id":_id,
				"type":_type,
				"photo":_photo,
				"date":_date,
				"description":_description,
				"title":_title,
				"active":_active
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
		 * @param		Type		type
		 */
		setType : function(type){
			_setType(type);
		},

		/**
		 * @param		Photo		photo
		 */
		setPhoto : function(photo){
			_setPhoto(photo);
		},

		/**
		 * @param		String		date
		 */
		setDate : function(date){
			_setDate(date);
		},

		/**
		 * @param		String		description
		 */
		setDescription : function(description){
			_setDescription(description);
		},

		/**
		 * @param		String		title
		 */
		setTitle : function(title){
			_setTitle(title);
		},

		/**
		 * @param		Boolean		active
		 */
		setActive : function(active){
			_setActive(active);
		},

		/**
		 * @return		Number
		 */
		getId : function(){
			return _getId();
		},

		/**
		 * @return		Type
		 */
		getType : function(){
			return _getType();
		},

		/**
		 * @return		Photo
		 */
		getPhoto : function(){
			return _getPhoto();
		},

		/**
		 * @return		String
		 */
		getDate : function(){
			return _getDate();
		},

		/**
		 * @return		String
		 */
		getDescription : function(){
			return _getDescription();
		},

		/**
		 * @return		String
		 */
		getTitle : function(){
			return _getTitle();
		},

		/**
		 * @return		Boolean
		 */
		getActive : function(){
			return _getActive();
		},

		/**
		 * @return		JSON
		 */
		convertToArray : function(){
			return _convertToArray();
		}
	};
};