/**
 * This class  performs server queries for Machinery
 *
 * @author		German Dosko
 * @version		March 7, 2013
 */
var MachineryModel = function(){ };

/**
 * Saves a Machinery in the server
 *
 * @param		Machinery			machinery
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
MachineryModel.Save = function(machinery, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'machinery',
		action : 'save',
		params : machinery
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				uiFunction(data, callbackExtraParams);
			} else {
				console.error("Unable to parse server response.MachineryModel.Save()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};

/**
 * Retrieves a Machinery from the server and gives it to the callback function
 *
 * @param		int				machineryId
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
MachineryModel.FindById = function(machineryId, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'machinery',
		action : 'FindById',
		params : machineryId
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				var genericObject = JSON.parse(data);
				uiFunction(new Machinery(genericObject), callbackExtraParams);
			} else {
				console.error("Unable to parse server response.MachineryModel.FindById()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};

/**
 * Retrieves Machinerys from the server that matches the queryParams
 * filters and gives it to the callback function
 *
 * @param		object			queryParams
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
MachineryModel.FindBy = function(queryParams, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'machinery',
		action : 'FindBy',
		params : queryParams
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				var genericObjectsArray = JSON.parse(data);
				var machinerysArray = new Array();
				$.each(genericObjectsArray, function(index, genericObject){
					machinerysArray.push(new Machinery(genericObject));
				});
				uiFunction(machinerysArray, callbackExtraParams);
			} else {
				console.error("Unable to parse server response.MachineryModel.FindBy()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};

/**
 * Retrieves Machinerys from the server that matches the queryParams
 * filters and gives it to the callback function
 *
 * @param		object			queryParams
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
MachineryModel.FindByMultipleValues = function(queryParams, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'machinery',
		action : 'FindByMultipleValues',
		params : queryParams
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				var genericObjectsArray = JSON.parse(data);
				var machinerysArray = new Array();
				$.each(genericObjectsArray, function(index, genericObject){
					machinerysArray.push(new Machinery(genericObject));
				});
				uiFunction(machinerysArray, callbackExtraParams);
			} else {
				console.error("Unable to parse server response.MachineryModel.FindByMultipleValues()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};

/**
 * Retrieves Machinerys from the server that matches the queryParams
 * filters and gives it to the callback function
 *
 * @param		object			queryParams
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
MachineryModel.FindByPhotoProperties = function(queryParams, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'machinery',
		action : 'FindByPhotoProperties',
		params : queryParams
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				var genericObjectsArray = JSON.parse(data);
				var machinerysArray = new Array();
				$.each(genericObjectsArray, function(index, genericObject){
					machinerysArray.push(new Machinery(genericObject));
				});
				uiFunction(machinerysArray, callbackExtraParams);
			} else {
				console.error("Unable to parse server response.MachineryModel.FindByPhotoProperties()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};

/**
 * Retrieves all Machinerys from the server and gives it to the callback function
 *
 * @param		object			queryParams
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
MachineryModel.FetchAll = function(queryParams, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'machinery',
		action : 'FetchAll',
		params : queryParams
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				var genericObjectsArray = JSON.parse(data);
				var machinerysArray = new Array();
				$.each(genericObjectsArray, function(index, genericObject){
					machinerysArray.push(new Machinery(genericObject));
				});
				uiFunction(machinerysArray, callbackExtraParams);
			} else {
				console.error("Unable to parse server response.MachineryModel.FetchAll()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};

/**
 * Retrieves all Machinerys from the server that matches
 * the searchText and gives it to the callback function
 *
 * @param		object			queryParams
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
MachineryModel.Search = function(queryParams, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'machinery',
		action : 'Search',
		params : queryParams
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				var genericObjectsArray = JSON.parse(data);
				var machinerysArray = new Array();
				$.each(genericObjectsArray, function(index, genericObject){
					machinerysArray.push(new Machinery(genericObject));
				});
				uiFunction(machinerysArray, callbackExtraParams);
			} else {
				console.error("Unable to parse server response.MachineryModel.Search()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};/**
 * Retrieves the number of Machinery stored in the server
 *
 * @param		object			queryParams
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
MachineryModel.GetCount = function(queryParams, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'machinery',
		action : 'GetCount',
		params : queryParams
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				var machineryCount = parseInt(data.replace('"',''));
				uiFunction(machineryCount, callbackExtraParams);
			} else {
				console.error("Unable to parse server response.MachineryModel.GetCount()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};