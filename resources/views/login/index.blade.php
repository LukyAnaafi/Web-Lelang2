  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
    <section class="vh-100">
        <div class="container py-5 h-100">
        
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="https://img.freepik.com/free-vector/cute-fish-fishing-cartoon-vector-icon-illustration-animal-sport-icon-concept-isolated-premium-flat_138676-4566.jpg?w=740&t=st=1668654823~exp=1668655423~hmac=a60ccb864908b9672c310f3aa71424260a712cb95ee26a2c6be9be512e34167d"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 ">
              @if (session()->has('success'))
                  <div class="alert alert-success">
                    {{session('success')}}
                  </div>
              @endif
              <form action="/" method="post">
                @csrf
                <div class="text-center">
                  <h1 class=" fw-bold mx-3 mb-5 ">LELANG</h1>
                  </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="username">Username </label>
                  <input type="text" id="username" name="username"  value="{{ old('username') }}"  class="form-control form-control-lg" required autofocus />
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="password">Password</label>

                  <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                </div>

                <div class="form-outline mb-4">
                  <label for="role" class="form-label">Role</label>
                  <select name="role" id="role" class="form-control form-control-lg" required>
                    <option value="user">User</option>
                    <option value="petugas">Petugas</option>
                  </select>
                </div>
      
                <div class="d-flex justify-content-around align-items-center mb-4">
                  <!-- Checkbox -->
                 
                  <a href="/login/Register">Register</a>
                </div>
      
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
      
                
      
               
      
              </form>
            </div>
          </div>
        </div>
      </section>
    
  </body>
  </html>