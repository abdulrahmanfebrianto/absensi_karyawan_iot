<header class="navbar sticky-top bg-danger flex-md-nowrap p-0 shadow" data-bs-theme="danger">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">STMJ Group</a>
  
  
    {{-- <div id="navbarSearch" class="navbar-search w-100 collapse"> --}}
      <div class ="navbar-nav">
          <div class="nav-item text-nowrap">
              <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="nav-link px-3 border-0 text-white"> Logout <i class="bi bi-box-arrow-right"> </i></button>
                </form>
          </div>
    </div>
  </header>