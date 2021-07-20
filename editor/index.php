<!DOCTYPE html>
<html lang="en-IN" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Online Compiler - Collegeek</title>
    <meta name="author" content="SidPro">
    <meta name="description" content="Online C,C++,JAVA,Python,Javascript compiler: you can write your code and run cheers!">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" integrity="sha512-GZ1RIgZaSc8rnco/8CXfRdCpDxRCphenIiZ2ztLy3XQfCbQUSCuk8IudvNHxkRA3oUg6q0qejgN/qqyG1duv5Q==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ext-themelist.min.js" integrity="sha512-5CwAfXQtNsk5OzybMAJ3U14TStTq6jUHJoWxu58KOyioLXO3fX6FPUKaYp/2iF6yZMkv38fvh3nH+Vq94R2BUg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ext-language_tools.min.js"></script>
    <script type="text/javascript" src="compiler.js"></script>
    <link rel="stylesheet" href="css/compiler.css">
    <!-- icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="css/icons/favicon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="css/icons/favicon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="css/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="css/icons/favicon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="css/icons/favicon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="css/icons/favicon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="css/icons/favicon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="css/icons/favicon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="css/icons/favicon-180x180.png">
    <link rel="icon" type="image/png" sizes="16x16" href="css/icons/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="css/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="css/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="192x192" href="css/icons/favicon-192x192.png">
    <link rel="shortcut icon" type="image/x-icon" href="css/icons/favicon.ico">
    <link rel="icon" type="image/x-icon" href="css/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="css/icons/favicon-144x144.png">
    <meta name="msapplication-config" content="css/icons/browserconfig.xml">
    <link rel="manifest" href="css/icons/manifest.json">
    <!-- icons -->
  </head>
  <body onload="ready()">
    <div class="container">
      <h1>Online Compiler</h1> <!--  -->
      <button title="Upload File" onclick="upload()" class="download-btn"><i class="fas fa-file-upload"></i></button>
      <button title="Download Code" onclick="download()" class="download-btn"><i class="fa fa-download"></i></button>
      <div class="semicontainer">
        <div class="labeltheme">
          <!-- <label for="modes">Language :</label> -->
          <select id="modes" size="1" onchange="changeMode()" style="background:#e8e8e8 url('chevron-down-solid.svg') no-repeat 90% 50%;-webkit-appearance: none;">
            <option value="ace/mode/java">java</option>
            <option value="ace/mode/c_cpp" selected>cpp</option>
            <option value="ace/mode/c_cpp">c</option>
            <!-- <option value="ace/mode/html">html</option> -->
            <option value="ace/mode/javascript">javascript</option>
	    <option value="ace/mode/python">python3</option>
           </select>
        </div>
        <div class="labeltheme">
          <!-- <label for="theme">Theme :</label> -->
          <select id="theme" size="1" onchange="changeTheme()" style="background:#e8e8e8 url('adjust-solid.svg') no-repeat 90% 50%;-webkit-appearance: none;">
            <option value="ace/theme/cobalt" selected>Cobalt</option>
            <option value="ace/theme/dracula">Dracula</option>
            <option value="ace/theme/idle_fingers">Idle Fingers</option>
            <option value="ace/theme/merbivore_soft">Merbivore Soft</option>
            <option value="ace/theme/monokai">Monokai</option>
            <option value="ace/theme/terminal">Terminal</option>
            <option value="ace/theme/chrome">Chrome</option>
            <option value="ace/theme/xcode">Xcode</option>
            <option value="ace/theme/textmate">Textmate</option>
            <option value="ace/theme/sqlserver">Sqlserver</option>
            <option value="ace/theme/eclipse">Eclipse</option>
          </select>
        </div>
          <div id="editor"></div>
      </div>
        <button id="submit" class="button button1" type="button" name="Run" onclick="HTML()">Run Code</button>
        <input id="check" onchange="check(this)" type="checkbox" value="check">
        <label for="check" style="font-size:16px">Test input</label>
        <br/>
        <textarea id="input" name="input" rows="6" cols="20"></textarea>
        <br/>
        <pre id="process"></pre>
        <pre id="output"></pre>
    </div>
  </body>
</html>
