<main class="body-content">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" integrity="sha512-l7qZAq1JcXdHei6h2z8h8sMe3NbMrmowhOl+QkP3UhifPpCW2MC4M0i26Y8wYpbz1xD9t61MLT9L1N773dzlOA==" crossorigin="anonymous" />
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-4 col-sm-6 d-flex justify-content-start align-items-center" >
                            <h5 class="mb-0">{{ translate('Translate') }}</h5>
                        </div>
                        <div class="col-md-8 col-sm-6  text-center p-1"  >
                            <div style='min-height:60px;'>
                                                                <A HREF="{{ ENV('ADVERTISE1_LINK') }}">
                                <IMG SRC="{{ ASSET('UPLOADS/' . ENV('ADVERTISE1_URL'))}}"
                                    STYLE="WIDTH:100%; HEIGHT:100%;"
                                    />
                                </A>                                

                            </div>                        
                        </div>
                        <div class="col-md-1 col-sm-6 d-flex justify-content-start align-items-center" >
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3">
                    <div class="d-flex justify-content-between align-items-center">
                                @include('livewire.pagination')
                            </div>
                    <div class="table-responsive row">
                        <!-- #################################### -->
                        <div class="col-md-12 col-sm-6 text-right d-flex justify-content-center align-items-start" >
                            
                            <table class="col-md-12 col-sm-6 align-items-center mb-0" 
                                id='all-words-table' style="display:table;min-height:42vh;">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ translate('ID')}}
                                        </th>
                                        <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-2">
                                            english
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            français
                                        </th>
                                        <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-2">
                                            عربي
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ translate('Action')}}
                                        </th>
                                    </tr>
                                </thead>
                                <?php $num = $perPage * ($pagination->currentPage()-1) + 1; ?>
                                <tbody>
                                @foreach($pagination as $row)
                                    <tr>
                                        <td class="text-center">
                                            <div> <p class="text-xs font-weight-bold mb-0"> {{$num++}}</p></div>
                                        </td>
                                        <td class="text-left" style='width:25%'>
                                            <div class='cell'>
                                                <p class="text-xs font-weight-bold mb-0">{{!empty($row->en) ? $row->en : $row->strkey}}</p>
                                            </div>
                                        </td>
                                        <td class="text-center" style='width:25%'>
                                            <div class='cell'>
                                                <p class="text-xs font-weight-bold mb-0">
                                                {{$row->fr}}</p></div>
                                        </td>
                                        <td class="text-right" style='width:25%'>
                                            <div class='cell'>
                                                <p class="text-xs font-weight-bold mb-0">
                                                {{$row->ar}}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="text-center text-xs">
                                            <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                data-bs-original-title="mark as read"
                                                data-id='{{$row->strkey}}'
                                                wire:click.prevent="$emit('ShowTranslateModal', '{{$row->strkey}}')"
                                                >
                                                <i class="fa fa-edit text-secondary"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>    
                           
                        </div>
                        <!-- #################################### -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Translate Material Modal -->
@livewire('modal.translateapp-modal')

</main>
