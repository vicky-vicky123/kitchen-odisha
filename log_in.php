<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitchen Odisha Log-in Page </title>
    <link rel="shortcut icon" href="favicon-32x32.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <form action="user_sign_up.php" method="post" id="log-in">
        <section class="text-gray-400 bg-gray-900 body-font" id="log-in">
            <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
                <div class="bg-gray-900 relative flex flex-wrap py-6 rounded shadow-md">
                    <div class="lg:w-1/2 px-6">
                        <h2 class="title-font font-semibold text-white tracking-widest text-xs">ADDRESS</h2>
                        <p class="mt-1">5JX9+QQJ, Chikiti, Odisha 761010</p>
                    </div>
                    <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                        <h2 class="title-font font-semibold text-white tracking-widest text-xs">EMAIL</h2>
                        <a class="text-indigo-400 leading-relaxed" href="mailto: vickyvicky.db143a@gmail.com">vickyvicky.db143a@gmail.com</a>
                        <h2 class="title-font font-semibold text-white tracking-widest text-xs mt-4">PHONE</h2>
                        <p class="leading-relaxed">969-292-6869</p>
                    </div>
                </div>
                <div class="lg:w-2/6 md:w-1/2 bg-gray-800 bg-opacity-50 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
                    <h2 class="text-white text-lg font-medium title-font mb-5">Sign Up</h2>
                    <div class="relative mb-4">
                        <label for="full-name" class="leading-7 text-sm text-gray-400">Full Name</label>
                        <input type="text" id="full-name" name="fullname" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-indigo-900 rounded border border-gray-600 focus:border-indigo-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                    </div>
                    <div class="relative mb-4">
                        <label for="email" class="leading-7 text-sm text-gray-400">Email</label>
                        <input type="email" id="email" name="email" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-indigo-900 rounded border border-gray-600 focus:border-indigo-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                    </div>
                    <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" >Sand</button>
                    <p class="text-xs mt-3">Literally you probably haven't heard of them jean shorts.</p>
                </div>
            </div>
        </section>
    </form>
    <!----footer page---->
    <?php
    include 'footer.php';
    ?>
</body>
<script>
    document.getElementById("log-in").reset();
</script>
</html>