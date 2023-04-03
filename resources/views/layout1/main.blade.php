<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LELANG</title>
    <link href="/page/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

     <!-- Favicon-->
     <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
     <!-- Bootstrap icons-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
     <!-- Google fonts-->
     <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
     <!-- Core theme CSS (includes Bootstrap)-->
     <link href="/page/css/styles.css" rel="stylesheet" />

  </head>
  <body>
    @include('/layout1/side')
    <main>
        @yield('content')
            <body>
                <!-- Navigation-->
               
                <!-- Masthead-->
                <header class="masthead">
                    <div class="container position-relative">
                        <div class="row justify-content-center">
                            <div class="col-xl-6">
                                <div class="text-center text-white">
                                    <!-- Page heading-->
                                    <h1 class="mb-5">Generate more leads with a professional landing page!</h1>
                                    <!-- Signup form-->
                                    <!-- * * * * * * * * * * * * * * *-->
                                    <!-- * * SB Forms Contact Form * *-->
                                    <!-- * * * * * * * * * * * * * * *-->
                                    <!-- This form is pre-integrated with SB Forms.-->
                                    <!-- To make this form functional, sign up at-->
                                    <!-- https://startbootstrap.com/solution/contact-forms-->
                                    <!-- to get an API token!-->
                                    <form class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN">
                                        <!-- Email address input-->
                                        {{-- <div class="row"> --}}
                                            {{-- <div class="col">
                                                <input class="form-control form-control-lg" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                                                <div class="invalid-feedback text-white" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                                                <div class="invalid-feedback text-white" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
                                            </div> --}}
                                            {{-- <div class="col-auto"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                                        </div> --}}
                                        <!-- Submit success message-->
                                        <!---->
                                        <!-- This is what your users will see when the form-->
                                        <!-- has successfully submitted-->
                                       
                                        <!-- Submit error message-->
                                        <!---->
                                        <!-- This is what your users will see when there is-->
                                        <!-- an error submitting the form-->
                                        <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Icons Grid-->
                <div class="row row-cols-1 row-cols-md-3 mt-4 g-4 d-flex justify-content-center">
                  @foreach($lelang as $item)
                  <!-- Tawar Modal -->
                    <div class="modal fade" id="tawarModal{{ $item->id }}" tabindex="-1" aria-labelledby="tawarModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="tawarModalLabel">Penawaran {{ $item->nama }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/penawaran/{{ $item->id }}/barang/{{ $item->barang->id }}" method="POST">
                                {{-- <form action="#" method="POST"> --}}
                                    @csrf
                                    <img src="{{ asset('storage/' . $item->barang->foto) }}" alt="Foto" class="img-fluid w-100">
                                    <input type="number" class="form-control mt-3" name="penawaran" placeholder="Masukan Penawaran" min="{{ $item->getMinBid() }}">
                                    <p class="text-primary">Harga Minimal : {{ $item->getMinBid() }}</p>
                                    <br>
                                    <div class="mt-3 float-end">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Tawar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- History Modal -->
                    <div class="modal fade" id="historyModal{{ $item->id }}" tabindex="-1" aria-labelledby="historyModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="historyModalLabel">History {{ $item->nama }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Nama User</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($history->where('id_lelang', $item->id) as $subItem)
                                            <tr>
                                                {{-- <td>test</td> --}}
                                                <td>{{ $subItem->user->nama }}</td>
                                                <td>{{ $subItem->penawaran_harga }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    {{-- Card --}}
                  <div class="col-md-3">
                    <div class="card h-100">
                      <img src='{{ asset('storage/' . $item->barang->foto) }}' class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">{{ $item->barang->Harga_Awal }}</h5>
                        <p class="card-text">{{ $item->barang->nama }}</p>
                        <a href="#"  data-bs-toggle="modal" data-bs-target="#tawarModal{{ $item->id }}" class="btn btn-primary">tawar</a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#historyModal{{ $item->id }}" class="btn btn-primary">history</a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
            </main>
          </body>
          </html>
               
                <!-- Image Showcases-->
               
                <!-- Testimonials-->
                <section class="testimonials text-center bg-light">
                    <div class="container">
                        <h2 class="mb-5">What people are saying...</h2>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                                    <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-1.jpg" alt="..." />
                                    <h5>Margaret E.</h5>
                                    <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                                    <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-2.jpg" alt="..." />
                                    <h5>Fred S.</h5>
                                    <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                                    <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-3.jpg" alt="..." />
                                    <h5>Sarah W.</h5>
                                    <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Call to Action-->
              
                                <!-- Signup form-->
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- * * SB Forms Contact Form * *-->
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- This form is pre-integrated with SB Forms.-->
                                <!-- To make this form functional, sign up at-->
                                <!-- https://startbootstrap.com/solution/contact-forms-->
                                <!-- to get an API token!-->
                                <form class="form-subscribe" id="contactFormFooter" data-sb-form-api-token="API_TOKEN">
                                    <!-- Email address input-->
                                   
                                    <!-- Submit success message-->
                                    <!---->
                                    <!-- This is what your users will see when the form-->
                                    <!-- has successfully submitted-->
                                   
                                    <!-- Submit error message-->
                                    <!---->
                                    <!-- This is what your users will see when there is-->
                                    <!-- an error submitting the form-->
                                   
                <!-- Footer-->
              
                <!-- Bootstrap core JS-->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                <!-- Core theme JS-->
                <script src="js/scripts.js"></script>
                <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
                <!-- * *                               SB Forms JS                               * *-->
                <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
                <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
                <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
            </body>
        </html>
        

        
        