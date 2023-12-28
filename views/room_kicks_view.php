

<div class="bg-white p-8 rounded shadow-md w-96  ml-[40%] mt-[10%]">
    <form action="" method="post" class="space-y-4">
        <label for="kicked" class="block text-sm font-medium text-gray-600">Select User to Kick:</label>
        <select name="kicked" id="kicked"
            class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
            <?php while($usr = $allUsers->fetch_assoc()): ?>
            <option value="<?= $usr['users_username'] ?>"><?= $usr['users_username'] ?></option>
            <?php endwhile; ?>
        </select>

        <button type="submit"
            class="w-full bg-red-400 text-white py-2 px-4 rounded hover:bg-red-600 focus:outline-none focus:ring focus:border-blue-300">
            KICK
        </button>
    </form>
</div>
