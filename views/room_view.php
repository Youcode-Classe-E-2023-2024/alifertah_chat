<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7fafc;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .room-header {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .chat-container {
            width: 80%;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        #message-container {
            height: 200px;
            overflow-y: scroll;
            padding: 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        #chat-form {
            display: flex;
            align-items: center;
            padding: 20px;
        }

        #message-input {
            flex: 1;
            padding: 10px;
            border: 1px solid #cbd5e0;
            border-radius: 4px;
        }

        #submitMsg {
            padding: 10px 20px;
            background-color: #3490dc;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #users {
            display: flex;
            padding: 10px;
            /* background-color: #ffffff; */
        }

        .member-list {
            flex: 1;
            padding: 10px;
            background-color: #3490dc;
            color: #ffffff;
            text-align: center;
            text-decoration: none;
            font-size: 1.5rem;
            border-radius: 4px;
        }

        .kick-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 2rem;
            color: #e53e3e;
            text-decoration: none;
        }

        .kick-link:hover {
            text-decoration: underline;
        }
    </style>
<body class="bg-gray-100">
<div class="container">
        <div class="room-header">
            <?= $pageName ?>
        </div>
        <div class="chat-container">
            <div id="message-container">
            </div>
            <form action="" method="post" id="chat-form">
                <input type="text" id="message-input" name="message" placeholder="Type your message...">
                <button id="submitMsg" onclick="fetchMsg(event)" type="submit" name="send">Send</button>
            </form>
        </div>
        <div>
            <h1 class="room-header">MEMBERS</h1>
            <div class="flex items-center text-center justify-center">
                <form action="" class="text-2xl text-center text-blue-600 mr-4 " method="post">
                        <button class="hover:underline" type="submit" name="generate">INVITE</button>
                    </form>
                    <a class="text-2xl text-center text-red-600 hover:underline" href="index.php?page=room_kicks&room=<?= $pageId ?>">KICK</a>
            </div>    
            <div id="users" class="member-list">
            </div>
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
                        spanElement.textContent = value.creator + " : " + value.content ; 
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