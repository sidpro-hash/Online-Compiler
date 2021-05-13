var language = {};
language["html"] = "<!DOCTYPE html>\n<html>\n\t<head>\n\t\t<title>Title of the document</title>\n\t</head>\n\t<body style=\"background:#2e3340;color:lightgray;font-size:18px\">\n\t\tThe content of the document......\n\t</body>\n</html>";
language["cpp"] ="\n// Sample code to perform I/O:\n\n#include <iostream>\n\nusing namespace std;\n\nint main() {\n\tint num;\n\tcin >> num;\t\t\t// Reading input from STDIN\n\tcout << \"Input number is \" << num << endl;\t// Writing output to STDOUT\n}\n\n\n// Write your code here";
language["java"] ="\n/*\n*uncomment this if you want to read input.\n//imports for BufferedReader\nimport java.io.BufferedReader;\nimport java.io.InputStreamReader;\n\n//import for Scanner and other utility classes\nimport java.util.*;\n*/\n\nclass Main {\n\tpublic static void main(String args[] ) throws Exception {\n\t/* Sample code to perform I/O:\n\t* Use either of these methods for input\n\t\t//BufferedReader\n\tBufferedReader br = new BufferedReader(new InputStreamReader(System.in));\n\tString name = br.readLine();\t\t// Reading input from STDIN\n\tSystem.out.println(\"Hi, \" + name +\".\");\t// Writing output to STDOUT\n\n\t//Scanner\n\tScanner s = new Scanner(System.in);\n\tString name = s.nextLine();\t\t// Reading input from STDIN\n\tSystem.out.println(\"Hi,\" + name + \".\");\t// Writing output to STDOUT\n\n\t*/\n\t\n\t// Write your code here\n\t\n\t}\n}";
language["c"] = "\n// Sample code to perform I/O:\n\n#include <stdio.h>\n\nint main() {\n\tint num;\n\tscanf(\"%d\",&num);\t\t\t// Reading input from STDIN\n\tprintf(\"Input number is %d\",num);\t// Writing output to STDOUT\n\treturn 0;\n}\n\n\n// Write your code here";
language["javascript"] ="\nfunction processData(input){\n\t//write you code here\n}\n\nprocess.stdin.resume();\nprocess.stdin.setEncoding(\"ascii\");\n_input = \"\";\nprocess.stdin.on(\"data\", function (input) {\n\t_input += input;\n});\n\nprocess.stdin.on(\"end\", function () {\n\tprocessData(_input);\n});";
language["python3"] = "'''\n# Sample code to perform I/O:\n\ntry:\n\tname = input()\t\t# Reading input from STDIN\n\tprint('Hi, %s.' % name)\t\t# Writing output to STDOUT\nexcept EOFError as e:\n\tprint(e)\n'''\n\n# Write your code here";

  var EditSession = require("ace/edit_session").EditSession;
  var mode = {};
  mode["cpp"] = ace.createEditSession(language["cpp"]);
  mode["java"] = ace.createEditSession(language["java"]);
  mode["html"] = new EditSession(language["html"]);
  mode["c"] = ace.createEditSession(language["c"]);
  mode["javascript"] = ace.createEditSession(language["javascript"]);
  mode["python3"] = ace.createEditSession(language["python3"]);

