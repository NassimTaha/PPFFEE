<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
    <img src="{{ asset('storage/img/Sonatrach.png') }}" class="rounded" height="40px" width="40px">
      <a class="navbar-brand mx-2" href="#">SONATRACH</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" aria-current="page" href="">Statistiques <i class="bi bi-graph-up"></i></a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Administration <i class="bi bi-gear-fill"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('structuresIAP')}}">Structures IAP <i class="bi bi-houses-fill"></i></a></li>
              <li><a class="dropdown-item" href="{{route('signataires')}}">Signataires <i class="bi bi-vector-pen"></i></a></li>
              <li><a class="dropdown-item" href="{{route('structuresAffectation')}}">Structures D'affectation <i class="bi bi-building-fill"></i></a></li>
              <li><a class="dropdown-item" href="{{route('encadrants')}}">Encadrants <i class="bi bi-person-lines-fill"></i></a></li>
              <li><a class="dropdown-item" href="{{route('domaines')}}">Domaines <i class="bi bi-journals"></i></a></li>
              <li><a class="dropdown-item" href="{{route('specialites')}}">Spécialités <i class="bi bi-bookmarks-fill"></i></a></li>
            </ul>
          </li>
          <a class="nav-link" href="{{route('etablissements')}}">Établissements <i class="bi bi-buildings"></i></a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Stages
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('stages')}}">Liste des stages</a></li>
              <li><a class="dropdown-item" href="{{route('rechercheStage')}}">Rechercher un stage</a></li>
              <li><a class="dropdown-item" href="{{route('stagiaires')}}">Liste des stagiaires</a></li>
            </ul>
          </li>

          <div class="hidden sm:flex sm:items-center sm:ms-6" style="margin-left: 310px">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">        
                    <div><i class="bi bi-person-circle"></i> {{ Auth::user()->name }}</div>
      
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Se déconnecter') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
          

        </div>
      </div>
    </div>
  </nav>
    
