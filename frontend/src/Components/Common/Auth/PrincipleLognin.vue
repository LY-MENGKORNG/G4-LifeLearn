<template>
    <div class="flex justify-center max-w-3xl shadow-md mx-auto items-center bg-gray-100 mt-5 mb-5">
        <el-container class="flex m-auto">
            <el-card class="flex-1 p-10">
                <img src="https://static.vecteezy.com/system/resources/previews/005/867/668/non_2x/online-registration-illustration-design-concept-vector.jpg"
                    class="w-full justify-center mx-auto" alt="Teacher image" />
            </el-card>
            <el-form class="flex-1 p-10 text-start">
                <h2 class="text-2xl font-bold mb-2 ">LognIn</h2>
                <p class="mt-4">Don't have an account? <router-link to="" class="text-teal-500 font-bold text-sm">Sign Up</router-link></p>
                <el-form-item class="mt-2">
                    <label for="email">Email Address</label>
                    <el-input id="email" type="email" placeholder="............." />
                </el-form-item>
                <el-form-item class="mt-2">
                    <label for="password" show-password>Password</label>
                    <el-input id="password" type="password" placeholder="................." />
                </el-form-item>
                <el-button native-type="submit" class="w-full mt-3 bg-teal-500 hover:bg-teal-500 text-white">Sign In</el-button>
            </el-form>
        </el-container>
    </div>
</template>