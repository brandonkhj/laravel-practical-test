<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Form</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="max-w-7xl mx-auto p-6 lg:p-8"  x-data="{ nameCheck: false, phoneCheck: false, dobCheck: false, genderCheck: false }">
            <form action="{{ route('form.submit') }}" method="POST">
                @csrf
                <div class="mt-16">
                    <div class="flex flex-wrap items-center">
                        <label class="inline-flex items-center mr-4">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="nameCheck"
                                value="nameCheck" x-model="nameCheck">
                            <span class="ml-2 text-gray-700">Name</span>
                        </label>
                        <label class="inline-flex items-center mr-4">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="phoneCheck"
                                value="phoneCheck" x-model="phoneCheck">
                            <span class="ml-2 text-gray-700">Phone Number</span>
                        </label>
                        <label class="inline-flex items-center mr-4">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="dobCheck"
                                value="dobCheck" x-model="dobCheck">
                            <span class="ml-2 text-gray-700">Date of Birth</span>
                        </label>
                        <label class="inline-flex items-center mr-4">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="genderCheck"
                                value="genderCheck" x-model="genderCheck">
                            <span class="ml-2 text-gray-700">Gender</span>
                        </label>
                    </div>

                    <div class="flex flex-wrap items-center mt-10" x-show="nameCheck" x-data="{ name: '' }">
                        <label for="name-input" class="block text-gray-700 font-bold mb-2">Name</label>
                        <input id="name-input" x-model="name" type="text" name="name"
                            class="w-full px-3 py-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            placeholder="Enter your name here" x-bind:required="nameCheck">
                    </div>

                    <div class="flex flex-wrap items-center mt-5" x-show="phoneCheck" x-data="{ phone: '' }">
                        <label for="phone-input" class="block text-gray-700 font-bold mb-2">Phone Number</label>
                        <input id="phone-input" x-model="phone" type="number" name="phone"
                            class="w-full px-3 py-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            placeholder="Enter your phone number here" x-bind:required="phoneCheck">
                    </div>

                    <div class="flex flex-wrap items-center mt-5" x-show="dobCheck" x-data="{ dob: '' }">
                        <label for="dob-input" class="block text-gray-700 font-bold mb-2">Date of Birth</label>
                        <input id="dob-input" x-model="dob" type="date" name="dob"
                            class="w-full px-3 py-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            placeholder="Enter your dob here" x-bind:required="dobCheck">
                    </div>

                    <div class="flex flex-wrap items-center mt-5" x-show="genderCheck" x-data="{ gender: '' }">
                        <label for="gender-input" class="block text-gray-700 font-bold mb-2">Gender</label>
                        <input id="gender-input" x-model="gender" type="text" name="gender"
                            class="w-full px-3 py-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            placeholder="Enter your gender here" x-bind:required="genderCheck">
                    </div>
                </div>
                <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5" type="submit" x-show="nameCheck || phoneCheck || dobCheck || genderCheck">
            </form>
        </div>
    </div>
</body>
<script>
    @if (request()->hasCookie('submitSuccess'))
        Swal.fire({
            title: 'Submit successfully!',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
    @endif
</script>

</html>
