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
                    ADS SPOT EXAMPLE
                </div>
            </div>
           </div>
           <div class="row">
              <div class="card-body col-md-9 col-sm-6 p-3">
                @if( !empty($search_result) && is_array($search_result) && count($search_result)>0 )
                <!-- select page show & pagenation -->
                <div class="d-flex justify-content-between align-items-center">
                  <div class="form-group d-flex align-items-center">
                    <label class="d-inline me-3">Views</label>
                    <select class="form-control">
                      <option value="20" selected>20</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select>
                  </div>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                      <li class="page-item disabled">
                        <a class="page-link" href="javascript:;" tabindex="-1">
                          <i class="fa fa-angle-left"></i>
                          <span class="sr-only">Previous</span>
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="javascript:;">1</a></li>
                      <li class="page-item active"><a class="page-link" href="javascript:;">2</a></li>
                      <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:;">
                          <i class="fa fa-angle-right"></i>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
                <ul class="list-group">
                  @foreach($search_result as $row)
                  <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                    <div class="d-flex flex-column">
                      <a href="{{ route('course-download', 1)}}">
                        <span class="text-dark ">The Title for Course X goes here and in case it has more than first line
                          we need to hide... </span> </a>
                      <div class="mt-2 mb-1 row">
                        <span class="text-xs col-md-4 col-sm-6">By: <a href="#" class="text-dark font-weight-bold">useranmesssssss</a></span>
                        <span class="text-xs col-md-4 col-sm-6">Date: <span class="text-dark font-weight-bold">11/11/2021</span></span>
                        <span class="text-xs col-md-4 col-sm-6">data: <span class="text-dark font-weight-bold">zip 5.15MB</span></span>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
                <!-- select page show & pagenation -->
                <div class="d-sm-flex justify-content-between align-items-center">
                  <div class="form-group d-flex align-items-center">
                    <label class="d-inline me-3">Views</label>
                    <select class="form-control">
                      <option value="20" selected>20</option>
                      <option value="50">50</option>
                      <option value="100">100</option>

                    </select>
                  </div>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                      <li class="page-item disabled">
                        <a class="page-link" href="javascript:;" tabindex="-1">
                          <i class="fa fa-angle-left"></i>
                          <span class="sr-only">Previous</span>
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="javascript:;">1</a></li>
                      <li class="page-item active"><a class="page-link" href="javascript:;">2</a></li>
                      <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:;">
                          <i class="fa fa-angle-right"></i>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
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