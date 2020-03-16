function post(url, requestuestBody) {
    return new Promise(function(succeed, fail) {
        var request = new XMLHttpRequest();
        request.open("POST", url, true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.addEventListener("load", function() {
            if (request.status < 400)
                succeed(request.responseText);
            else
                fail(new Error("Request failed: " + request.statusText));
        });
        request.addEventListener("error", function() {
            fail(new Error("Network error"));
        });
        request.send(requestuestBody);
    });
}

// document.getElementById('send').addEventListener('click', (e) => {
//     e.preventDefault();
//
//     const startInput = document.getElementById('start').value;
//     const endInput = document.getElementById('end').value;
//
//     let url = window.location.href + 'handler.php';
//     let params = "start=" + startInput + "&end=" + endInput;
//     console.log(params);
//     post("http://vsk.local/handler.php", params).then(function(text) {
//         console.log(text);
//     }, function(error) {
//         console.log(error);
//     });
// });