<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet">

  <section class="vh-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-5">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0 justify-content-center">
            <div class="col-12 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <form method="POST" action="member_controller.php">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0"></span>
                  </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" />
                        </div>

                  
                  <button type="submit" class="btn btn-dark btn-lg btn-block mb-4">Sign in</button>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>