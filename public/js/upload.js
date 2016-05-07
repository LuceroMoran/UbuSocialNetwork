var form = document.getElementById('upload');
var request = new XMLHttpRequest();

form.addEventListener('submit', function(e){
    e.preventDefault();
    var formdata = new FormData(form);

    request.open('post', '/upload');
    request.addEventListener("load", transferComplete);
    request.send(formdata);

});

function transferComplete(data){
    response = JSON.parse(data.currentTarget.response);
    if(response.success){
        document.getElementById('msg').innerHTML = "yayyy!";
      }
    }
