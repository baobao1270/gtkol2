function loadSelector(){
	requestXHR('show_all', '', requestSelectorCallback);
}

function requestEncode(){
	var data = $('#form-raw-text').val();
	var method = $('#form-method').val();
	requestXHR(method, data, requestEncodeCallback);
}

function echoTest(testData){
	requestXHR('echo', testData, echoTestCallback);
}

function requestXHR(method, requestData, callback){
	$.post('api.php?method=' + method, { data: requestData }, callback);
}

function requestEncodeCallback(data){
	$('#form-result').val(data);
}

function requestSelectorCallback(data){
	var selectorVals  = data.split('|')[0].split('/');
	var selectorTexts = data.split('|')[1].split('/');
	for(i=0;i < selectorTexts.length;i++){
		addSelectorItem(selectorVals[i], selectorTexts[i]);
	}
}

function echoTestCallback(data){
	console.log(data);
}