<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<div>
    <h1 class="text-center  text-3xl"><?= $pageName?></h1>
    <div class="max-w-md mx-auto my-4 bg-white border rounded shadow-lg">
        <div id="message-container" class="h-48 overflow-y-scroll p-4 border-b">
            
        </div>
        <form id="chat-form" method="post" class="flex items-center p-4">
            <input type="text" id="message-input" name="message" placeholder="Type your message..." class="flex-1 p-2 border rounded-l">
            <button onclick="fetchMsg(event)" type="submit" name="send" class="px-4 py-2 bg-blue-500 text-white rounded-r">Send</button>
        </form>
    </div>
</div>
</body>
</html>

<script>
function fetchMsg(event) {
    event.preventDefault();
    var messageInput = document.getElementById('message-input');
    var message = messageInput.value;
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('id');
    var page = urlParams.get('page');
    var name = urlParams.get('name');

    // console.log('ID:', id);
    // console.log('Page:', page);
    // console.log('Name:', name);

    var url = `index.php?page=test`;
    
    // var formData = new FormData();
    // formData.append('message', message);

    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then((response) => response.json())
    .then((responseData) => {
      if(responseData.status == "ok"){
           console.log("it worked");
      }else{
           console.log("it didn't work");
      }
    })
}
var url1 = 'index.php?page=test';

fetch(url1, {
        method: 'POST',
    })
    // .then((response) => response.json())
    .then((responseData) => {
      if(responseData){
           console.log(responseData.text().then((data)=> {
            console.log(data)
           }));
      }else{
           console.log("it didn't work");
      }
    })
    .catch((error) => {
    console.log('Error duringgg fetch:', error);
});
</script>