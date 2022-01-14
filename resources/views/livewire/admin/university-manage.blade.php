<div class="container-fluid py-4 body-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Universities</h5>
                        </div>
                         <!-- Search TextBox row -->
                        <div class="col-md-6 col-sm-6">
                                <!-- <label class="col-md-1 sm-hide" for='word'>{{ translate('Search')}}</label> -->
                                <input class="col-md-5 form-control" id='word'  wire:model="word" name='word' 
                                    Placeholder="{{ __('pages.SearchPlaceholder')}}"
                                    />
                            
                        </div>
                        <!-- End TextBox Box row -->
                        <!-- <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">{{translate('New')}}</a> -->
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    
                    <hr />
                    <div class="table-responsive p-0" style='min-height:50vh'>
                        <table class="align-items-center mb-0 w-100">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('ID') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ENGLISH
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        FRANÇAIS'
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        عربي	
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('town') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('Creation Date') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="min-width:80px;">
                                        {{ translate('Action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pagination as $university)
                                <tr>
                                    <td class="text-center pe-1">
                                        <p class="text-xs font-weight-bold mb-0">{{$university->id}}</p>
                                    </td>
                                    <td class="text-left pe-1 ">
                                        <p class="text-xs font-weight-bold mb-0">{{$university->en}}</p>
                                    </td>
                                    <td class="text-center pe-1" style="overflow-wrap: anywhere;">
                                        <p class="text-xs font-weight-bold mb-0">{{$university->fr}}</p>
                                    </td>
                                    <td class="text-right pe-1">
                                        <p class="text-xs font-weight-bold mb-0">{{$university->ar}}</p>
                                    </td>
                                    <td class="text-center pe-1">
                                        <span class="text-secondary text-xs font-weight-bold">{{$university->town}}</span>
                                    </td>
                                    <td class="text-center pe-1">
                                        <span class="text-secondary text-xs font-weight-bold">{{ agotime($university->created_at) }}</span>
                                    </td>
                                    <td class="text-center pe-1">
                                        <a href="#" 
                                            class="mx-1" data-bs-toggle="tooltip"
                                            data-bs-original-title="Edit University"
                                            wire:click.prevent="$emit('ShowUniversity', '{{$university->id}}')"
                                            >
                                            <i class="fas fa-school text-secondary"></i>
                                        </a>
                                        <span onclick="ConfirmFunction('{{ translate('Are you sure to delete this university?')}}', deleteUniversity, '{{$university->id}}')">
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                   
                    <hr />
                    <div class="d-flex justify-content-between align-items-center mt-1">
                                @include('livewire.pagination')
                            </div>
                    <div class="d-flex justify-content-center align-items-center">
                                <button class="btn btn-primary"
                                    wire:click.prevent="$emit('ShowUniversity', 0)"
                                    >New University &nbsp;
                                    <i class="fas fa-school text-secondary text-white"></i></button>
                            </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
function deleteUniversity(del_id)
{
    window.livewire.emit('deleteUniversity', del_id);
}
</script>
@livewire('modal.universityedit-modal')

