<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="w-screen bg-[url('../../images/bgimg.png')] py-20">
    <section>

        <div class=" w-1/4 mx-auto my-10">
            <img src="../images/ayman.png" alt="Wedding Venue" class="rounded-3xl shadow-lg h-full w-full">
        </div>

        <div class=" p-6  ">

            <h1 class="text-5xl mx-auto w-[600px] text-center text-black font-bold mb-2">Ayman & Munjeerin’s Wedding
            </h1>

            <div class="flex items-center justify-center ">
                <div class="w-4 h-4 bg-black rounded-full "></div>
                <div class=" min-w-[600px] border-t-2 border-black"></div>
                <div class="w-4 h-4 bg-black rounded-full "></div>
            </div>
        </div>

    </section>

    <!-- Event information section -->
    <section>
        <div class=" ml-20 my-10 border-2 w-fit rounded-3xl p-5 bg-[#21C1BC66]">
            <h1 class="text-5xl underline decoration-double font-light text-black">Event Information</h1>
            <ul class="list-disc text-2xl font-semibold mt-9 ml-10">
                <li>Event Location : <span class="text-gray-700">Dhaka ,Bangladesh</span></li>

                <li>Event Start Date : <span class="text-gray-700">25/12/2024 </span></li>
                <li> Event End Date : <span class="text-gray-700"> 25/12/2024</span></li>

                <li> Event Function List: <span class="text-gray-700">Haldi, Shogun, Music</span>
                </li>
                <li>Food : <span class="text-gray-700"> Kasundi Chili Chicken, Masala Dosa </span>
                </li>
                <li>Accommodation: <span class="text-gray-700">Privet jet, Hotel </span></li>
            </ul>
        </div>
        <div class="flex items-center justify-center ">
            <div class="w-4 h-4 bg-black rounded-full "></div>
            <div class=" min-w-[600px] border-t-2 border-black"></div>
            <div class="w-4 h-4 bg-black rounded-full "></div>
        </div>
    </section>

    <!-- User Information -->
    <div class="my-10">
        <h1
            class="text-5xl text-center font-semibold w-fit mx-auto pb-2 border-b-2 border-black border-dashed  text-black">
            Your Information</h1>

        <div class="flex justify-center items-center mt-10 gap-5">
            <img class="w-40 h-40 border-4 border-blue-600 rounded-full" src="../images/syeed.jpg" alt="">

            <div class="">

                <p class=" text-2xl font-semibold ">
                    Name : <span class="text-gray-700">Standard Chartard Bank</span>
                    <br>Email: <span class="text-gray-700">Jar Biye Taar Naam</span>
                    <br>Contact : <span class="text-gray-700"> 184198484981949948</span>
                </p>
                <div>
                    <label class=" text-2xl font-semibold text-black mt-8" for="">Number Of Person : </label>
                    <input class="w-16 h-10 border border-black" type="number" name="" id="">

                    <button
                        class="btn btn-info w-56 py-2 text-2xl rounded-2xl ml-20 font-semibold bg-[#000000C9] text-white">
                        Pay Now
                    </button>
                </div>
            </div>
        </div>

    </div>

    <div class="flex justify-center items-center mt-40">
        <button class="btn btn-info w-80 py-2 text-3xl rounded-2xl ml-20 font-semibold bg-[#000000C9] text-white">
            Confirm
        </button>
    </div>






</body>

</html>