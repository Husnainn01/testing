<nav class="navbar navbar-expand-lg bg-dark ">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ '/' }}"><img src="{{asset('uploads/site_photos/0ea83f18e14ebe3951eeb034aed66a4b.png')}}" height="70" alt=""><span class="text-white fw-bold fs-5 mx-3">My Account</span>
        @if(Auth::user())
            <small class="text-white">Hello, {{ Auth::user()->name }}</small></a>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                <!-- <a class="nav-link disabled" aria-disabled="true"> <button class="btn btn-sm btn-secondary rounded-2" type="button"><i class="fa-solid fa-arrow-up-from-bracket"></i> Used Cars</button></a> -->
                </li>
                <li class="nav-item">
                <!-- <a class="nav-link disabled" aria-disabled="true"> <button class="btn btn-sm btn-secondary rounded-2" type="button"><i class="fa-solid fa-arrow-up-from-bracket"></i> Auto Parts</button></a> -->
                </li>
                <li class="nav-item">
                @if(Auth::user())
                    <a href="{{ route('customer_logout') }}" class="nav-link" aria-expanded="false">
                        <span class="btn btn-sm btn-success rounded-2"><i class="fa-solid fa-right-from-bracket"></i>Logout</span>
                    </a>
                @endif
                </li>
            </ul>
        </div>
    </div>
  </nav>
