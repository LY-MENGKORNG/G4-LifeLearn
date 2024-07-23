<template>
  <div class="flex justify-center">
    <div class="flex justify-center max-w-90 shadow-md mx-auto items-center bg-slate-100 mt-4">
      <el-container>
        <el-form class="flex-1 p-10 text-start" >
          <h3 class="text-2xl font-bold mb-2">Student Score</h3>
          <el-form-item class="mt-2" >
            <label for="email">Email:</label>
            <el-input id="email" type="email" />
            <span  class="text-red-500"></span>
          </el-form-item>
          <el-form-item class="mt-2">
            <label for="score">Score:</label>
            <el-input id="score" type="number" />
          </el-form-item>
          <el-form-item class="mt-2">
            <label for="feedback">Comment feedback:</label>
            <el-input id="feedback" type="textarea" placeholder="Please input" />
          </el-form-item>
          <button 
            type="submit" 
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Submit</button>
        </el-form>
      </el-container>
    </div>

  </div>
</template>