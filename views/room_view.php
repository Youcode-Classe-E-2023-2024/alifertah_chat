<div>
    <h1 class="text-center  text-3xl"><?= $pageName?></h1>
    <div class="max-w-md mx-auto my-4 bg-white border rounded shadow-lg">
        <div id="message-container" class="h-48 overflow-y-scroll p-4 border-b">
            <!-- Messages will be displayed here -->
        </div>
        <form id="chat-form" method="post" class="flex items-center p-4">
            <input type="text" id="message-input" name="message" placeholder="Type your message..." class="flex-1 p-2 border rounded-l">
            <button type="submit" name="send" class="px-4 py-2 bg-blue-500 text-white rounded-r">Send</button>
        </form>
    </div>
</div>