function setupEditor() {
  document.getElementById('output').value="";
  document.getElementById('theme').value="ace/theme/cobalt";
  document.getElementById('modes').value="ace/mode/c_cpp";
  window.editor = ace.edit("editor");
  editor.getSession().setUseWorker(false);
  editor.setOptions({
    autoScrollEditorIntoView: true,
    wrap:true,
    copyWithEmptySelection: false,
    animatedScroll: true,
    fontSize:16,
    enableBasicAutocompletion: true,
    enableLiveAutocompletion: true,
    enableSnippets: false,
  });
  let w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  if(w<600){
	  editor.setOptions({
    enableBasicAutocompletion: false,
    enableLiveAutocompletion: false
  });
  }
  editor.getSession().setMode(document.getElementById('modes').value);
  editor.setTheme("ace/theme/cobalt");
  editor.setValue(language["cpp"],1);

  //editor.setValue(`<!DOCTYPE html>\n<html>\n\t<head>\n\t\t<title>Title of the document</title>\n\t</head>\n\t<body style="background:#2e3340;color:lightgray;font-size:18px">\n\t\tThe content of the document......\n\t</body>\n</html>`,1); // 1 = moves cursor to end
        // editor.getSession().on('change',function(){
        //$("#check").blur();
        //   var x = document.getElementById('check');
        //   if(x.checked == true)update();
        // });
  }
  function ready() {
    setupEditor();
    document.getElementById('check').checked=false;
  }


  function changeMode() {
      let x = document.getElementById('modes');
      let lang = x.options[x.selectedIndex].text;
      editor.setSession(mode[lang]);
      editor.getSession().setMode(document.getElementById('modes').value);
      //editor.setValue(language[lang],1);
      editor.setOptions({
        autoScrollEditorIntoView: true,
        wrap:true,
        copyWithEmptySelection: false,
        animatedScroll: true,
        fontSize:16,
        enableBasicAutocompletion: true,
        enableLiveAutocompletion: true,
        enableSnippets: false,
      });
	  let w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  if(w<600){
	  editor.setOptions({
    enableBasicAutocompletion: false,
    enableLiveAutocompletion: false
  });
  }
  }
  function changeTheme() {
    editor.setTheme(document.getElementById('theme').value);
  }

  function check(checkbox){
    let input = document.getElementById('input');
    if(checkbox.checked == true){
      input.style.display="block";
    }
    else {input.style.display="none";input.value="";}
  }
  function HTML(){
    var output = document.getElementById("output");
    let x = document.getElementById('modes');
    var buttn = document.getElementById('submit');
    //buttn.disabled = true;
    var proD = document.getElementById("process");
    proD.innerHTML ="Uploading....";
    window.scrollTo(0,window.innerHeight);
    output.innerHTML="";
    output.style.display="none";
    let lang = x.options[x.selectedIndex].text;
    var text = editor.getValue();
    var input = (document.getElementById('input').value==="")?" ":document.getElementById('input').value;
    var formData = new FormData();
    formData.append("text", text);
    formData.append("input", input);
    formData.append("language", lang);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if(this.readyState == 1 || this.readyState == 2 || this.readyState == 3){proD.innerHTML = "Processing....";}
      else if(this.readyState == 4 && this.status == 200) {
        proD.innerHTML = "";
        output.innerHTML = this.responseText;
	output.style.display = "block";
        //console.log(this.responseText);
        window.scrollTo(0,window.innerHeight);
        //buttn.disabled = false;
      }
    };
	xmlhttp.open("POST", "compiler.php", true);
	//xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded' );
	xmlhttp.send(formData);

  }
  var file = {};
  file["cpp"] = "cpp";
  file["java"] = "java";
  file["c"] = "c";
  file["javascript"] = "js";
  file["python3"] = "py";
  function download() {
	let x = document.getElementById('modes');
	let lang = x.options[x.selectedIndex].text;
      var filename = "Main." + file[lang];
      var text = editor.getValue();
      var element = document.createElement('a');
      element.setAttribute('href', 'data:text/html;charset=utf-8,' + encodeURIComponent(text));
      element.setAttribute('download', filename);
      element.style.display = 'none';
      document.body.appendChild(element);
      element.click();
      document.body.removeChild(element);
    }
    
  function upload(){
      var element = document.createElement('input');
      element.setAttribute('type', 'file');
      element.setAttribute('id', 'file_1');
      element.style.display = 'none';
      document.body.appendChild(element);
      element.click();
      let file_1 = document.getElementById('file_1');
      file_1.addEventListener('change', (event) => {
    	const fileList = event.target.files;
    	//console.log(fileList);
    	//console.log(fileList[0].name);
    	let type = fileList[0].name;
       let x = document.getElementById('modes');
	let lang = x.options[x.selectedIndex].text;
    	var patt = new RegExp("\."+file[lang]);
    	//console.log(patt);
    	if(patt.test(type)){
    		let reader = new FileReader();
  		reader.readAsText(fileList[0]);
  		reader.onload = function() {
    			//console.log(reader.result);
    			editor.setValue(reader.result,1);
  		};
    	}
    	else alert("Unappropriate file !!! file must have ."+file[lang]+" extension");
  	},document.body.removeChild(element));
      
  	
  }
  // var cpp = new EditSession(language["cpp"]);
  // var html = new EditSession(language["html"]);
    // $('#modes').on('change', function (ev) {
    //     var mo = $('option:selected').attr('value');
    //     editor.session.setMode(mo);
    //     editor.setTheme(document.getElementById('theme').value);
    // });
    // $('#theme').on('change', function (ev) {
    //     var mod = $('option:selected').attr('value');
    //     editor.setTheme(mod);
    // });
