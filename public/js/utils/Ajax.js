/**
 * @author Web Design Rosario
 * @version Mar 10 2012
 * 
 * This class handle ajax request with jQuery.
 */
var Ajax = function() { };

/**
 * URL of server ajax listener
 */
Ajax.Url = "/Triggers/AjaxTrigger.php";

/**
 * Http GET method identifier
 */
Ajax.HttpGet = "GET";

/**
 * Http POST method identifier
 */
Ajax.HttpPost = "POST";

Ajax.LoadingDialog = null;

/**
 * Performs an ajax request, with given params.
 * 
 * @param	mixed 		params
 * @param	function	callbackFunction
 * @param	mixed		callbackExtraParams
 * @param	string 		url
 * @param	string		method
 * @type	static
 */
Ajax.Perform = function (params, callbackFunction, callbackExtraParams, url, method) {	
	if(url == undefined){
		url = Ajax.Url;
	}
	if(method == undefined){
		method = Ajax.HttpPost;
	}
	Ajax.LoadingMessageOn();
	try {
		if(method == Ajax.HttpPost){					
			$.post(url, params, function(data){				
				if(data == 'false'){
					throw 'Exception throwed, please read the log file.';
				}
				if(callbackExtraParams == undefined){
					callbackFunction(data);
				} else {
					callbackFunction(data, callbackExtraParams);
				}
			});
		} else {				
			$.get(url, params, function(data){
					if(data == 'false'){
					throw 'Exception throwed, please read the log file.';
				}
				if(callbackExtraParams == undefined){
					callbackFunction(data);
				} else {
					callbackFunction(data, callbackExtraParams);
				}
			});
		}
		Ajax.LoadingMessageOff();
	} catch (e) {
		Ajax.LoadingMessageOff();
		console.error('Exception at Ajax.Perform');
		console.error(e);
	}
};

/**
 * Shows a modal dialog with the "Data loading" message.
 * @type static
 */
Ajax.LoadingMessageOn = function (){
	Ajax.LoadingDialog = Messages.RenderModalDialog(
			null,
			'Loading...',
			'<img src="/resources/img/loading.gif" alt="Loading..." width="100" style="text-align:center;" />',
			{
				closeOnEscape:false,
				closeText:'hide'
			}
		);
};

/**
 * Destroy the "Data loading" modal dialog
 * @type static
 */
Ajax.LoadingMessageOff = function (){
	$(Ajax.LoadingDialog).dialog('close');
};