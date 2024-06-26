<x-master title="Domaines">
    @if(request()->has('modifier'))
    <div class="title">
        <h1>Modifier un domaine</h1>
    </div>

<div id="add_edit_div">
    <form action="{{ route('domaines.update', $domaine->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-5">
                <p class="h6">Structure IAP</p>
                <select name="structuresIAP_id" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    @foreach ($structuresIAPs as $structuresIAP)
                        <option value="{{ $structuresIAP->id }}" {{ old('structuresIAP_id', $domaine->structuresIAP_id) == $structuresIAP->id ? 'selected' : '' }}>
                            {{ $structuresIAP->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-5">
                <p class="h6">Nom</p>
                <input name="name" class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" autocomplete="off" required value="{{ old('name', $domaine->name) }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-2" style="margin-top: 25px">                                     
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="bi bi-journal-check"></i> Enregistrer
                </button>                
                <button type="button" class="btn btn-sm btn-warning" onclick="goBack()"><i class="bi bi-x-lg"></i></button>
            </div>
        </div>
    </form>
</div>
    @else
    <div class="title">
        <h1>Ajouter un domaine</h1>
    </div>
    
    <div id="add_edit_div">
        <form action="{{ route('domaines.store') }}" method="POST">
            @csrf
            <div class="row d-flex justify-content-center align-items-center">
        <div class="col-5">
            <p class="h6">Structure IAP</p>
            <select name="structuresIAP_id" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                @foreach ($structuresIAPs as $structuresIAP)
                    <option value="{{ $structuresIAP->id }}" {{ old('structuresIAP_id') == $structuresIAP->id ? 'selected' : '' }}>
                        {{ $structuresIAP->name }}
                    </option>
                @endforeach           
            </select>            
        </div>
        <div class="col-5">
            <p class="h6">Nom</p>
            <input name="name" class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" autocomplete="off" required value="{{old('name')}}">
            @error('name')
                <small class="text-danger">{{$message}}</small>               
            @enderror
        </div>
    <div class="col-2">
        <button type="submit" class="btn btn-sm btn-success" name="ajouter" style="margin-top: 25px">
            <i class="bi bi-journal-plus"></i> Ajouter
        </button>
    </div>
</div>
</div>
</form>
    @endif
    
    @if ($domaines->isEmpty())
        <p class="h3 text-center my-3">Aucun domaine trouvé.</p>
        @else
        <div class="d-flex">
            <div class="col">
                <div class="title">
                    <h1>Liste des domaines</h1>
                </div>
            </div>
            <form method="POST" action="{{ route('domaines.searchDomaine') }}">
                @csrf
                <div class="col d-flex">
                    <select style="width: 210px" id="type_recherche" class="form-select form-select-sm flex-grow-1 me-2" aria-label=".form-select-sm example" required onchange="rechercheDomaine()">
                        <option selected disabled value="">-- Choisissez une option --</option>
                        <option value="structure">Par structure IAP</option>
                        <option value="nameee">Par nom</option>             
                    </select> 
                    <div style="width: 450px">
                        <select disabled id="decoy" class="form-select form-select-sm" aria-label=".form-select-sm example" required></select>
                        <select hidden disabled id="structure" name="structuresIAP_id" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                            <option selected value="">-- Choisissez une structure IAP --</option>
                            @foreach ($structuresIAPs as $structuresIAP)
                                <option value="{{ $structuresIAP->id }}">
                                    {{ $structuresIAP->name }} 
                                </option>
                            @endforeach
                        </select>          
                        <input hidden disabled name="name" id="nameee" placeholder="Domaine" class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                    <button type="submit" name="recherche" class="btn btn-sm btn-warning mx-1">
                        <i class="bi bi-search"></i> 
                    </button>
                </div>
            </form>
        </div>
    
    <div class="table-responsive">
    <table class="table table-sm table-dark table-bordered table-striped table-hover">

        <tr>            
            <th>Structure IAP</th>
            <th>Nom</th>
            <th style="text-align: center;">Options</th>
        </tr>
        @foreach ($domaines as $domaine)
        <tr>
            <td>{{$domaine->structuresIAP->name}}</td>
            <td>{{$domaine->name}}</td>
            <td>
                <div class="d-flex justify-content-center align-items-center">
                <form action ="{{route('domaines.edit', $domaine->id)}}" method="GET">
                    @csrf
                   <button class="btn btn-sm btn-warning mx-1" name="modifier">
                    <i class="bi bi-pencil-square"></i>
                   </button>
                    </form> 
                     
                <form action ="{{route('domaines.destroy', $domaine->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm btn-warning mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal{{$domaine->id}}">
                        <i class="bi bi-trash3-fill"></i>
                      </button>
                    </form>
                </div> 
            </td>
        </tr>

        <div class="modal fade" id="exampleModal{{$domaine->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Désactivation</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Voulez-vous vraiment désactiver {{$domaine->name}} ({{$domaine->structuresIAP->name}})?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                  <form action ="{{route('domaines.destroy', $domaine->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                  <button type="submit" class="btn btn-warning">Oui</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
    @endforeach
    </table>
    </div>

    <div class="paginator">
        {{ $domaines->links() }}
    </div>
    @endif
</x-master>
