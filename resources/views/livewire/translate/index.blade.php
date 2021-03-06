<main class="body-content">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" integrity="sha512-l7qZAq1JcXdHei6h2z8h8sMe3NbMrmowhOl+QkP3UhifPpCW2MC4M0i26Y8wYpbz1xD9t61MLT9L1N773dzlOA==" crossorigin="anonymous" />
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-1">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-4 col-sm-12 d-flex justify-content-start align-items-center" >
                            <h5 class="mb-0 ps-4">{{ translate('Translate Webpages') }}</h5>
                        </div>
                        <div class="col-md-8 col-sm-12 text-center p-1 pe-4 "  >
                            <input class="col-md-5 form-control" id='word'  wire:model="word" name='word' 
                                        Placeholder="{{ __('pages.SearchPlaceholder')}}"
                                        />              
                        </div>
                    </div>
                </div>
                <div class="card-body py-0">
                    <div class="table-responsive row">
                        <hr class="my-2" />
                        <!-- #################################### -->
                        <div class="col-12 text-right d-flex justify-content-center align-items-start t-lg-0" >
                            
                            <table class="col-12 align-items-center mb-0" 
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
                                            fran??ais
                                        </th>
                                        <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-2">
                                            ????????
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
                                            <a href="#" class="mx-1 ms-2" data-bs-toggle="tooltip"
                                                data-bs-original-title="register translate for this words"
                                                data-id='{{$row->strkey}}'
                                                wire:click.prevent="$emit('ShowTranslateModal', '<?php echo urlencode( $row->strkey); ?>')"
                                                >
                                                <i class="fa fa-edit text-secondary"></i>
                                            </a>

                                            <a href="#" class="mx-1 me-2" data-bs-toggle="tooltip"
                                                data-bs-original-title="delete this words"
                                                data-id='{{$row->strkey}}'
                                                onclick="ConfirmFunction('{{ translate('Are you sure to delete this word?')}}', deleteAppWord, '{{$row->strkey}}')"
                                                >
                                                <i class="fa fa-trash text-secondary"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>    
                           
                        </div>
                        <hr class="my-2" />
                        <!-- #################################### -->
                        <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-3">
                                @include('livewire.pagination')
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Translate Course Modal -->
@livewire('modal.translateapp-modal')
<script>
    function deleteAppWord(del_strkey)
    {
        window.livewire.emit('deleteAppWord', del_strkey);
    }
</script>
</main>
