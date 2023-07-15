<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a class="navbar-brand" href="/dashboard"><h1>Esteema</h1></a>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <form action="/logout" method="post">
        @csrf
        <button type="submit" class="btn tombol m-2">
          Logout
        </button>
      </form>
    </ul>
  </nav><!-- End Icons Navigation -->

</header>