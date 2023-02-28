<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitchen Odisha Payment Page</title>
    <link rel="shortcut icon" href="favicon-32x32.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    include 'header.php';
    echo "<hr>";
    ?>
    <section class="text-gray-400 bg-gray-900 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">Payment Details</h1>
                <p class="mb-8 leading-relaxed">Thank you for your order <span id="ordername1"></span> ! We know you're going to love it.... </p>
                <p class="text-sm mt-2 text-gray-500 mb-8 w-full">Kitchen Odisha Provide Good Foods..</p>
                <div class="flex lg:flex-row md:flex-col text-gray-300">
                    <button class="bg-gray-800 inline-flex py-3 px-5 rounded-lg items-center hover:bg-gray-700 hover:text-white focus:outline-none">
                        <span class="ml-4 flex items-start flex-col leading-none">
                            <span class="text-xs text-gray-400 mb-1 ">Order Name</span>
                            <span class="title-font font-medium" id="ordername">Google Play</span>
                        </span>
                    </button>
                    <button class="bg-gray-800 inline-flex py-3 px-5 rounded-lg items-center hover:bg-gray-700 hover:text-white focus:outline-none lg:ml-4 md:ml-0 ml-4 md:mt-4 mt-0 lg:mt-0">
                        <span class="ml-4 flex items-start flex-col leading-none">
                            <span class="text-xs text-gray-400 mb-1">Order Price</span>
                            <span class="title-font font-medium" id="payment1">App Store</span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <?php
                include 'Payment.php';
                ?>
            </div>
        </div>
    </section>
    <?php
    include 'footer.php'
    ?>
    <?php
    //================Data sending using php=================
    $conn = mysqli_connect("localhost", "root", "", "order_details") or die("No connection");

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    $phno = $_POST['phno'];
    $ordername = $_POST['ordername'];


    $query = "insert into order_table(fname,lname,gmail,state,chity,zip,phno,order_name) values('{$fname}','{$lname}','{$email}','{$state}','{$city}','{$zipcode}','{$phno}','{$ordername}')";

    mysqli_query($conn, $query) or die("Query not executed");
    ?>
</body>
<script>
    document.getElementById("ordername1").innerText = localStorage.getItem("order_name");
    document.getElementById("ordername").innerText = localStorage.getItem("order_name");
    document.getElementById("payment1").innerText = localStorage.getItem("order_price");
    document.getElementById("pay").innerText = localStorage.getItem("order_price");


    document.addEventListener('DOMContentLoaded', () => {
        for (const el of document.querySelectorAll("[placeholder][data-slots]")) {
            const pattern = el.getAttribute("placeholder"),
                slots = new Set(el.dataset.slots || "_"),
                prev = (j => Array.from(pattern, (c, i) => slots.has(c) ? j = i + 1 : j))(0),
                first = [...pattern].findIndex(c => slots.has(c)),
                accept = new RegExp(el.dataset.accept || "\\d", "g"),
                clean = input => {
                    input = input.match(accept) || [];
                    return Array.from(pattern, c =>
                        input[0] === c || slots.has(c) ? input.shift() || c : c
                    );
                },
                format = () => {
                    const [i, j] = [el.selectionStart, el.selectionEnd].map(i => {
                        i = clean(el.value.slice(0, i)).findIndex(c => slots.has(c));
                        return i < 0 ? prev[prev.length - 1] : back ? prev[i - 1] || first : i;
                    });
                    el.value = clean(el.value).join``;
                    el.setSelectionRange(i, j);
                    back = false;
                };
            let back = false;
            el.addEventListener("keydown", (e) => back = e.key === "Backspace");
            el.addEventListener("input", format);
            el.addEventListener("focus", format);
            el.addEventListener("blur", () => el.value === pattern && (el.value = ""));
        }
    });

    var pay = document.querySelector(".pay");
    var allinputs = document.querySelectorAll(".input_text input")
    pay.addEventListener('click', function() {
        allinputs.forEach((e) => {
            e.classList.remove('warning');
            if (e.value.length < 1) {
                e.classList.add('warning');
            }
        });
    });

    allinputs.forEach((all) => {
        all.addEventListener('keyup', function() {
            if (all.value.length < 1) {
                all.classList.add('warning');

            } else {
                all.classList.remove('warning');
            }
        });
    });
</script>

</html>