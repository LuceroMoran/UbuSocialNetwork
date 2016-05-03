var codeapp = angular.module('codeapp',['ui.router']);
codeapp.controller('firstController',['$scope','$http',function($scope,$http){
  $http.post('code_view/info',{})
  .success(function(data){
    $scope.codigodata = data
    $scope.codigo = data[0].codigo
    // console.log(data);
    editor_edit($scope.codigo)
  })
  .error(function(data){
    console.log("ERR");
  })
  $http.post('getmyinfo',{})
  .success(function(data){
    $scope.personalInfo = data
    console.log(data)
  })
  .error(function(err){
    console.log("ERR");
  })
}]);

var editor_edit = function(c){
  var pr = ["break", "do", "end", "else", "elseif", "function",
           "if", "local", "nil", "not", "or", "repeat", "return", "then", "until", "while","include",
         "float","int","double","longe","void","printf","scanf","system","var","alert","document.write",
       "console.log","for","switch","else","echo","print_r","print"];

  var re;



  //Cadenas de texto entre comillas simples y comillas dobles.
  c = c.replace(/(['""].*?['""])/g, "<span class=\"string\">$1</span>");

  //colores para los numeros.
  c = c.replace(/\b(\d+)/g, "<span class=\"numberColor\">$1</span>");

  //Coloreado para las functiones que no esten definidas.
  c = c.replace(/(function\s*\w*)/g, "<span class=\"customFunctions\">$1</span>");

  //Colores para los corchetes en lua [ "(" y ")" ].
  c = c.replace(/([\(\)])/g, "<span class=\"sc\">$1</span>");


  for (var i = 0; i < pr.length; i++) {
      re = new RegExp("\\b" + pr[i] + "\\b", "g");
      c = c.replace(re, "<span class=\"keyword\">" + pr[i] + "</span>");
  }

  //Comentarios de dobles --[[...]]
  c = c.replace(/<span class=\"sc\">--\[\[<\/span>/g, "--[[");
  c = c.replace(/<span class=\"sc\">]]<\/span>/g, "]]");


  c = c.replace(/(--\[\[[\s\S]*?\]\])|(--.*\n?)/g, clear_spans);


  c = c.replace(/\b(\[\[[\s\S]*?\]\])|\s+(\[\[[\s\S]*?\]\])/g, clear_spans2);

  document.getElementById("code-layer").innerHTML = c; //injecting the code into the pre tag

  //Elimina los estilos que contengan las palabras y les asigna la de los comentarios.
  function clear_spans(match) {
      match = match.replace(/<span.*?>/g, "");
      match = match.replace(/<\/span>/g, "");
      return "<span class=\"comment\">" + match + "</span>";
  }

  //Elimina los estilos que contengan las palabras y les asigna la de los comentarios.
  function clear_spans2(match) {
      match = match.replace(/<span.*?>/g, "");
      match = match.replace(/<\/span>/g, "");
      return "<span class=\"UsingcommentC\">" + match + "</span>";
  }
}
