<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitchen Odisha Payment Page</title>
    <link rel="shortcut icon" href="favicon-32x32.png" type="image/x-icon">
</head>

<body>
    <div class="flex justify-center items-center min-h-screen bg-gray-900 text-gray-600">
        <div class="h-auto w-80 bg-white p-3 rounded-lg">
            <p class="text-xl font-semibold">Payment</p>
            <div class="input_text mt-6 relative"> <input type="text" class="h-12 pl-7 outline-none px-2 focus:border-blue-900 transition-all w-full border-b " placeholder="John Row" /> <span class="absolute left-0 text-sm -top-4">Cardholder Name</span> <i class="absolute left-2 top-4 text-gray-400 fa fa-user"></i> </div>
            <div class="input_text mt-8 relative"> <input type="text" class="h-12 pl-7 outline-none px-2 focus:border-blue-900 transition-all w-full border-b " placeholder="0000 0000 0000 0000" data-slots="0" data-accept="\d" size="19" /> <span class="absolute left-0 text-sm -top-4">Card Number</span> <i class="absolute left-2 top-[14px] text-gray-400 text-sm fa fa-credit-card"></i> </div>
            <div class="mt-8 flex gap-5 ">
                <div class="input_text relative w-full"> <input type="text" class="h-12 pl-7 outline-none px-2 focus:border-blue-900 transition-all w-full border-b " placeholder="mm/yyyy" data-slots="my" /> <span class="absolute left-0 text-sm -top-4">Expiry</span> <i class="absolute left-2 top-4 text-gray-400 fa fa-calendar-o"></i> </div>
                <div class="input_text relative w-full"> <input type="text" class="h-12 pl-7 outline-none px-2 focus:border-blue-900 transition-all w-full border-b " placeholder="000" data-slots="0" data-accept="\d" size="3" /> <span class="absolute left-0 text-sm -top-4">CVV</span> <i class="absolute left-2 top-4 text-gray-400 fa fa-lock"></i> </div>
            </div>
            <p class="text-lg text-center mt-4 text-gray-600 font-semibold">Payment amount: <span id="pay">$12.98</span></p>
            <div class="flex justify-center mt-4"> <button class="outline-none pay h-12 bg-orange-600 text-white mb-3 hover:bg-orange-700 rounded-lg w-1/2 cursor-pointer transition-all">Pay</button> </div>
        </div>
    </div>
</body>
<script>
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