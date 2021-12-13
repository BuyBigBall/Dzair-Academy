 <main>
   <div class="container-fluid py-4">
     <div class="row mt-4" >
       <div class="col-md-12 mb-lg-0 mb-4">
         <div class="card">
         <div class="card-header">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                      <h4 class="title">{{ translate('Search Results')}}</h4>
                      <div>Previous filters : {{$filter}} </div>
                </div>
                <div class="col-md-8 col-sm-6 p-0" style='min-height:60px; overflow:hidden'>
                    <img src="../assets/img/top1.png" style='width:800px; height:92px;' />
                    
                </div>
            </div>
           </div>
           <div class="card-body">
            <div class="row">
                <div class="card-body col-md-9 col-sm-6 p-3">
                  @if( !empty($pagination) && count($pagination)>0 )
                  <!-- select page show & pagenation -->
                  <div class="d-flex justify-content-between align-items-center">
                    @include('livewire.pagination')
                  </div>
                  <ul class="list-group">
                    @foreach($pagination as $row)
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                      <div class="d-flex flex-column">
                        <a href="{{ route('course-download', 1)}}">
                          <span class="text-dark ">{{ count($row->lang)>0 ? $row->lang[0]->title : $row->title }} </span> </a>
                        <div class="mt-2 mb-1 row">
                          <span class="text-xs col-md-4 col-sm-6">By: <a href="#" class="text-dark font-weight-bold">{{ $row->creator->name }}</a></span>
                          <span class="text-xs col-md-4 col-sm-6">Date: <span class="text-dark font-weight-bold">{{ date('d/m/Y', strtotime($row->created_at)) }}</span></span>
                          <span class="text-xs col-md-4 col-sm-6">File: <span class="text-dark font-weight-bold"> {{ filetypename($row->filetype) }} {{size($row->filesize)}}</span></span>
                        </div>
                        
                        <span  data-bs-toggle="tooltip" data-bs-original-title="{{translate('add this file to a collection')}}"
                                class="mx-1" 
                                data-id='{{$row->id}}'  onclick="$('#collectionModal').modal('show');">
                            <i class="cursor-pointer fas fa-bookmark text-secondary"></i>
                        </span>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                  
                  <!-- {{ $pagination->links() }}
                  {{ $pagination->nextPageUrl() }} -->


                  <!-- select page show & pagenation -->
                  <div class="d-sm-flex justify-content-between align-items-center">
                    
                    @include('livewire.pagination')

                  </div>
                  @else
                  <div class="d-sm-flex justify-content-between align-items-center pb-5 mb-3">
                    {{ translate('Could not found results.')}}
                  </div>
                  @endif
                  <div class="col-md-9 d-flex justify-content-center">
                    <button class="btn btn-secondary mx-3" onclick="history.back(-1);">{{translate('Back')}}</button>
                    <!-- <button class="btn btn-primary mx-3" onclick="$('#collectionModal').modal('show');">{{translate('Add to Collection')}}</button> -->
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 p-0" style='min-height:50vh; overflow:hidden;'>
                  <img src='../assets/img/Campaign-banner-image2.png' />
                </div>
              </div>
            </div>

         </div>
       </div>

     </div>
   </div>



<!-- Modal -->
<div
    class="modal fade"
    id="collectionModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="collectionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="collectionModalLabel">{{translate('Select Collection to add this file')}}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <div class="form-group">
                                <label for="user-name" class="form-control-label">{{translate('Collection Name')}}</label>
                                <div class="">
                                    <input
                                        wire:model="coll_name"
                                        class="form-control"
                                        type="text"
                                        placeholder="Name"
                                        id="collection-name" /></div>
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="user-email" class="form-control-label">{{translate('Description')}}</label>
                                    <div class="">
                                        <select
                                            wire:model="collection_id" class="form-control"
                                            placeholder="{{ translate('select collection') }}" size="10"
                                            id="collections">
                                            <!-- <option value=''>{{ translate('select collection') }}</option> -->
                                            @foreach($collection_options as $row)
                                              <option value='{{ $row->id }}'> {{ $row->collection_name }}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ 'Cancel' }}</button>
                <button type="button" class="btn btn-primary">{{ 'Add' }}</button>
            </div>
        </div>
    <!-- </div> -->
</div>       
 </main>

 <script>
   console.log('{{$perPage}}');
 </script>