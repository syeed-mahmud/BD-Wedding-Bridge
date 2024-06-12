<!doctype html>
<html lang="en">

<head>
  <script src="color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>Carousel Template · Bootstrap v5.3</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <script src="../../style.css"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link href="bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- tailwind & daisyui cdn -->

  <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script> -->



  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }
  </style>

  <style>
    .text-shadow {
      text-shadow: 2px 2px 5px rgba(188, 87, 87, 1);
    }

    .relative-text::after {
      content: 'BD Wedding bridge!';
      position: absolute;
      left: 0;
      top: 0;
      color: #21C1BC;
      z-index: -1;
      transform: translate(5px, 5px);
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="carousel.css" rel="stylesheet">
</head>

<body class=" pb-0 bg-[url('../../images/bgimg.png')]">
  <!-- <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
      <path
        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
      <path
        d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
      <path
        d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
      <path
        d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
    </symbol>
  </svg> -->


  <nav class="navbar bg-body-tertiary sticky-top">
    <div class="container-fluid">
      <div class=" flex flex-row justify-center items-center">
        <img src="../../images/Logo.png" alt="Logo" width="50px" height="60px" class="d-inline-block align-text-top">
        <a class="navbar-brand" href="LandingPage.php"> BD Wedding Bridge</a>
      </div>

      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" href="../aboutus.php">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../../Back End/NewsPortal.php">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../wedding.php">All Weddings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../WeddingReg.php">Host Wedding</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Setting
          </a>
          <ul class="dropdown-menu dropdown-end">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="../login.php">Log In</a></li>
            <li><a class="dropdown-item" href="../adminlogin.php">Admin Log In</a></li>
            <li><a class="dropdown-item" href="../../Back End/logout.php">Log out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  <main class=" ">

    <!-- Banner Section -->
    <div id="myCarousel" class="carousel  mx-auto slide mb-6" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
          aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active ">
          <img width="100%" height="100%" src="https://i.ibb.co/fDQXPMS/7338686b0ccdef39452166acda07e033.jpg" class=" "
            alt="">
          <div class="container">
            <div class="carousel-caption bg-gradient-to-r from-slate-400 pl-8 text-start max-w-[30%] ">
              <h1 class="text-7xl relative font-bold text-black text-shadow relative-text">BD Wedding bridge!
              </h1>
              <p class=" fs-4 fw-semibold  my-3">Some representative placeholder content for the first slide of the carousel.</p>
              <p><a class="btn btn-lg bg-[#BC5757] border-[#21C1BC] hover:border-[#3eaca8] hover:bg-[#a03f3f] btn-primary font-semibold text-2xl " href="#">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img width="100%" height="100%" src="https://i.ibb.co/WsD0dQr/bannerpic1.jpg" class=" object-cover" alt="">

          <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg> -->
          <div class="container">
            <div class="carousel-caption bg-gradient-to-r from-slate-400 pl-8 text-start max-w-[30%] ">
              <h1 class="text-7xl relative font-bold text-black text-shadow relative-text">BD Wedding bridge!
              </h1>
              <p class=" fs-4 fw-semibold  my-3">Some representative placeholder content for the first slide of the carousel.</p>
              <p><a class="btn btn-lg bg-[#BC5757] border-[#21C1BC] hover:border-[#3eaca8] hover:bg-[#a03f3f] btn-primary font-semibold text-2xl " href="#">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img width="100%" height="100%" src="https://i.ibb.co/PYtRyfx/bannerpic2.jpg" alt="">
          <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg> -->

          <div class="container">
            <div class="carousel-caption bg-gradient-to-r from-slate-400 pl-8 text-start max-w-[30%] ">
              <h1 class="text-7xl relative font-bold text-black text-shadow relative-text">BD Wedding bridge!
              </h1>
              <p class=" fs-4 fw-semibold  my-3">Some representative placeholder content for the first slide of the carousel.</p>
              <p><a class="btn btn-lg bg-[#BC5757] border-[#21C1BC] hover:border-[#3eaca8] hover:bg-[#a03f3f] btn-primary font-semibold text-2xl " href="#">Sign up today</a></p>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- Marketing messaging and featurettes
  ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container mx-auto marketing">
      <div class="text-center p-2 m-5 w-max mx-auto border-b-2 border-gray-200 border-dashed">
        <p class="  fs-1 fw-normal">Upcoming WEDDINGS</p>
        <h4 class=" fs-5 fw-normal">Join Most recent Weddings</h4>
      </div>

      <div id="carouselExampleIndicators" class="carousel h-80 w-100 mx-auto align-middle slide px-10 ">
        <div class="carousel-indicators ">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner rounded-2xl">
          <div class="carousel-item active ">

            <div class="row row-cols-1 h-80 px-5 row-cols-md-3 g-4">
              <div class="col rounded-2xl">
                <div class="card h-80 rounded w-100">
                  <img src="../../images/2.jpg"
                    class="card-img-top position-relative object-cover object-top  h-full w-full" alt="...">
                  <div class="position-absolute bottom-2 left-2 rounded min-w-fit px-2 bg-gradient-to-r from-gray-700 ">
                    <h5 class="card-title  font-semibold text-wrap text-white text-2xl ">Card title</h5>
                  </div>
                </div>
              </div>
              <div class="col rounded-2xl">
                <div class="card h-80 border w-100">
                  <img src="../../images/3.jpg"
                    class="card-img-top object-cover object-top position-relative h-full w-full" alt="...">
                  <div class="position-absolute bottom-2 left-2 rounded min-w-fit px-2 bg-gradient-to-r from-gray-700 ">
                    <h5 class="card-title  font-semibold text-wrap text-white text-2xl ">Card title</h5>
                  </div>
                </div>
              </div>
              <div class="col rounded-2xl">
                <div class="card h-80 border w-100">
                  <img src="../../images/4.png"
                    class="card-img-top object-cover object-top  position-relative h-full w-full" alt="...">
                  <div class="position-absolute bottom-2 left-2 rounded min-w-fit px-2 bg-gradient-to-r from-gray-700 ">
                    <h5 class="card-title  font-semibold text-wrap text-white text-2xl ">Card title</h5>
                  </div>
                </div>
              </div>

            </div>

          </div>
          <div class="carousel-item">


            <div class="row row-cols-1 px-5  h-80  row-cols-md-3 g-4">
              <div class="col rounded-2xl">
                <div class="card h-80 border w-100">
                  <img src="../../images/5.jpg"
                    class="card-img-top object-cover object-top position-relative h-full w-full" alt="...">
                  <div class="position-absolute bottom-2 left-2 rounded min-w-fit px-2 bg-gradient-to-r from-gray-700 ">
                    <h5 class="card-title  font-semibold text-wrap text-white text-2xl ">Card title</h5>
                  </div>
                </div>
              </div>
              <div class="col rounded-2xl">
                <div class="card h-80 border w-100">
                  <img src="../../images/6.jpg"
                    class="card-img-top object-cover object-top position-relative h-full w-full" alt="...">
                  <div class="position-absolute bottom-2 left-2 rounded min-w-fit px-2 bg-gradient-to-r from-gray-700 ">
                    <h5 class="card-title  font-semibold text-wrap text-white text-2xl ">Card title</h5>
                  </div>
                </div>
              </div>
              <div class="col rounded-2xl">
                <div class="card h-80 border w-100">
                  <img src="../../images/7.jpg"
                    class="card-img-top object-cover object-top position-relative h-full w-full" alt="...">
                  <div class="position-absolute bottom-2 left-2 rounded min-w-fit px-2 bg-gradient-to-r from-gray-700 ">
                    <h5 class="card-title  font-semibold text-wrap text-white text-2xl ">Card title</h5>
                  </div>
                </div>
              </div>
            </div>



          </div>
          <div class="carousel-item">


            <div class="row row-cols-1 px-5  h-80  row-cols-md-3 g-4">
              <div class="col rounded-2xl">
                <div class="card h-80 border w-100">
                  <img src="../../images/8.jpg"
                    class="card-img-top object-cover object-top position-relative h-full w-full" alt="...">
                  <div class="position-absolute bottom-2 left-2 rounded min-w-fit px-2 bg-gradient-to-r from-gray-700 ">
                    <h5 class="card-title  font-semibold text-wrap text-white text-2xl ">Card title</h5>
                  </div>
                </div>
              </div>
              <div class="col rounded-2xl">
                <div class="card h-80 border w-100">
                  <img src="../../images/9.jpg" class="card-img-top position-relative h-full w-full" alt="...">
                  <div class="position-absolute bottom-2 left-2 rounded min-w-fit px-2 bg-gradient-to-r from-gray-700 ">
                    <h5 class="card-title  font-semibold text-wrap text-white text-2xl ">Card title</h5>
                  </div>
                </div>
              </div>
              <div class="col rounded-2xl">
                <div class="card h-80 border w-100">
                  <img src="../../images/10.jpg"
                    class="card-img-top object-cover object-top position-relative h-full w-full" alt="...">
                  <div class="position-absolute bottom-2 left-2 rounded min-w-fit px-2 bg-gradient-to-r from-gray-700 ">
                    <h5 class="card-title  font-semibold text-wrap text-white text-2xl ">Card title</h5>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <button class="carousel-control-prev  " type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon bg-black h-12 w-12 p-3 rounded-lg" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon  bg-black h-12 w-12 p-3 rounded-lg" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <!-- Three columns of text below the carousel -->
      <div class="">
        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">
        <!-- Our Mission Section -->
        <div class="text-center w-3/5 mx-auto">
          <h1 class=" text-6xl mb-2">Our Mission</h1>
          <p class="text-lg border-b-4 mb-4 border-dashed">The mission of BD Wedding Bridge is to help people share
            their life events with others, creating cultural understanding and lasting connections.</p>
        </div>

        <div class="card rounded-3xl h-3/4 mx-auto mb-4 border-blue-500" style="width: 70%;">

          <img src="../../images/1-4.jpg" class="card-img-top rounded-t-3xl w-full h-1/2 object-cover" alt="...">
          <div class="card-body text-center space-y-3 h-1/2 w-full">
            <h5 class="card-title text-3xl font-semibold">For Foreign Visitors</h5>
            <p class="card-text max-w-3xl mx-auto text-xl">Who want to get a closer view of the authentic Bangladeshi
              cultural & experience of traditional local weddings.</p>
            <a href="#"
              class="btn btn-primary w-[346px] hover:text-blue-700 border-2 border-blue-500 bg-transparent text-blue-500">Read
              More</a>
          </div>
        </div>
        <div class="card rounded-3xl h-3/4 mx-auto mt-4 border-blue-500" style="width: 70%;">

          <img src="../../images/wedding-plan-new.jpg" class="card-img-top rounded-t-3xl w-full h-1/2 object-cover"
            alt="...">
          <div class="card-body text-center space-y-3 h-1/2 w-full">
            <h5 class="card-title text-3xl font-semibold">For Local Bangladeshi</h5>
            <p class="card-text max-w-3xl mx-auto text-xl">Who want to get a closer view of the authentic Bangladeshi
              cultural & experience of traditional local weddings.</p>
            <a href="#"
              class="btn btn-primary w-[346px] hover:text-blue-700 border-2 border-blue-500 bg-transparent text-blue-500">Read
              More</a>
          </div>
        </div>


        <hr class="featurette-divider">

        <!-- FEATURED WEDDINGS Section -->
        <section class=" bg-[#EBD7D7] shadow-xl py-5">
          <div class="text-center w-3/5 mx-auto">
            <h1 class=" text-5xl mb-2">Featured Weddings</h1>
            <p class="text-xl max-w-[350px] font-light mx-auto border-b-4 mb-4 pb-2 border-dashed">Helping students get
              exposed to a world opportunities</p>
          </div>

          <div class="row row-cols-1 w-full px-5 mx-auto row-cols-md-3 g-4 ">
            <div class="col">
              <div class="card h-75 border-2 border-[#21C1BC] shadow-lg">
                <img src="../../images/2.jpg" class="card-img-top h-100 object-cover" alt="...">
                <div class="card-body bg-[#EBD7D7]">
                  <h5 class="card-title text-xl">Fahim & Israt’s
                    Wedding</h5>

                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">DATE : 2 Jun, 2024</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="../../images/3.jpg" class="card-img-top h-100 object-cover" alt="...">
                <div class="card-body bg-[#EBD7D7]">
                  <h5 class="card-title text-xl">Fahim & Israt’s
                    Wedding</h5>

                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">DATE : 2 Jun, 2024</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="../../images/4.png" class="card-img-top h-100 object-cover" alt="...">
                <div class="card-body bg-[#EBD7D7]">
                  <h5 class="card-title text-xl">Fahim & Israt’s
                    Wedding</h5>

                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">DATE : 2 Jun, 2024</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="../../images/5.jpg" class="card-img-top h-100 object-cover" alt="...">
                <div class="card-body bg-[#EBD7D7]">
                  <h5 class="card-title text-xl">Fahim & Israt’s
                    Wedding</h5>

                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">DATE : 2 Jun, 2024</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="../../images/6.jpg" class="card-img-top h-100 object-cover" alt="...">
                <div class="card-body bg-[#EBD7D7]">
                  <h5 class="card-title text-xl">Fahim & Israt’s
                    Wedding</h5>

                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">DATE : 2 Jun, 2024</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="../../images/7.jpg" class="card-img-top h-100 object-cover" alt="...">
                <div class="card-body bg-[#EBD7D7]">
                  <h5 class="card-title text-xl">Fahim & Israt’s
                    Wedding</h5>

                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">DATE : 2 Jun, 2024</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="../../images/8.jpg" class="card-img-top h-100 object-cover" alt="...">
                <div class="card-body bg-[#EBD7D7]">
                  <h5 class="card-title text-xl">Fahim & Israt’s
                    Wedding</h5>

                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">DATE : 2 Jun, 2024</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="../../images/9.jpg" class="card-img-top h-100 object-cover" alt="...">
                <div class="card-body bg-[#EBD7D7]">
                  <h5 class="card-title text-xl">Fahim & Israt’s
                    Wedding</h5>

                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">DATE : 2 Jun, 2024</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="../../images/10.jpg" class="card-img-top h-100 object-cover" alt="...">
                <div class="card-body bg-[#EBD7D7]">
                  <h5 class="card-title text-xl">Fahim & Israt’s
                    Wedding</h5>

                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">DATE : 2 Jun, 2024</small>
                </div>
              </div>
            </div>

          </div>
          <div class=" flex justify-center items-center mt-4">
            <a href="#"
              class="btn btn-primary w-[200px] hover:text-blue-700 border-2 border-blue-400 bg-transparent text-blue-500">View
              More</a>
          </div>

        </section>


        <!-- Customer review sections -->

        <section>
          <h1 class=" text-5xl my-5 text-center">Review From Our Some Valuable Guest</h1>
          <div class="row row-cols-1 mx-auto row-cols-md-3 g-4" style="width: 70%;">
            <div class="col">
              <div class="card border-none pt-5 h-100">
                <img src="../../images/600602477a11da74f7b38f53ac7d622d_t.jpeg"
                  class="rounded-circle mx-auto w-[150px] h-[150px]" alt="">
                <!-- <img src="../../images/1-4.jpg" class="card-img-top rounded-circle" alt="..."> -->
                <div class="card-body text-center">
                  <h5 class="card-title text-xl font-bold">Bill Gates <span>
                      <p class=" text-base font-light text-gray-600">Guest, USA</p>
                    </span></h5>

                  <p class="card-text">It was fantastic having BD Wedding Bridge team help me on my recent amazing trip
                    to Bangladesh</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card border-none pt-5 h-100">
                <img src="../../images/Andrew_Garfield_in_2023_(cropped).jpg"
                  class="rounded-circle mx-auto w-[150px] h-[150px]" alt="">
                <!-- <img src="../../images/1-4.jpg" class="card-img-top rounded-circle" alt="..."> -->
                <div class="card-body text-center">
                  <h5 class="card-title text-xl font-bold">Bill Gates <span>
                      <p class=" text-base font-light text-gray-600">Guest, USA</p>
                    </span></h5>

                  <p class="card-text">It was fantastic having BD Wedding Bridge team help me on my recent amazing trip
                    to Bangladesh</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card border-none pt-5 h-100">
                <img src="../../images/Bill_Gates_-_2023_-_P062021-967902_(cropped).jpg"
                  class="rounded-circle mx-auto w-[150px] h-[150px]" alt="">
                <!-- <img src="../../images/1-4.jpg" class="card-img-top rounded-circle" alt="..."> -->
                <div class="card-body text-center">
                  <h5 class="card-title text-xl font-bold">Bill Gates <span>
                      <p class=" text-base font-light text-gray-600">Guest, USA</p>
                    </span></h5>

                  <p class="card-text">It was fantastic having BD Wedding Bridge team help me on my recent amazing trip
                    to Bangladesh</p>
                </div>
              </div>
            </div>
        </section>


        <!-- /END THE FEATURETTES -->

      </div>
    </div>
  </main>


  <footer class="bg-light mt-4">
    <div class="grid  grid-cols-4">
      <div class=" flex flex-col justify-center items-center">
        <img src="../../images/2.png" class="w-[100px]" alt="">
        <p class="font-semibold -mt-6">BD WEDDING BRIDGE</p>
      </div>
      <div class=" text-center flex flex-col justify-center items-center p-4">
        <h1 class="text-lg text-blue-600 font-bold">Company</h1>
        <div class="flex flex-col justify-center items-center">
          <a href="#">About Us</a>
          <a>contact us</a>
          <a>Jobs</a>
          <a>Press Kit</a>

        </div>
      </div>
      <div class=" text-center flex flex-col justify-start items-center p-4">
        <h1 class="text-lg text-blue-600 font-bold">Legal</h1>
        <div class="flex flex-col justify-center items-center">

          <a>Term of use</a>
          <a>Refund policy</a>
          <a>Privacy policy</a>
        </div>
      </div>
      <div class=" flex flex-col justify-center items-center p-1 gap-1">
        <h1 class="text-lg text-blue-600 font-bold">Social Media</h1>
        <div class="flex flex-wrap justify-around gap-2">
          <img src="../../images/fb.png" class="w-[30px]" alt="">
          <img src="../../images/Instagram_logo.jpeg" class="w-[30px]" alt="">
          <img src="../../images/LinkedIn_icon.png" class="w-[30px]" alt="">
          <img src="../../images/yt.png" class="w-[30px]" alt="">
          <img src="../../images/Telegram_logo.jpeg" class="w-[30px]" alt="">
        </div>
      </div>
    </div>
    <div class=" text-center py-2 ">
      <small class="text-gray-400">&copy; 2024 BD Wedding Bridge Team, Inc. &middot; <a href="#">Privacy</a> &middot; <a
          href="#">Terms</a></small>
    </div>
  </footer>

  <script src="bootstrap.bundle.min.js"></script>
</body>

</html>