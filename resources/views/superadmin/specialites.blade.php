<x-master title="Spécialités">
    @if(request()->has('modifier'))
    <div class="title">
        <h1>Modifier une spécialité</h1>
    </div>

<div id="add_edit_div">
    <form action="{{ route('specialites.update', $specialite->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-3">
                <p class="h6">Structure IAP</p>
                <select id="structuresIAP_id" name="structuresIAP_id" class="form-select form-select-sm" aria-label=".form-select-sm example" required onchange="selectDomaine()">
                    @foreach ($structuresIAPs as $structuresIAP)
                        <option value="{{ $structuresIAP->id }}" {{ old('structuresIAP_id', $specialite->domaine->structuresIAP_id) == $structuresIAP->id ? 'selected' : '' }}>
                            {{ $structuresIAP->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <p class="h6">Domaine</p>
                <select id="domaine_id" name="domaine_id" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    @foreach ($domaines as $domaine)
                        <option value="{{ $domaine->id }}" {{ old('domaine_id', $specialite->domaine_id) == $domaine->id ? 'selected' : '' }}>
                            {{ $domaine->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <p class="h6">Nom</p>
                <input name="name" class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" autocomplete="off" required value="{{ old('name', $specialite->name) }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-2" style="margin-top: 25px">                                     
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="bi bi-bookmark-check-fill"></i> Enregistrer
                </button>                
                <button type="button" class="btn btn-sm btn-warning" onclick="goBack()"><i class="bi bi-x-lg"></i></button>
            </div>
        </div>
    </form>
</div>
    @else
    <div class="title">
        <h1>Ajouter une spécialité</h1>
    </div>

    <div id="add_edit_div">
        <form action="{{ route('specialites.store') }}" method="POST">
            @csrf
            <div class="row d-flex justify-content-center align-items-center">

        <div class="col-3">
            <p class="h6">Structure IAP</p>
            <select id="structuresIAP_id" name="structuresIAP_id" class="form-select form-select-sm" aria-label=".form-select-sm example" required  onchange="selectDomaine()">
                <option selected disabled value="">-- Choisissez une structure IAP --</option>
                @foreach ($structuresIAPs as $structuresIAP)
                    <option value="{{ $structuresIAP->id }}" {{ old('structuresIAP_id') == $structuresIAP->id ? 'selected' : '' }}>
                        {{ $structuresIAP->name }}
                    </option>
                @endforeach
            </select>
        </div>        
        <div class="col-3">
            <p class="h6">Domaine</p>
            <select id="domaine_id" name="domaine_id" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                <option selected disabled value="">-- Choisissez un domaine --</option>
                @foreach ($domaines as $domaine)
                    <option value="{{ $domaine->id }}" {{ old('domaine_id') == $domaine->id ? 'selected' : '' }}>
                        {{ $domaine->name }} 
                    </option>
                @endforeach           
            </select>            
        </div>
        <div class="col-4">
            <p class="h6">Nom</p>
            <input name="name" class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" autocomplete="off" required value="{{old('name')}}">
            @error('name')
                <small class="text-danger">{{$message}}</small>               
            @enderror
        </div>
    <div class="col-2">
            <button type="submit" class="btn btn-sm btn-success" name="ajouter" style="margin-top: 25px">
                <i class="bi bi-bookmark-plus-fill"></i> Ajouter
            </button>
    </div>
</div>
</div>
</form>
    @endif
   
    @if ($specialites->isEmpty())
        <p class="h3 text-center my-3">Aucune spécialité trouvé.</p>
        @else
        <div class="d-flex">
            <div class="col">
                <div class="title">
                    <h1>Liste des spécialités</h1>
                </div>
            </div>
            <form method="POST" action="{{ route('specialites.searchSpecialite') }}">
                @csrf
                <div class="col d-flex">
                    <select style="width: 210px" id="type_recherche" class="form-select form-select-sm flex-grow-1 me-2" aria-label=".form-select-sm example" required onchange="rechercheSpecialite()">
                        <option selected disabled value="">-- Choisissez une option --</option>
                        <option value="structure">Par structure IAP</option>
                        <option value="domaine">Par domaine</option>
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
                        <select hidden disabled id="domaine" name="domaine_id" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                            <option selected value="">-- Choisissez un domaine --</option>
                            @foreach ($domaines as $domaine)
                                <option value="{{ $domaine->id }}">
                                    {{ $domaine->name }} ({{ $domaine->structuresIAP->name }})
                                </option>
                            @endforeach        
                        <input hidden disabled name="name" id="nameee" placeholder="Spécialité" class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" autocomplete="off" required>
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
            <th>Domaine</th>
            <th>Spécialité</th>
            <th style="text-align: center;">Options</th>
        </tr>
        @foreach ($specialites as $specialite)
        <tr>
            <td>{{$specialite->domaine->structuresIAP->name}}</td>
            <td>{{$specialite->domaine->name}}</td>
            <td>{{$specialite->name}}</td>

            <td>
                <div class="d-flex justify-content-center align-items-center">
                <form action ="{{route('specialites.edit', $specialite->id)}}" method="GET">
                    @csrf
                   <button class="btn btn-sm btn-warning mx-1" name="modifier">
                    <i class="bi bi-pencil-square"></i>
                   </button>
                    </form> 
                      
                <form action ="{{route('specialites.destroy', $specialite->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm btn-warning mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal{{$specialite->id}}">
                        <i class="bi bi-trash3-fill"></i>
                      </button>
                    </form>
                </div> 
            </td>
        </tr>

        <div class="modal fade" id="exampleModal{{$specialite->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Désactivation</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Voulez-vous vraiment désactiver {{$specialite->name}} ? <br>
                  Domaine : {{$specialite->domaine->name}} <br>
                  Structure IAP : {{$specialite->domaine->structuresIAP->name}}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                  <form action ="{{route('specialites.destroy', $specialite->id)}}" method="POST">
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
        {{ $specialites->links() }}
    </div>
    @endif
</x-master>

<script>
    function selectDomaine(){
        var structuresIAP_id = document.getElementById('structuresIAP_id').value;
        var domaines = @json($domaines);
        var select = document.getElementById('domaine_id');
        select.innerHTML = '<option selected disabled value="">-- Choisissez un domaine --</option>';
        domaines.forEach(domaine => {
            if(domaine.structuresIAP_id == structuresIAP_id){
                var option = document.createElement('option');
                option.value = domaine.id;
                option.text = domaine.name;
                select.appendChild(option);
            }
        });
    }
</script>