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
                            <option value=''>{{ __('pages.seltraining')}}</option>
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
                              <option value=''>{{ __('pages.selfaculty')}}</option>
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
                            <option value=''>{{ __('pages.selspecia')}}</option>
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
                            <option value=''>{{ __('pages.sellevel')}}</option>
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
                            <option value=''>{{ __('pages.selcourse')}}</option>
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
                          <label class="sm-hide">{{ translate('Search')}}</label>
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
                                  value="1"
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
                                  value="2"
                                  id="exercises"
                                  name="cate_exercise"
                                  checked=""/>
                              <label class="custom-control-label" for="exercises">Exercises</label>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-2 ">
                          <div class="form-check">
                              <input class="form-check-input  crstype" 
                                  type="checkbox" 
                                  value="3" id="exams" 
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
                                  value="1"
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
                                  value="2"
                                  name="filetype_images"
                                  id="imgs"
                                  checked=""/>
                              <label class="custom-control-label" for="imgs">Images/Videos</label>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-2 ">
                          <div class="form-check">
                              <input class="form-check-input mattype" 
                                 type="checkbox" 
                                  value="3" 
                                  id="archives" 
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
   </div>
 </main>