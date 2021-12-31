<main class="body-content">
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-3 col-sm-6 d-flex justify-content-start align-items-center" >
                            <h5 class="mb-0">{{ translate('User Collection List') }}</h5>
                        </div>
                        <div class="col-md-9 col-sm-6 text-center p-1 d-none d-lg-block"  >
                            <div style='min-height:60px;'>
                            <a href="{{ env('ADVERTISE1_LINK') }}">
                                <img src="{{ asset('uploads/' . env('ADVERTISE1_URL'))}}"
                                    class="w-100"   
                                    />
                                </a>                                
                            </div>                        
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3">
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center">
                            @include('livewire.pagination')
                        </div>
                        <!-- #################################### -->
                        <div class="table-responsive  col-md-12 col-lg-9 text-right d-flex justify-content-center align-items-start" 
                            style="min-height:30vh;"
                            >
                                <table class="align-items-center mt-3 w-100" id='all-course-table'>
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ translate('ID')}}
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ translate('Collection Name')}}
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ translate('Number of Files')}}
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ translate('Added Date')}}
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ translate('Action')}}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pagination as $row)
                                        <tr>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{$row->id}}</p>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{$row->collection_name}}</p>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                {{ $row->mat!=null ? count($row->mat) : 0}}</p>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $row->created_at }}</span>
                                            </td>
                                            <?php $skey = $row->publish_key ? $row->publish_key : str_replace('/', '', str_replace('$', '', Illuminate\Support\Facades\Hash::make($row->id))); ?>
                                            <td class="text-center">
                                                <span  data-bs-toggle="tooltip" 
                                                    wire:click="$emit('share_url', '{{$row->id}}', '{{$skey}}')"
                                                    onclick="shareme( '{{route('collection-shares', $skey )}}' )"
                                                    data-bs-original-title="{{translate('copy shared url')}}"
                                                    class="mx-1" >
                                                    <i class="cursor-pointer fa fa-copy text-secondary"></i>
                                                </span>
                                                <a href="javascript:" 
                                                    class="mx-1" 
                                                    wire:click.prevent="$emit('editCollection', '{{$row->id}}')"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-original-title="edit collection"
                                                    data-id='{{$row->id}}' 
                                                    >
                                                    <i class="fa fa-edit text-secondary"></i>
                                                </a>
                                                <!-- <span data-bs-toggle="tooltip" data-bs-original-title="{{translate('collection files')}}"
                                                    class="mx-1" 
                                                    data-id='{{$row->id}}' > -->
                                                <a href="{{route('collection-files', $row->id)}}" 
                                                    class="mx-1" 
                                                    data-bs-toggle="tooltip"
                                                    data-bs-original-title="collection files"
                                                    >
                                                    <i class="cursor-pointer fas fa-list-ul text-secondary"></i>
                                                </a>
                                                <span  data-bs-toggle="tooltip" data-bs-original-title="{{translate('delete this collection')}}"
                                                        class="mx-1" 
                                                        data-id='{{$row->id}}'  onclick="ConfirmFunction('{{ translate('Are you sure to delete this collection?')}}', deleteCollection, '{{$row->id}}')">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>    
                            
                        </div>
                        <!-- #################################### -->
                        
                        <div class="col-md-3 col-sm-6 text-center d-flex justify-content-start align-items-start d-none d-lg-block" >
                            <div style='min-height:50vh;width:98%;'>
                                <a href="{{ env('ADVERTISE3_LINK') }}">
                                    <img src="{{ asset('uploads/' . env('ADVERTISE3_URL'))}}"
                                    class="w-100"
                                        />
                                    </a>                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center py-3">
                            <!-- <button onclick="$('#collectionModal').modal('show');" class="btn btn-primary btn-sm mb-1 mx-2" type="button">{{translate('New')}}</button> -->
                            <button wire:click.prevent="$emit('doShow')" class="btn btn-primary btn-sm mb-1 mx-2" type="button">{{translate('New')}}</button>
                            <button onclick="javascript:history.back(01);" class="btn btn-secondary btn-sm mb-1 mx-2" type="button">{{translate('Back')}}</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<input id='copy_sharekey' type='text' value='' style='position:absolute;left:-100px; top:-100px;' />
    @livewire('modal.editcollection-modal') 
</main>

<script>
    function shareme(share_url)
    {
        document.getElementById("copy_sharekey").value=share_url;
        document.getElementById("copy_sharekey").select();
        document.execCommand('copy');
        alert("you can share this collection as following url: \r\n" + document.getElementById("copy_sharekey").value);
    }
        
    function deleteCollection(del_id)
    {
        window.livewire.emit('deleteCollection', del_id);
    }
</script>