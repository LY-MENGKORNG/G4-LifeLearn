<template>
    <div class="absolute bg-gray-100 p-4 top-0 left-0 w-full h-full bg-opacity-50 flex justify-center items-center">
      <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md w-96">
        <h2 class="text-lg font-semibold mb-4">Create Class</h2>
        <div class="mb-4">
          <label for="class-name" class="block font-medium">Class name (required)</label>
          <input type="text" id="class-name" class="w-full border rounded p-2" placeholder="Enter class name">
        </div>
        <div class="mb-4">
          <label for="section" class="block font-medium">Section</label>
          <input type="text" id="section" class="w-full border rounded p-2" placeholder="Enter section">
        </div>
        <div class="mb-4">
          <label for="subject" class="block font-medium">Subject</label>
          <input type="text" id="subject" class="w-full border rounded p-2" placeholder="Enter subject">
        </div>
        <div class="mb-4">
          <label for="room" class="block font-medium">Room</label>
          <input type="text" id="room" class="w-full border rounded p-2" placeholder="Enter room">
        </div>
        <div class="flex justify-between">
          <button @click="$emit('cancel')" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">Cancel</button>
          <button @click="$emit('create')" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Create</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'CreateClass',
    props: {
      onCreate: Function,
      onCancel: Function,
    },
  }
  </script>
  