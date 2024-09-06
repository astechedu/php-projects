<nav class="navbar navbar-expand-lg navbar-light bg-success ">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
      <!--
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      -->

        <li class="nav-item" style="width:40em">
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success search-button" type="submit">Search</button>
              </form>     
        </li>           
        <li class="nav-item">
          <a class="nav-link" href="{{ route('cart.index') }}">Cart(<span id="cartCounter">0</span>)</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>       
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>             
      </ul>
    </div>

  </div>
</nav>

<style>
.navbar {
  background-image: linear-gradient(15deg, #80d0c7 0%, #13547a 100%);
}
.search-button{background: #fff;}

.navbar-nav li {
  a {
    color: #1a1a1a !important;
    &:hover {
      color: #0d0d0d !important;
      font-weight: bold !important;
    }
  }
}

.navbar-collapse .nav-item > .nav-link.active  {
    color: #0d0d0d !important;
    font-weight: bold !important;
}

.container-fluid {
  font-size: 18px;
  line-height: 1.8em;
}

.main {
  margin-top: 85px;
  background-color: #ddd;
}


</style>