 <main class="body-content">
   <div class="container-fluid py-4">
     <div class="row mt-4">
       <div class="col-md-12 mb-lg-0 mb-4">
         <div class="card">
           <div class="card-header">
             <div class="row">
               <div class="col-md-3 col-sm-6">
                 <h4 class="title">{{ translate('Search Results')}}</h4>
                 <div>Previous filters : {{$filter}} </div>
               </div>
               <div class="col-md-9 col-sm-6 p-1 d-none d-md-block" >
                      <a href="{{ env('ADVERTISE1_LINK') }}">
                          <img src="{{ asset('uploads/' . env('ADVERTISE1_URL'))}}"
                              class="w-100"        
                              />
                          </a>
                      </div>
             </div>
           </div>
           <div class="card-body">
             <div class="row">
               <div class="card-body col-md-9 col-sm-12 p-3">
                 @if( !empty($pagination) && count($pagination)>0 )
                 <!-- select page show & pagenation -->
                 <div class="d-flex justify-content-between align-items-center">
                   @include('livewire.pagination')
                 </div> 
                 <ul class="list-group">
                   @foreach($pagination as $row)
                   <li class="list-group-item border-0 d-flex p-3 mb-2 bg-gray-100 border-radius-lg w-100">
                     <div class="d-flex flex-column w-100">
                       <a href="{{ route('course-download', $row->id)}}">
                         <span class="text-dark ">{{ count($row->lang)>0 ? $row->lang[0]->title : $row->title }} </span> </a>
                       <div class="mt-2 mb-1 d-flex align-items-center justify-content-between">
                         <div class="d-flex flex-sm-row flex-column  align-items-sm-center align-items-start gx-3">
                           <span class="text-xs pe-3">By: <a href="#" class="text-dark font-weight-bold">{{ $row->creator->name }}</a></span>
                           <span class="text-xs pe-3">Date: <span class="text-dark font-weight-bold">{{ date('d/m/Y', strtotime($row->created_at)) }}</span></span>
                           <span class="text-xs pe-3">File: <span class="text-dark font-weight-bold"> {{ filetypename($row->filetype) }} {{size($row->filesize)}}</span></span>
                         </div>
                         <div class="d-flex flex-sm-row flex-column  align-items-sm-center align-items-start gx-3">
                           @if($row->created_by==Auth::id())
                          <span data-bs-toggle="tooltip" data-bs-original-title="{{translate('add this file to a collection')}}" 
                              class="mx-1" data-id='{{$row->id}}' 
                              wire:click.prevent="$emit('ShowModal', '{{$row->id}}')">
                            <i class="cursor-pointer fas fa-bookmark text-secondary"></i>
                          </span>
                          @endif
                          <span data-bs-toggle="tooltip" 
                              data-bs-original-title="{{translate('view this user profile.')}}" 
                              class="mx-1" data-id='{{$row->id}}' 
                              onclick="javascript:location.href='{{route('user-profile', 'user_id='.$row->created_by)}}'"
                              >
                            <i class="cursor-pointer fa fa-user text-secondary"></i>
                          </span>
                         </div>
                       </div>
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
                 <div class="d-flex justify-content-center">
                   <button class="btn btn-secondary px-5" onclick="history.back(-1);">{{translate('Back')}}</button>
                 </div>
               </div>
               <div class="col-md-3 d-none d-lg-block">
                        <a href="{{ env('ADVERTISE3_LINK') }}">
                            <img src="{{ asset('uploads/' . env('ADVERTISE3_URL'))}}"
                                class="w-100"
                                />
                            </a>
                        </div>
             </div>
           </div>

         </div>
       </div>

     </div>
   </div>

   @livewire('modal.collectionadd-modal')
 </main>

 <script>
   console.log('{{$perPage}}');
 </script>