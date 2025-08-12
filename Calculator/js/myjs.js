var display = document.querySelector(".val");
var str = "";
var p = document.getElementById("print");
document.querySelector(".plus").addEventListener('click',()=>{
    str = display.value+'+';
    display.value = str;
});
document.querySelector(".minus").addEventListener('click',()=>{
    str = display.value+'-';
    display.value = str;
});
document.querySelector(".multiply").addEventListener('click',()=>{
    str = display.value+'*';
    display.value = str;
});
document.querySelector(".divide").addEventListener('click',()=>{
    str = display.value+'/';
    display.value = str;
});
document.querySelector(".clear").addEventListener('click',()=>{
    str = ""
    display.value = str;
});
document.querySelector(".zero").addEventListener('click',()=>{
    str = display.value+'0';
    display.value = str;
});
document.querySelector(".one").addEventListener('click',()=>{
    str = display.value+'1';
    display.value = str;
});

document.querySelector(".equal").addEventListener('click',()=>{
    str = display.value;
    let ind = 999999;
    if(str.indexOf('+') != -1){
        add();
    }
    else if(str.indexOf('-') != -1){
        sub();
    }
    else if(str.indexOf('*') != -1){
        mul();
    }
    else if(str.indexOf('/') != -1){
        div();
    }
    function add(){
        let arr = str.split('+');
        let result=0;
        for(let i of arr){
            result+=parseInt(i,2);
        }
        //console.log(dec2bin(result));
        display.value = dec2bin(result);
    }

    function sub(){
        let arr = str.split('-');
        let result = parseInt(arr[0],2);
        for(let i=1; i<arr.length; i++){
            result -= parseInt(arr[i],2);
        }
        // console.log(result);
        display.value = dec2bin(result);
    };

    function mul(){
        let arr = str.split('*');
        let result=1;
        for(let i of arr){
            result*=parseInt(i,2);
        }
        // console.log(result);
        // console.log(dec2bin(result));
        display.value = dec2bin(result);
    }

    function div(){
        let arr = str.split('/');
        let result = parseInt(arr[0],2);
        for(let i=1; i<arr.length; i++){
            result /= parseInt(arr[i],2);
        }
        // console.log(result);
        display.value = dec2bin(result);
    };
});


function dec2bin(dec) {
    return (dec >>> 0).toString(2);
  }