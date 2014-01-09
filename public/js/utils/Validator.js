/**
 * @author Web Design Rosario
 * @version Feb 15 2012
 * 
 * This class controlls general validations functions.
 */
var Validator = function() { };

/**
 * Detect too old browsers.
 * 
 * @returns bool
 * @type	static
 */
Validator.isOldBrowser = function(){
	if($.browser.msie && $.browser.version < 7){
		return true;
	}
	return false;
};

/**
 * Returns true if the string has only numeric digits
 * 
 * @param 		string 		str
 * @returns 	bool
 * @type 		static
 */
Validator.IsNumeric = function (str) {
	if(str.length == 0){
		return false;
	}
	for (i=0; i < str.length; i++){
		var isNumeric = (str.charCodeAt(i) > 47) && (str.charCodeAt(i) < 58);
		if(!isNumeric){
			return false;
		}
	}
	return true;
}

/**
 * Returns true if the string has only alphabetic chars
 * 
 * @param 		string 		str
 * @returns 	bool
 * @type 		static
 * @see			http://aag-auguri.com/help/ansicharactercodes.html
 */
Validator.IsAlpha = function (str) {
	if(str.length == 0){
		return false;
	}
	for (i=0; i < str.length; i++){
		var isAlpha = ((str.charCodeAt(i) > 64) && (str.charCodeAt(i) < 91)) ||
			((str.charCodeAt(i) > 96) && (str.charCodeAt(i) < 123));
		var isEspecialChar = (str.charCodeAt(i) == 193) || (str.charCodeAt(i) == 201) ||
			(str.charCodeAt(i) == 205) || (str.charCodeAt(i) == 209) || (str.charCodeAt(i) == 211) ||
			(str.charCodeAt(i) == 218) || (str.charCodeAt(i) == 220) || (str.charCodeAt(i) == 225) ||
			(str.charCodeAt(i) == 233) || (str.charCodeAt(i) == 237) || (str.charCodeAt(i) == 241) ||
			(str.charCodeAt(i) == 243) || (str.charCodeAt(i) == 250) || (str.charCodeAt(i) == 252);
		if(!isAlpha && !isEspecialChar){
			return false;
		}
	}
	return true;
}

/**
 * Returns true if the string has only telephone valid characters
 * 
 * @param 		string 		str
 * @returns 	bool
 * @type 		static
 */
Validator.IsTelephone = function (str) {
	if(str.length == 0){
		return false;
	}
	for (i=0; i < str.length; i++){
		var isValid = ((str.charCodeAt(i) > 47) && (str.charCodeAt(i) < 58)) ||
			(str.charCodeAt(i) == 32) || (str.charCodeAt(i) == 40) || (str.charCodeAt(i) == 41) ||
			(str.charCodeAt(i) == 43) || (str.charCodeAt(i) == 45);
		if(!isValid){
			return false;
		}
	}
	return true;
}

/**
 * Returns true if the element isn't empty and match the type
 * 
 * @param string type
 * @param mixed element
 * @returns bool
 * @type static
 */
Validator.IsInstanceOf = function (type, element) {
	var isEmptyType = (type == null) || (type == undefined) || (type == '');
	var isValid = (element != null) && (element != undefined);
	if(!isEmptyType){
		if(isValid){
			var expectedType = type.toUpperCase();
			var elementType = Common.GetType(element).toUpperCase();
			switch(elementType){
				case 'ARRAY':
					isValid = (element.length > 0) && (expectedType == 'ARRAY');
					break;
				case 'STRING':
					isValid = (element != '') && (expectedType == 'STRING');
					break;
				case 'OBJECT':
					isValid = (Object.keys(element).length > 0) && (expectedType == 'OBJECT');
					break;
				case 'BOOLEAN':
					isValid = (expectedType == 'BOOLEAN') || (expectedType == 'BOOL');
					break;
				case 'FUNCTION':
					isValid = (expectedType == 'FUNCTION');
					break;
				case 'NUMBER':
					isValid = (expectedType == 'NUMBER') ||
							(expectedType == 'INTEGER') ||
							(expectedType == 'INT') ||
							(expectedType == 'FLOAT') ||
							(expectedType == 'DECIMAL');
					break;
				case 'DATE':
					isValid = (expectedType == 'DATE');
					break;
				default:
					throw("Can't recognize element type");
			}
		}
	} else {
		console.error("Can't recognize expected type");
		isValid = false;
	}
	return isValid;
};