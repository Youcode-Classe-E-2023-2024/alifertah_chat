<div>
    <h1 class="text-center  text-3xl"><?= $pageName?></h1>
    <div class="max-w-md mx-auto my-4 bg-white border rounded shadow-lg">
        <div id="message-container" class="h-48 overflow-y-scroll p-4 border-b">
            <!-- Messages will be displayed here -->
        </div>
        <form id="chat-form" method="post" class="flex items-center p-4">
            <input type="text" id="message-input" name="message" placeholder="Type your message..." class="flex-1 p-2 border rounded-l">
            <button onclick="fetchMsg(event)" type="submit" name="send" class="px-4 py-2 bg-blue-500 text-white rounded-r">Send</button>
        </form>
    </div>
</div>

<script>
function fetchMsg(event) {
    event.preventDefault();

    // Get the input value
    var messageInput = document.getElementById('message-input');
    var message = messageInput.value;
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('id');
    var page = urlParams.get('page');
    var name = urlParams.get('name');

    // console.log('ID:', id);
    // console.log('Page:', page);
    // console.log('Name:', name);

    var url = `index.php?page=${page}&id=${id}&name=${name}`;
    
    var formData = new FormData();
    formData.append('message', message);

    fetch(url, {
        method: 'POST',
        body: formData
    })
}
</script>