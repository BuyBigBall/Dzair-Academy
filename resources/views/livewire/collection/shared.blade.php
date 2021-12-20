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
                        <div class="col-md-9 col-sm-6  text-center p-1"  >
                            <div style='min-height:60px;'>
                                <a href="{{ env('ADVERTISE1_LINK') }}">
                                    <img src="{{ asset('uploads/' . env('ADVERTISE1_URL'))}}"
                                        style="width:100%; height:100%;"
                                        />
                                    </a>                                
                            </div>                        
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3">
                    <div class="table-responsive row">
                        <div class="d-flex justify-content-between align-items-center">
                                @include('livewire.pagination')
                            </div>
                        <!-- #################################### -->
                        <div class="col-md-9 col-sm-6 text-right d-flex justify-content-center align-items-start" >
                                <table class="table align-items-center mb-0" id='all-course-table'>
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ translate('ID')}}
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                {{ translate('Collection Name')}}
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ translate('Number of Files')}}
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ translate('Shared Date')}}
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ translate('Action')}}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pagination as $row)
                                        <tr>
                                            <td class="ps-4 text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{$row->coll->id}}</p>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{$row->coll->collection_name}}</p>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                {{ $row->coll->mat!=null ? count($row->coll->mat) : 0}}</p>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $row->created_at }}</span>
                                            </td>
                                            <?php $surl = $row->shre_url; ?>
                                            <td class="text-center">
                                                <a href="{{ route('send-message', !empty($row->coll) && !empty($row->coll->owner) ? $row->coll->owner->email : '')}}" data-bs-toggle="tooltip" 
                                                    data-bs-original-title="{{translate('send message')}}"
                                                    class="mx-1" >
                                                    <i class="cursor-pointer fa fa-copy text-secondary"></i>
                                                </a>
                                                <a href="{{route('collection-files', $row->id)}}" 
                                                    class="mx-1" 
                                                    data-bs-toggle="tooltip"
                                                    data-bs-original-title="collection files"
                                                    >
                                                    <i class="cursor-pointer fas fa-list-ul text-secondary"></i>
                                                </a>
                                                <span  data-bs-toggle="tooltip" data-bs-original-title="{{translate('discard this collection share?')}}"
                                                        class="mx-1" 
                                                        data-id='{{$row->id}}'  onclick="ConfirmFunction('{{translate('discard this collection share?')}}', discardSharedCollection, '{{$row->id}}')">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>    
                            
                        </div>
                        <!-- #################################### -->

                        <div class="col-md-3 col-sm-6 text-center d-flex justify-content-start align-items-start" >
                            <div style='background:#C2E2CE; min-height:50vh;width:98%;'>
                            <a href="{{ env('ADVERTISE3_LINK') }}">
                                <img src="{{ asset('uploads/' . env('ADVERTISE3_URL'))}}"
                                    style="width:100%; height:100%;"
                                    />
                                </a>                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center py-3">
                            <a href="{{ route('message') }}" class="btn btn-primary btn-sm mb-1 mx-2">{{translate('Send Message')}}</a>
                            <button onclick="javascript:history.back(01);" class="btn btn-secondary btn-sm mb-1 mx-2" type="button">{{translate('Back')}}</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<input id='copy_sharekey' type='text' value='' style='position:absolute;left:-100px; top:-100px;' />
<!-- Modal -->
<div class="modal fade" id="collectionModal" tabindex="-1" role="dialog" aria-labelledby="collectionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="collectionModalLabel">{{translate('Collection Information')}}</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">                        
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="user-name" class="form-control-label">{{translate('Collection Name')}}</label>
                            <div class="">
                                <input wire:model="coll_name" class="form-control" type="text" placeholder="{{translate('Name')}}" id="collection-name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="user-email" class="form-control-label">{{translate('Description')}}</label>
                            <div class="">
                                <textarea wire:model="coll_desp" class="form-control" placeholder="{{translate('description')}}" row=3 id="collection-description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user.phone" class="form-control-label">Phone</label>
                            <div class="">
                                <input wire:model="user.phone" class="form-control" type="tel" placeholder="40770888444" id="phone">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user.location" class="form-control-label">University Name</label>
                            <div class="">
                                <input wire:model="user.location" class="form-control" type="text" placeholder="Location" id="name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="about">About Me</label>
                    <div class="">
                        <textarea wire:model="user.about" class="form-control" id="about" rows="3" placeholder="Say something about yourself"></textarea>
                    </div>
                </div> -->
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ 'Cancel' }}</button>
            <button type="button" class="btn btn-primary">{{ 'Save' }}</button>
        </div>
        </div>
    </div>
</main>

<script>
    function discardSharedCollection(del_id)
    {
        window.livewire.emit('discardSharedCollection', del_id);
    }
</script>

