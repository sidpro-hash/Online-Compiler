const readline = require('readline');

function processData(input) {
    input = input.split("\n");
    console.log(input);
}

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
});
var _line = "";

rl.on('line', function(lin){
    _line += lin;
    //console.log(lin);
});
rl.on('close', function(){
   processData(_line);
});