<main class="body-content">
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-3 col-sm-6 d-flex justify-content-start align-items-center" >
                            <h5 class="mb-0">{{ translate('Collection Files') }}</h5>
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
                    <div class="row">
                        <!-- #################################### -->
                        <div class="col-md-9 col-sm-6 text-right d-flex justify-content-start flex-column align-items-start" >
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="pe-3 text-muted">
                                    {{ translate('Collection Name') }}
                                </div>
                                <div class="pe-3 text-gray-700">
                                    {{ $collection->collection_name }}
                                </div>
                            </div>
                            <div class="row table-responsive w-100">
                            <div class="col-md-12">
                            <table class="table align-items-center mb-0" id='all-course-table'>
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ translate('ID')}}
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ translate('File Title')}}
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ translate('Course')}}
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
                                    <?php $i=1 ?>
                                    @foreach($search_result as $row)
                                    <tr>
                                        <td class="ps-4 text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$i++}}</p>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{mat_lang($row->mat)!=null ? mat_lang($row->mat)->title : $row->mat->title}}</p>
                                            </div>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0">
                                            {{ ln($row->mat->training)}} <br> {{ ln($row->mat->faculty) }} <br> {{  ln($row->mat->specialization) }} <br> {{  ln($row->mat->course) }}
                                            </p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $row->created_at }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span  data-bs-toggle="tooltip" 
                                                    data-bs-original-title="{{translate('delete this course file')}}"
                                                    class="mx-1" 
                                                    collection-id='{{$collection->id}}' mat-id='{{$row->mat->id}}'
                                                    onclick="ConfirmFunction('{{translate('Are you sure?')}}', deleteCollectionFile, '{{$row->id}}')">
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>    
                            </div>
                            </div>
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
                            <!-- onclick="$('#collectionModal').modal('show');"  -->
                            <button onclick="location.href='{{route('search', 'collection_id='.$collection->id)}}'"
                                    class="btn btn-primary btn-sm mb-1 mx-2" type="button">{{translate('New')}}</button>
                            <button onclick="history.back(-1);" 
                                    class="btn btn-secondary btn-sm mb-1 mx-2" type="button">{{translate('Back')}}</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</main>
<script>
    function deleteCollectionFile(del_id)
    {
        window.livewire.emit('deleteCollectionFile', del_id);
    }
</script>

