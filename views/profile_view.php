<!-- component -->
<body class="bg-gray-100">
<div class="flex justify-center items-center">
  <div class="max-w-lg mx-auto my-10 bg-white rounded-lg shadow-md p-5 ">
    <img class="w-32 h-32 rounded-full mx-auto" src="https://picsum.photos/200" alt="Profile picture">
    <h2 class="text-center text-2xl font-semibold mt-3"><?= $username ?></h2>
    <a class="text-center text-gray-600 mt-1"><?=$userEmail['users_email']?></p>
    <div class="flex justify-center mt-5">
      <a href="#" class="text-blue-500 hover:text-blue-700 mx-3">Twitter</a>
      <a href="#" class="text-blue-500 hover:text-blue-700 mx-3">LinkedIn</a>
      <a href="#" class="text-blue-500 hover:text-blue-700 mx-3">GitHub</a>
      <?php
      if($username != $_SESSION['username'])
      echo("
      <form action='' method='post'>
        <button class='text-blue-500 hover:text-blue-700 mx-3' type='submit' name='add'>add</button>
      </form>
      ");
      
      ?>
    </div>
    <div class="mt-5">
      <h3 class="text-xl font-semibold">Bio</h3>
      <p class="text-gray-600 mt-2">John is a software engineer with over 10 years of experience in developing web and mobile applications. He is skilled in JavaScript, React, and Node.js.</p>
    </div>
  </div>
  <div class="flex">
  <?php
      if($username == $_SESSION['username']){
        while($req = $res->fetch_assoc()){
          $receiver = $db->query("SELECT users_username FROM users WHERE users_id = '$req[receiver_id]'");
          $receiverUsername = $receiver->fetch_assoc();
          if($receiverUsername['users_username'] == $_SESSION['username']){
            $sender = $db->query("SELECT users_username FROM users WHERE users_id = '$req[sender_id]'");
            $senderUsername = $sender->fetch_assoc();
            echo("
            <div class='flex justify-center items-center'>
              <div class=''>
                <div>
                  <span class='font-semibold text-gray-800'>$senderUsername[users_username]</span>
                  <span class='text-gray-400'>wants to be your friend</span>
                </div>
                <div class='font-semibold'>
                <form method='post' action=''>
                  <a href='#' class='text-blue-600 mr-2'>Accept</a>
                  <a href='#' class='text-gray-400'>Decline</a>
                </form>
                </div>
                </div>
                </div>
                ");
          }
        }
          }
          ?> 
    </div>
      </div>  
</body>