<template>
    <WebLayout>
      <div  class="w-full max-w-xl m-auto p-3  bg-gray-200">
            <form class=" shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-gray-100 ">
            <p class="text-center font-bold mb-4 text-teal-500">Create Books</p>
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                Title
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
            id="title" 
            type="text"
             placeholder="Title"
            
             >
            </div>
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="author" >
                Author
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
            id="author" 
            type="text" 
            placeholder="Author"
            
            >
            </div>
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="user_id">
                User_id
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
            id="user_id" 
            type="number" 
            placeholder="User_id"
            
            > 
            </div>
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="published_at">
                Published_at
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
            id="published_at" 
            type="date" 
            placeholder="Published_at"
            >

            </div>
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                Price
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
            id="price" 
            type="number" 
            placeholder="Price"
            
            >
            </div>
            <div class="flex items-center justify-between">
            <button class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Create
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-teal-500 hover:text-teal-800" href="#">
                Cancel
            </a>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;2024 Acme Corp. All rights reserved.
        </p>
        </div>
    </WebLayout >
</template>

<script>

import WebLayout from '@/Layouts/Web/WebLayout.vue';


</script>

