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
    <div class="w-[80-%] mx-10 my-20 bg-white border rounded shadow-lg">
        <div id="message-container" class="h-48 overflow-y-scroll p-4 border-b">
            </div>
            <form action="" method="post">
                <button type="submit" name="generate">INVITE</button>
            </form>
            <form id="chat-form" method="post" class="flex items-center p-4">
                <input type="text" id="message-input" name="message" placeholder="Type your message..." class="flex-1 p-2 border rounded-l">
                <button id="submitMsg" onclick="fetchMsg(event)" type="submit" name="send" class="px-4 py-2 bg-blue-500 text-white rounded-r">Send</button>
            </form>
        </div>
    </div>
    <h1 class="text-center text-white text-3xl">MEMBERS</h1>
    <div id="users" class="flex py-4 bg-white">
        
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


    var url = `index.php?page=${page}&id=${id}&name=${name}`;
    
    var formData = new FormData();
    formData.append('message', message);

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
    document.getElementById("message-input").value=""
}

function asynChat(){
    conv = document.getElementById("message-container");
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('id');
    var url1 = `index.php?page=test&room=${id}`;
    
    fetch(url1, {
            method: 'POST',
        })
        .then((responseData) => {
          if(responseData){
               (responseData.json().then((data)=> {
                console.log(data)
                conv.textContent = "";
                const usersContainer = document.getElementById("users");
                usersContainer.textContent = "";
                data.map((value) => {
                    if(value.content && value.creator){
                        const divElement = document.createElement('div');
                        const spanElement = document.createElement('span');
                        spanElement.className = 'px-4 my-2 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600';
                        spanElement.textContent = value.creator + ":" + value.content ; 
                        // conv.innerHTML=value.content;
                        divElement.appendChild(spanElement);
                        conv.appendChild(divElement);
                    } else {
                        const userLink = document.createElement("a");
                        userLink.textContent = value.users_username;
                        userLink.className =  "px-4 text-2xl underline hover:text-blue-700";
                        userLink.href =  `index.php?page=profile&username=${value.users_username}`;
                        usersContainer.appendChild(userLink);
                    }
                })
               }));
          }else{
               console.log("it didn't work");
          }
        })
        .catch((error) => {
        console.log('Error duringgg fetch:', error);
    });
}

setInterval(()=>{asynChat()}, 1000)
</script>