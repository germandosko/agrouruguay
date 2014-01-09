/**
 * This class  performs server queries for Estate
 *
 * @author		German Dosko
 * @version		March 7, 2013
 */
var EstateModel = function(){ };

/**
 * Saves a Estate in the server
 *
 * @param		Estate			estate
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
EstateModel.Save = function(estate, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'estate',
		action : 'save',
		params : estate
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				uiFunction(data, callbackExtraParams);
			} else {
				console.error("Unable to parse server response.EstateModel.Save()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};

/**
 * Retrieves a Estate from the server and gives it to the callback function
 *
 * @param		int				estateId
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
EstateModel.FindById = function(estateId, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'estate',
		action : 'FindById',
		params : estateId
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				var genericObject = JSON.parse(data);
				uiFunction(new Estate(genericObject), callbackExtraParams);
			} else {
				console.error("Unable to parse server response.EstateModel.FindById()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};

/**
 * Retrieves Estates from the server that matches the queryParams
 * filters and gives it to the callback function
 *
 * @param		object			queryParams
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
EstateModel.FindBy = function(queryParams, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'estate',
		action : 'FindBy',
		params : queryParams
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				var genericObjectsArray = JSON.parse(data);
				var estatesArray = new Array();
				$.each(genericObjectsArray, function(index, genericObject){
					estatesArray.push(new Estate(genericObject));
				});
				uiFunction(estatesArray, callbackExtraParams);
			} else {
				console.error("Unable to parse server response.EstateModel.FindBy()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};

/**
 * Retrieves Estates from the server that matches the queryParams
 * filters and gives it to the callback function
 *
 * @param		object			queryParams
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
EstateModel.FindByMultipleValues = function(queryParams, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'estate',
		action : 'FindByMultipleValues',
		params : queryParams
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				var genericObjectsArray = JSON.parse(data);
				var estatesArray = new Array();
				$.each(genericObjectsArray, function(index, genericObject){
					estatesArray.push(new Estate(genericObject));
				});
				uiFunction(estatesArray, callbackExtraParams);
			} else {
				console.error("Unable to parse server response.EstateModel.FindByMultipleValues()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};

/**
 * Retrieves Estates from the server that matches the queryParams
 * filters and gives it to the callback function
 *
 * @param		object			queryParams
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
EstateModel.FindByTypeProperties = function(queryParams, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'estate',
		action : 'FindByTypeProperties',
		params : queryParams
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				var genericObjectsArray = JSON.parse(data);
				var estatesArray = new Array();
				$.each(genericObjectsArray, function(index, genericObject){
					estatesArray.push(new Estate(genericObject));
				});
				uiFunction(estatesArray, callbackExtraParams);
			} else {
				console.error("Unable to parse server response.EstateModel.FindByTypeProperties()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};

/**
 * Retrieves Estates from the server that matches the queryParams
 * filters and gives it to the callback function
 *
 * @param		object			queryParams
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
EstateModel.FindByPhotoProperties = function(queryParams, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'estate',
		action : 'FindByPhotoProperties',
		params : queryParams
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				var genericObjectsArray = JSON.parse(data);
				var estatesArray = new Array();
				$.each(genericObjectsArray, function(index, genericObject){
					estatesArray.push(new Estate(genericObject));
				});
				uiFunction(estatesArray, callbackExtraParams);
			} else {
				console.error("Unable to parse server response.EstateModel.FindByPhotoProperties()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};

/**
 * Retrieves all Estates from the server and gives it to the callback function
 *
 * @param		object			queryParams
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
EstateModel.FetchAll = function(queryParams, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'estate',
		action : 'FetchAll',
		params : queryParams
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				var genericObjectsArray = JSON.parse(data);
				var estatesArray = new Array();
				$.each(genericObjectsArray, function(index, genericObject){
					estatesArray.push(new Estate(genericObject));
				});
				uiFunction(estatesArray, callbackExtraParams);
			} else {
				console.error("Unable to parse server response.EstateModel.FetchAll()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};

/**
 * Retrieves all Estates from the server that matches
 * the searchText and gives it to the callback function
 *
 * @param		object			queryParams
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
EstateModel.Search = function(queryParams, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'estate',
		action : 'Search',
		params : queryParams
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				var genericObjectsArray = JSON.parse(data);
				var estatesArray = new Array();
				$.each(genericObjectsArray, function(index, genericObject){
					estatesArray.push(new Estate(genericObject));
				});
				uiFunction(estatesArray, callbackExtraParams);
			} else {
				console.error("Unable to parse server response.EstateModel.Search()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};/**
 * Retrieves the number of Estate stored in the server
 *
 * @param		object			queryParams
 * @param		function		uiFunction
 * @param		object			uiExtraParams
 * @static
 */
EstateModel.GetCount = function(queryParams, uiFunction, uiExtraParams){
	var ajaxParams = {
		obj : 'estate',
		action : 'GetCount',
		params : queryParams
	};
	var callbackFunction = function(data, callbackExtraParams){
			if(data){
				var estateCount = parseInt(data.replace('"',''));
				uiFunction(estateCount, callbackExtraParams);
			} else {
				console.error("Unable to parse server response.EstateModel.GetCount()");
			}
		};
	Ajax.Perform(ajaxParams, callbackFunction, uiExtraParams);
};