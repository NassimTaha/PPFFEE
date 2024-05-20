<x-masterAdmin title="Stages">
    <div>
        <a href="{{route('stages.searchStages')}}" class="btn btn-danger my-2">
            <i class="bi bi-arrow-left"></i> Retour
        </a>
    </div>
    @if ($stages->isEmpty())
        <p class="h2 text-center my-3">Aucun stage trouvé.</p>
    @else
    <p style="font-family: Montserrat" class="h2">Nombre de stages : {{$nbr_stages}} </p>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table table-sm table-bordered border-secondary">                  
                <tr>
                    <th class='table-dark'>Structure d'affectation</th>
                    @foreach ($stages as $key => $stage)
                        @if ($key % 2 == 0)
                            <td class="table-light">{{$stage->structureAffectation->name}}</td>
                        @else
                            <td class='table-warning'>{{$stage->structureAffectation->name}}</td>
                        @endif 
                    @endforeach                    
                </tr>
                <tr>
                    <th class='table-dark'>Encadrant</th>
                    @foreach ($stages as $key => $stage)
                        @if ($key % 2 == 0)
                            <td class="table-light">{{$stage->encadrant->last_name}} {{$stage->encadrant->first_name}}</td>
                        @else
                            <td class='table-warning'>{{$stage->encadrant->last_name}} {{$stage->encadrant->first_name}}</td>
                        @endif 
                    @endforeach                     
                </tr>
                <tr>
                    <th class='table-dark'>Type de stage</th>
                    @foreach ($stages as $key => $stage)
                        @if ($key % 2 == 0)
                            <td class="table-light">{{ $stage->stage_type === 'pfe' ? 'Projet fin d\'étude' : 'Stage immersion' }}</td>
                        @else
                            <td class='table-warning'>{{ $stage->stage_type === 'pfe' ? 'Projet fin d\'étude' : 'Stage immersion' }}</td>
                        @endif 
                    @endforeach                     
                </tr>
                <tr>
                    <th class='table-dark'>Date début</th>
                    @foreach ($stages as $key => $stage)
                        @if ($key % 2 == 0)
                            <td class="table-light">{{$stage->start_date}}</td>
                        @else
                            <td class='table-warning'>{{$stage->start_date}}</td>
                        @endif 
                    @endforeach                     
                </tr>
                <tr>
                    <th class='table-dark'>Date fin</th>
                    @foreach ($stages as $key => $stage)
                        @if ($key % 2 == 0)
                            <td class="table-light">{{$stage->end_date}}</td>
                        @else
                            <td class='table-warning'>{{$stage->end_date}}</td>
                        @endif 
                    @endforeach                     
                </tr>
                <tr>
                    <th class='table-dark'>Établissement</th>
                    @foreach ($stages as $key => $stage)
                        @if ($key % 2 == 0)
                            <td class="table-light">{{$stage->etablissement->name}} ({{$stage->etablissement->wilaya}})</td>
                        @else
                            <td class='table-warning'>{{$stage->etablissement->name}} ({{$stage->etablissement->wilaya}})</td>
                        @endif 
                    @endforeach                     
                </tr>
                <tr>
                    <th class='table-dark'>Niveau</th>
                    @foreach ($stages as $key => $stage)
                        @if ($key % 2 == 0)
                            <td class="table-light">{{$stage->level}}</td>
                        @else
                            <td class='table-warning'>{{$stage->level}}</td>
                        @endif 
                    @endforeach                     
                </tr>
                <tr>
                    <th class='table-dark'>Domaine</th>
                    @foreach ($stages as $key => $stage)
                        @if ($key % 2 == 0)
                            <td class="table-light">{{$stage->specialite->domaine->name}}</td>
                        @else
                            <td class='table-warning'>{{$stage->specialite->domaine->name}}</td>
                        @endif 
                    @endforeach                     
                </tr> 
                <tr>
                    <th class='table-dark'>Spécialité</th>
                    @foreach ($stages as $key => $stage)
                        @if ($key % 2 == 0)
                            <td class="table-light">{{$stage->specialite->name}}</td>
                        @else
                            <td class='table-warning'>{{$stage->specialite->name}}</td>
                        @endif 
                    @endforeach                     
                </tr>       
                <tr>
                    <th class='table-dark'>Thème</th>
                    @foreach ($stages as $key => $stage)
                        @if ($key % 2 == 0)
                            <td class="table-light">{{$stage->theme}}</td>
                        @else
                            <td class='table-warning'>{{$stage->theme}}</td>
                        @endif 
                    @endforeach                     
                </tr>  
                <tr>
                    <th class='table-dark'>Jours de réception</th>
                    @foreach ($stages as $key => $stage)
                        @if ($key % 2 == 0)
                            <td class="table-light">{{$stage->reception_days}}</td>
                        @else
                            <td class='table-warning'>{{$stage->reception_days}}</td>
                        @endif 
                    @endforeach                     
                </tr>  
                <tr>
                    <th class='table-dark'>Stagiares</th>
                    @foreach ($stages as $key => $stage)
                    @if ($key % 2 == 0)
                        <td class="table-light">
                            @foreach ($stage->stagiaires as $stagiaire)    
                                {{ $stagiaire->last_name }} {{ $stagiaire->first_name }}<br>
                            @endforeach 
                        </td>
                    @else
                    <td class='table-warning'>
                        @foreach ($stage->stagiaires as $stagiaire)    
                            {{ $stagiaire->last_name }} {{ $stagiaire->first_name }}<br>
                        @endforeach 
                    </td>
                    @endif
                    @endforeach                     
                </tr>          
                <tr>
                    <th class='table-dark'>Stage clôturé </th>
                    @foreach ($stages as $key => $stage)
                        @if ($key % 2 == 0)
                        <td class="table-light" style="text-align: center;">
                            @if ($stage->cloture === 1)
                            <button class="btn btn-sm btn-success">
                                <i class="bi bi-check-circle-fill"></i> Oui
                            </button>      
                            @else
                            <button class="btn btn-sm  btn-danger">
                                <i class="bi bi-x-circle-fill"></i> Non
                            </button>
                            @endif
                        </td>                                            
                        @else
                        <td class="table-warning" style="text-align: center;">
                            @if ($stage->cloture === 1)
                            <button class="btn btn-sm btn-success">
                                <i class="bi bi-check-circle-fill"></i> Oui
                            </button>
                            @else
                            <button class="btn btn-sm btn-danger">
                                <i class="bi bi-x-circle-fill"></i> Non
                            </button>
                            @endif
                        </td>                                                
                        @endif 
                    @endforeach                     
                </tr>  
                
                
            </table>
        </div>        
    </div>
    @endif
    <div class="paginator">
        {{ $stages->links() }}
    </div>
</x-masterAdmin>