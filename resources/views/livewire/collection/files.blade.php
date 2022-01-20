<main class="body-content" style="margin-top:{{ empty(Auth::id()) ? '6rem !important;' : '' }}" >
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-3 col-sm-6 d-flex justify-content-start align-items-center" >
                            <h5 class="mb-0">{{ translate('Collection Files') }}</h5>
                        </div>
                        <div class="col-md-9 d-none d-lg-block"  >
                         {!! topAdvertise() !!}
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3 px-0 px-sm-1 px-md-2 px-lg-3">
                    <div class="row">
                        <!-- #################################### -->
                        <div class="col-lg-9 col-sm-12 text-right d-flex justify-content-start flex-column align-items-start tx-0 tx-sm-1 tx-md-2" >
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="px-2 px-sm-3 px-md-3 px-lg-3 text-muted">
                                    {{ translate('Collection Name') }}
                                </div>
                                <div class="px-2 px-sm-3 px-md-3 px-lg-3 text-gray-700 text-dark pt-2">
                                    <h6>{{ $collection->collection_name }}</h6>
                                </div>
                            </div>
                            <div class="row table-responsive w-100 mx-0 mx-sm-1 mx-md-2">
                            <div class="col-md-12">
                            <table class="align-items-center mb-0 w-100" id='all-course-table'>
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ translate('ID')}}
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ translate('Course')}}
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ translate('Description')}}
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
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$i++}}</p>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{mat_lang($row->course)!=null ? mat_lang($row->course)->title : $row->course->title}}</p>
                                            </div>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0">
                                            {{mat_lang($row->course)!=null ? mat_lang($row->course)->description : $row->course->description}}
                                            </p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $row->created_at }}</span>
                                        </td>
                                        <td class="text-center">
                                            <a  data-bs-toggle="tooltip" 
                                                    data-bs-original-title="{{translate('download this course file.')}}"
                                                    class="mx-1" 
                                                    href="{{route('course-download', $row->course->id)}}"
                                                    >
                                                <i class="cursor-pointer fa fa-download text-secondary"></i>
                                            </a>
                                            @if($collection->user_id==Auth::id())
                                            <span  data-bs-toggle="tooltip" 
                                                    data-bs-original-title="{{translate('delete this course file')}}"
                                                    class="mx-1" 
                                                    collection-id='{{$collection->id}}' mat-id='{{$row->course->id}}'
                                                    onclick="ConfirmFunction('{{translate('Are you sure?')}}', deleteCollectionFile, '{{$row->id}}')">
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>    
                            </div>
                            </div>
                        </div>
                        <!-- #################################### -->
                        
                        <div class="col-md-3 text-center d-flex justify-content-start align-items-start d-none d-lg-block">
                                <div class="w-100" style="min-height:50vh;overflow-x:hidden;">
                                    {!! rightAdvertise() !!}
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center py-3">
                            <!-- onclick="$('#collectionModal').modal('show');"  -->
                            @if($collection->user_id==Auth::id())
                            <button onclick="location.href='{{route('search', 'collection_id='.$collection->id)}}'"
                                    class="btn btn-primary btn-sm mb-1 mx-2" type="button">{{translate('New')}}</button>
                            @endif
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

