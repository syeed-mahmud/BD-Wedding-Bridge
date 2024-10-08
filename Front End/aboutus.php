<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us</title>
    <link rel="icon" href="../images/Logo.png" type="image/x-icon">
   <script src="https://cdn.tailwindcss.com"></script>

   <link rel="stylesheet" href="../aboutus.css">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.2/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>


</head>

<?php include("header.php")
?>

<body class="w-screen bg-[url('../images/bgimg.png')]">


   <section class="">
      <div
         class=" flex justify-center items-center w-screen min-h-[60vh] bg-cover bg-center bg-[url('../images/aboutimg.jpeg')] ">
         <div class=" w-4/5 mx-auto  bg-[#4438389C]  min-h-[30vh] flex justify-center items-center rounded-[45px]">
            <h1 class="font-bold text-7xl text-outline-red">ABOUT US</h1>
         </div>
      </div>

   </section>

   <!-- Address Section -->

   <section class="">
      <div class=" w-4/5 flex border-2 mx-auto max-h-[80vh] mt-12 p-10 rounded-lg shadow-2xl ">

         <div class=" w-3/4">
            <img src="../images/2.png" class="w-[120px] " alt="">
            <h1 class="text-3xl font-bold mb-4">BD Wedding Bridge</h1>
            <p class="text-lg font-normal">#35 St, Bashundhara R/A<br>Dhaka, Bangladesh</p>
            <p class="text-lg font-normal">Po/Box #332 Bashundhara</p>
            <p class="mt-2 text-lg font-bold underline decoration-indigo-500">+880-1265999882</p>
            <p class=" text-lg font-bold underline decoration-sky-500">bdweddingbridge@gmail.com</p>
         </div>
         <div class=" w-1/4 ">
            <img src="../images/aboutuspic2.jpeg" alt="Wedding Venue" class="rounded-lg shadow-lg h-full w-full">
         </div>

      </div>
   </section>
   <hr class=" border-t-[30px] border-[#21C1BC] opacity-90 rounded-r-md w-3/5 mt-20 mb-10">

   <!-- Meet the team section -->
   <section>
      <div class="  p-6  ">
         <h1 class="text-7xl text-black font-bold mb-2">MEET THE TEAM</h1>
         <div class="flex items-center ">
            <div class=" min-w-[800px] ml-[80px] border-t-4 border-black"></div>
            <div class="w-4 h-4 bg-black rounded-full "></div>
         </div>
      </div>

      <!-- Team cards-1 -->
      <div class="container mx-auto mt-10 flex justify-start gap-5 py-2 px-20 rounded-lg ">

         <div class=" w-[258px] h-[370px] ">
            <img src="../images/syeed.jpeg" alt="Wedding Venue" class="rounded-3xl object-cover shadow-lg h-full w-full">
         </div>

         <div class=" text-left mt-10 ">

            <h1 class="text-4xl text-black font-bold mb-1">Syeed Mahmud </h1>
            <h1 class="text-2xl text-black font-bold mb-4">CEO, Developer</h1>
            <div class="flex items-center ">

               <div class=" min-w-[400px] border-t-4 border-black"></div>
               <div class="w-4 h-4 bg-black rounded-full "></div>
            </div>
            <div class="text-[#444242]">
               <p class="text-lg font-bold">ID# : 2211486042</p>
               <p class="text-lg font-bold">Email : Syeed.mahmud@northsouth.edu</p>
               <p class="text-lg font-bold ">Contact : +8801697479909</p>
            </div>


         </div>

      </div>
      <!-- Team cards-2 -->
      <div class="container mx-auto flex justify-end gap-5 mt-12 py-2 px-20 rounded-lg ">

         <div class=" text-right mt-10">

            <h1 class="text-4xl text-black font-bold mb-1">Anju Manowara</h1>
            <h1 class="text-2xl text-black font-bold mb-4">HOD, Developer</h1>
            <div class="flex items-center ">
               <div class="w-4 h-4 bg-black rounded-full "></div>
               <div class=" min-w-[400px] border-t-4 border-black"></div>

            </div>
            <div class="text-[#444242]">
               <p class="text-lg font-bold">ID# : 2122339642</p>
               <p class="text-lg font-bold">Email : anju.manowara@northsouth.edu</p>
               <p class="text-lg font-bold ">Contact : +8801786432578</p>
            </div>


         </div>
         <div class=" w-[258px] h-[370px] ">
            <img src="../images/anju.jpeg" alt="Wedding Venue" class="rounded-3xl shadow-lg h-full object-cover w-full">
         </div>

      </div>

      <!-- Team cards-3 -->
      <div class="container mx-auto mb-10 flex justify-start gap-5 py-2 px-20 rounded-lg ">

         <div class=" w-[258px] h-[370px] ">
            <img src="../images/Adiba.png" alt="Wedding Venue" class="rounded-3xl shadow-lg h-full object-cover w-full">
         </div>

         <div class=" text-left mt-10 ">

            <h1 class="text-4xl text-black font-bold mb-1">Adiba Sarkar Adar</h1>
            <h1 class="text-2xl text-black font-bold mb-4">Web Tester, Developer</h1>
            <div class="flex items-center ">

               <div class=" min-w-[400px] border-t-4 border-black"></div>
               <div class="w-4 h-4 bg-black rounded-full "></div>
            </div>
            <div class="text-[#444242]">
               <p class="text-lg font-bold">ID# : 2211486042</p>
               <p class="text-lg font-bold">Email : adiba.ador@northsouth.edu</p>
               <p class="text-lg font-bold ">Contact : +8801963470216</p>
            </div>


         </div>

      </div>
   </section>

   <hr class=" border-t-[30px] border-[#21C1BC] ml-auto opacity-90 rounded-l-lg w-3/4 mt-20 mb-10">

   <!-- What Are We section -->
   <section class="container mx-auto p-10 ">
      <h1 class="text-7xl mb-4 text-black font-bold ">What Are We?</h1>
      <p class="text-3xl ml-20 font-light text-black">We are the connector, the bridge that needs to be established to extend our culture to the world. By acting as the link between diverse communities, we facilitate the sharing and appreciation of our unique heritage on a global scale. Our role is to ensure that the richness of our traditions, values, and customs is experienced and understood by people everywhere, fostering mutual respect and understanding. Through our efforts, we aim to create a global tapestry where every culture is valued and celebrated.</p>

   </section>

   <hr class=" border-t-[30px] border-[#21C1BC] opacity-90 rounded-r-md w-3/5 mt-20 mb-10">

      <!-- Our Mission section -->
      <section class="container mx-auto p-10 mb-40">
         <h1 class="text-7xl mb-4 text-black font-bold ">Our Mission</h1>
         <p class="text-3xl ml-20 font-light text-black">We invite local people to share their culture and connect through life events with foreigners, fostering a unique exchange of traditions and experiences. By bringing together diverse backgrounds, we create an enriching environment where participants can learn from one another, celebrate differences, and build lasting friendships. This initiative not only broadens perspectives but also strengthens community bonds, making our world a smaller and more inclusive place</p>
   
      </section>

    

     

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
</body>
<?php include("footer.php")
?>
</html>