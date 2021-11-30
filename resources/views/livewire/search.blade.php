 <main>
   <div class="container-fluid py-4">
     <div class="row">
       <div class="col-md-12">
         <div class="card">
           <div class="card-header">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                          <h4 class="title">{{ __('pages.Find A Course')}}</h4>
                    </div>
                    <div class="col-md-8 col-sm-6" style='background:#C2E2CE; min-height:60px;'>
                        ADS SPOT EXAMPLE
                    </div>
                </div>
           </div>
           <div class="card-body p-3">
             <form action="{{ route('search-result') }}" method="post">
               @csrf
              <div class="row">
                  <div class="col-md-9 col-sm-6">
                    
                    <!-- Search Box row -->
                    <div class="row"> 
                      <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                          <label class="sm-hide">{{ __('pages.traning')}}</label>
                          <select class="form-control"   wire:model="training" name='training'>
                            <option>{{ __('pages.seltraining')}}</option>
                              @foreach($training_options as $val)
                              <option value="{{ $val['id'] }}">{{ $val[lang()] }}</option>
                              @endforeach
                            </select>

                          </select>
                        </div>

                      </div>
                      <div class="col-md-2 col-sm-6">
                        <div class="form-group">
                          <label class="sm-hide">{{ __('pages.Faculty')}}</label>
                          <select class="form-control"  wire:model="faculty" name='faculty'>
                              <option>{{ __('pages.selfaculty')}}</option>
                              @foreach($faculty_options as $val)
                              <option value="{{ $val['id'] }}">{{ $val[lang()] }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-6">
                        <div class="form-group">
                          <label class="sm-hide">{{ __('pages.Specialization')}}</label>
                          <select class="form-control" wire:model="specialization" name='specialization'>
                            <option>{{ __('pages.selspecia')}}</option>
                              @foreach($specialization_options as $val)
                              <option value="{{ $val['id'] }}">{{ $val[lang()] }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-6">
                        <div class="form-group">
                          <label class="sm-hide">{{ __('pages.Level')}}</label>
                          <select class="form-control" wire:model="level" name='level'>
                            <option>{{ __('pages.sellevel')}}</option>
                              @foreach($level_options as $val)
                              <option value="{{ $val}}">{{ $val }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                          <label class="sm-hide">{{ __('pages.course')}}</label>
                          <select class="form-control" wire:model="course" name='course'>
                            <option>{{ __('pages.selcourse')}}</option>
                              @foreach($course_options as $val)
                              <option value="{{ $val['id'] }}">{{ $val[lang()]  }}</option>
                              @endforeach
                          </select>                        
                        </div>
                      </div>
                    </div>
                    <!-- End Search Box row -->

                    <!-- Search TextBox row -->
                    <div class="row"> 
                      <div class="col-md-8 col-sm-6">
                        <div class="form-group">
                          <label class="sm-hide">{{ __('pages.Searchkey')}}</label>
                          <input class="form-control"   wire:model="word" name='word' 
                              Placeholder="{{ __('pages.SearchPlaceholder')}}"
                            />
                        </div>
                      </div>
                    </div>
                    <!-- End TextBox Box row -->
                    
                    <!-- Check Box row -->
                    <div class="row col-md-10 col-sm-6  px-3">
                      <div class="col-md-3 col-sm-6 ">
                          <div class="form-check">
                              <input class="form-check-input crstype all" type="checkbox" value="" 
                                  id="course_all" checked=""/>
                              <label class="custom-control-label" for="course_all">all categories</label>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-2 ">
                          <div class="form-check">
                              <input
                                  class="form-check-input crstype"
                                  type="checkbox"
                                  value=""
                                  id="courses"
                                  name="cate_course"
                                  checked=""/>
                              <label class="custom-control-label" for="courses">courses</label>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-2 ">
                          <div class="form-check">
                              <input
                                  class="form-check-input  crstype"
                                  type="checkbox"
                                  value=""
                                  id="exercises"
                                  name="cate_exercise"
                                  checked=""/>
                              <label class="custom-control-label" for="exercises">Exercises</label>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-2 ">
                          <div class="form-check">
                              <input class="form-check-input  crstype" 
                                  type="checkbox" value="" id="exams" 
                                  name="cate_exam"
                                  checked=""/>
                              <label class="custom-control-label" for="exams">Exams</label>
                          </div>
                      </div>
                    </div>                    
                    <!-- End Check Box row -->

                    <!-- Check Box row 2-->
                    <div class="row col-md-10 col-sm-6  px-3">
                      <div class="col-md-3 col-sm-6 ">
                        <div class="form-check">
                            <input class="form-check-input mattype all" type="checkbox" 
                                value="" id="material_all" checked=""/>
                            <label class="custom-control-label" for="material_all">all file types</label>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-2 ">
                          <div class="form-check">
                              <input
                                  class="form-check-input mattype "
                                  type="checkbox"
                                  value=""
                                  name="filetype_docs"
                                  id="docs"
                                  checked=""/>
                              <label class="custom-control-label" for="docs">Documents</label>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-2 ">
                          <div class="form-check">
                              <input
                                  class="form-check-input mattype "
                                  type="checkbox"
                                  value=""
                                  name="filetype_images"
                                  id="imgs"
                                  checked=""/>
                              <label class="custom-control-label" for="imgs">Images/Videos</label>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-2 ">
                          <div class="form-check">
                              <input class="form-check-input mattype" type="checkbox" 
                                  value="" id="archives" 
                                  name="filetype_archives"
                                  checked=""/>
                              <label class="custom-control-label" for="archives">Archives</label>
                          </div>
                      </div>
                    </div>
                    <!-- End Check Box row 2-->

                    <div class="row mt-3">
                      <div class="col-md-6 col-sm-2">
                        <button type="submit" class="btn bg-gradient-success  btn-lg w-80">Search</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6" style='background:#C2E2CE;min-height:50vh;'>
                    ADS SPOT EXAMPLE
                  </div>
              </div>
            </form>
           </div>
         </div>
       </div>
     </div>
     <div class="row mt-4" style='display:none;'>
       <div class="col-md-12 mb-lg-0 mb-4">
         <div class="card">
           <div class="card-header">
             <h4 class="title">{{ __('pages.SearchResult')}}</h4>
           </div>
           <div class="card-body p-3">
             @if( !empty($search_result) && is_array($search_result) && count($search_result) )
             <!-- select page show & pagenation -->
             <div class="d-flex justify-content-between align-items-center">
               <div class="form-group d-flex align-items-center">
                 <label class="d-inline me-3">{{ __('pages.views')}}</label>
                 <select class="form-control">
                   <option selected value="5">5</option>
                   <option value="10">10</option>
                   <option value="20">20</option>
                   <option value="50">50</option>
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
               <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                 <div class="d-flex flex-column">
                   <span class="mb-2">User Name: <a href="#" class="text-dark font-weight-bold">useranmesssssss</a></span>
                   <span class="text-dark ">The Title for Course X goes here and in case it has more than first line
                     we need to hide and add a show more </span>
                   <div class="mt-2">
                     <span class="mb-2 text-xs">Date: <span class="text-dark font-weight-bold">11/11/2021</span></span>
                     <span class="mb-2 text-xs">data: <span class="text-dark font-weight-bold">zip 5.15MB</span></span>
                   </div>
                 </div>
               </li>
               <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                 <div class="d-flex flex-column">
                   <span class="mb-2">User Name: <a href="#" class="text-dark font-weight-bold">useranmesssssss</a></span>
                   <span class="text-dark ">The Title for Course X goes here and in case it has more than first line
                     we need to hide and add a show more </span>
                   <div class="mt-2">
                     <span class="mb-2 text-xs">Date: <span class="text-dark font-weight-bold">11/11/2021</span></span>
                     <span class="mb-2 text-xs">data: <span class="text-dark font-weight-bold">zip 5.15MB</span></span>
                   </div>
                 </div>
               </li>
             </ul>
             <!-- select page show & pagenation -->
             <div class="d-flex justify-content-between align-items-center">
               <div class="form-group d-flex align-items-center">
                 <label class="d-inline me-3">Views</label>
                 <select class="form-control">
                   <option selected value="5">5</option>
                   <option value="10">10</option>
                   <option value="20">20</option>
                   <option value="50">50</option>
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
                   <span class="mb-2">User Name: <a href="#" class="text-dark font-weight-bold">useranmesssssss</a></span>
                   <span class="text-dark ">The Title for Course X goes here and in case it has more than first line
                     we need to hide and add a show more </span>
                   <div class="mt-2">
                     <span class="mb-2 text-xs">Date: <span class="text-dark font-weight-bold">11/11/2021</span></span>
                     <span class="mb-2 text-xs">data: <span class="text-dark font-weight-bold">zip 5.15MB</span></span>
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
                   <option selected value="5">5</option>
                   <option value="10">10</option>
                   <option value="20">20</option>
                   <option value="50">50</option>
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
         </div>
       </div>

     </div>
   </div>
 </main>