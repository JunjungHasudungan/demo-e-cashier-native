<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
     <title>Register | e-cashier</title>
     <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
     <script src="../../js/stateRegister.js"></script>
</head>
    <body class="h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div x-data="stateRegister()"  class="w-full max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form 
                @submit.prevent="sendDataRegister()" 
                class="space-y-2" 
                enctype="multipart/form-data"
                method="POST">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
                    <input 
                        type="name" 
                        x-model="user.name" 
                        id="name" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="doeng joe" />
                    <template x-if="errors.name">
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500"><span x-text="errors.name" class="font-medium"></span></p>
                    </template>  
                </div>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input 
                        type="email" 
                        x-model="user.email" 
                        id="email" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" />
                    <template x-if="errors.email">
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span x-text="errors.email" class="font-medium"></span></p>
                    </template>  
                </div>

                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input 
                        type="password" 
                        x-model="user.password" 
                        id="password" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                        placeholder="*****" />
                    <template x-if="errors.password">
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span x-text="errors.password" class="font-medium"></span></p>
                    </template>  
                </div>

                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pasword Confirmation</label>
                    <input 
                        type="password"
                        x-model="user.password_confirmation" 
                        id="user.password_confirmation" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="******" />
                    <template x-if="errors.password_confirmation">
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span x-text="errors.password_confirmation" class="font-medium"></span></p>
                    </template>  
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Register
                </button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Not registered? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
                </div>
            </form>
        </div>
    </body>
</html>