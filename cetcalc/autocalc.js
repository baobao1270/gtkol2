var cet = {
    400: 710,
    410: 710*0.15,
    421: 710*0.07,
    422: 56.8,
    423: 710*0.20,
    431: 710*0.05,
    432: 710*0.10,
    433: 710*0.20,
    440: 710*0.15,
    600: 710,
    610: 710*0.15,
    621: 56.8,
    622: 710*0.07,
    623: 710*0.20,
    631: 710*0.05,
    632: 710*0.10,
    633: 710*0.20,
    640: 710*0.15
}

var cetqs = {
    410: 100,
    421: 7,
    422: 8,
    423: 10,
    431: 10,
    432: 10,
    433: 10,
    440: 100,
    610: 100,
    621: 8,
    622: 7,
    623: 10,
    631: 10,
    632: 10,
    633: 10,
    640: 100
}

function autocalc(input){
    var gradesList = [410, 421, 422, 423, 431, 432, 433, 440, 610, 621, 622, 623, 631, 632, 633, 640]
    var grades = {}
    for(var i=0; i<gradesList.length; i++){
        grades[gradesList[i]] = (input[gradesList[i]] / cetqs[gradesList[i]]) * cet[gradesList[i]]
    }
    
    return grades
}

function setOutputs(arr){
    var gradesList = [410, 421, 422, 423, 431, 432, 433, 440, 610, 621, 622, 623, 631, 632, 633, 640, 400, 600]
    for(var i=0; i<gradesList.length; i++){
        if(gradesList[i] == 400){
            setOutputValue(
                400,
                arr[410] + arr[421] + arr[422] + arr[423] + arr[431] + arr[432] + arr[433] + arr[440])
        }else if(gradesList[i] == 600){
            setOutputValue(
                600,
                arr[610] + arr[621] + arr[622] + arr[623] + arr[631] + arr[632] + arr[633] + arr[640])
        }else{
            setOutputValue(gradesList[i], arr[gradesList[i]])
        }
    }
}

function setOutputValue(id, value){
    if(value > 710){
        $('#g' + id).text('错误')
        return
    }
    $('#g' + id).text(value.toFixed(2))
}

function getInputs(){
    var inputsList = [410, 421, 422, 423, 431, 432, 433, 440, 610, 621, 622, 623, 631, 632, 633, 640]
    var input = {}
    for(var i=0; i<inputsList.length; i++){
        input[inputsList[i]] = getInputValue(inputsList[i])
    }
    return input
}

function getInputValue(id){
    var v = Math.round(Number($('#cet' + id).val()))
    if(isNaN(v)){ return 0 }
    return v
}

function checkInput(input){
    input.value=input.value.replace(/\D/g,'')
    var i = Number(input.id.substr(-3))
    var max = cetqs[i]
    if( (input.value > max) || (input.value.length > 3) ){
        input.value = input.value.substr(0, input.value.length - 1)
    }
    
    if(input.value < 0){
        input.value = 0
    }
    
    if(input.value == 0){
        input.value = ''
    }
}

function onInputChange(){
    checkInput(this)
    setOutputs(autocalc(getInputs()))
}

$('input').change(onInputChange)
$('input').keydown(onInputChange)
$('input').keyup(onInputChange)