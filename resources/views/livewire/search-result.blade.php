 <main>
   <div class="container-fluid py-4">
     <div class="row mt-4" >
       <div class="col-md-12 mb-lg-0 mb-4">
         <div class="card">
         <div class="card-header">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                      <h4 class="title">{{ __('pages.Search Results')}}</h4>
                      <div>Previous filters : (training area type), faculty, specialization, level, ... and so on</div>
                </div>
                <div class="col-md-8 col-sm-6" style='background:#C2E2CE; min-height:60px;'>
                    <img src="{{asset('/assets/upload/ads/top1.png')}}" style='width:800px; height:90px;' />
                </div>
            </div>
           </div>
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
              </div>
              <div class="col-md-3 col-sm-6" style='background:#C2E2CE;min-height:50vh;'>
                ADS SPOT EXAMPLE
              </div>
            </div>
         </div>
       </div>

     </div>
   </div>
 </main>