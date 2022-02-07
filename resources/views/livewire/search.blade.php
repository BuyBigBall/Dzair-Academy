 <main class="body-content" style="margin-top:{{ empty(Auth::id()) ? '6rem !important;' : '' }}"  >
   <div class="{{ !empty(Auth::user()) ? 'container-fluid' : 'container' }} py-4">
     <div class="row">
       <div class="col-md-12">
         <div class="card">
           <div class="card-header">
             <div class="row">
               <div class="col-md-4 col-sm-6">
                 @if(!empty($collection_id))
                 <h4 class="title">{{ translate('Find My Course File')}}</h4>
                  <h6 class="title text-secondary">{{ translate('for add the course file to the collection.')}}</h6>
                 @else
                 <h4 class="title">{{ translate('Find A Course')}}</h4>
                 @endif
               </div>
               <div class="col-md-8 col-sm-6 p-1 d-none d-md-block" style='min-height:60px;'>
                {!! topAdvertise() !!}
                </div>
             </div>
           </div>
           <style>
             .click-here
             {
               color:#000099;
             }
           </style>
           <div class="card-body p-3">
             <div class="row">
              <div class="col-md-9 col-sm-12 p-3">
                {{ translate('
               didn’t
                find your modules specialization, please
                help us by providing more information
                about them so other members can submit
                files,') }} <a href="#" wire:click.prevent="$emit('SelectWayModal', 0)" class="click-here" >{{ translate( 'click here') }} </a> {{ translate(' to add them') }}
                </div>
              </div>
             <form action="{{ (!empty($collection_id)) ? route('search-result', 'collection_id='.$collection_id) : route('search-result') }}" method="post">
               @csrf
               <div class="row">
                 <div class="col-md-9 col-sm-12">

                   <!-- Search Box row -->
                   <div class="row">
                     <div class="col-md-3 col-sm-6">
                       <div class="form-group">
                         <label class="sm-hide">{{ __('pages.traning')}}</label>
                         <select class="form-control" wire:model="training" name='training'>
                           <option value=''>{{ __('pages.seltraining')}}</option>
                           @foreach($training_options as $val)
                           <option value="{{ $val['id'] }}">{{ lang_item( $val ) }}</option>
                           @endforeach
                         </select>

                         </select>
                       </div>

                     </div>
                     <div class="col-md-2 col-sm-6">
                       <div class="form-group">
                         <label class="sm-hide">{{ __('pages.Faculty')}}</label>
                         <select class="form-control" wire:model="faculty" name='faculty'>
                           <option value=''>{{ __('pages.selfaculty')}}</option>
                           @foreach($faculty_options as $val)
                           <option value="{{ $val['id'] }}">{{ lang_item( $val ) }}</option>
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
                           <option value="{{ $val['id'] }}">{{ lang_item( $val ) }}</option>
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
                         <label class="sm-hide">{{ translate('Module')}}</label>
                         <select class="form-control" wire:model="module" name='module'>
                           <option value=''>{{ translate('Select Module')}}</option>
                           @foreach($module_options as $val)
                           <option value="{{ $val['id'] }}">{{ lang_item( $val )  }}</option>
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
                         <input class="form-control" wire:model="word" name='word' Placeholder="{{ __('pages.SearchPlaceholder')}}" />
                       </div>
                     </div>
                   </div>
                   <!-- End TextBox Box row -->

                   <!-- Check Box row -->
                   <div class="d-flex flex-column mb-2">
                     <label>Categories</label>
                     <div class="row row-cols-2 row-cols-sm-4">
                       <div class="col">
                         <div class="form-check">
                           <input class="form-check-input crstype all" type="checkbox" value="" id="course_all" checked="" />
                           <label class="custom-control-label" for="course_all">all categories</label>
                         </div>
                       </div>
                       <div class="col">
                         <div class="form-check">
                           <input class="form-check-input crstype" type="checkbox" value="1" id="courses" name="cate_course" checked="" />
                           <label class="custom-control-label" for="courses">courses</label>
                         </div>
                       </div>
                       <div class="col">
                         <div class="form-check">
                           <input class="form-check-input  crstype" type="checkbox" value="2" id="exercises" name="cate_exercise" checked="" />
                           <label class="custom-control-label" for="exercises">Exercises</label>
                         </div>
                       </div>
                       <div class="col">
                         <div class="form-check">
                           <input class="form-check-input  crstype" type="checkbox" value="3" id="exams" name="cate_exam" checked="" />
                           <label class="custom-control-label" for="exams">Exams</label>
                         </div>
                       </div>
                     </div>
                   </div>
                   <!-- End Check Box row -->

                   <!-- Check Box row 2-->
                   <div class="d-flex flex-column mb-2">
                     <label>Types</label>
                     <div class="row row-cols-2 row-cols-sm-4">
                       <div class="col">
                         <div class="form-check">
                           <input class="form-check-input mattype all" type="checkbox" value="" id="material_all" checked="" />
                           <label class="custom-control-label" for="material_all">all file types</label>
                         </div>
                       </div>
                       <div class="col">
                         <div class="form-check">
                           <input class="form-check-input mattype " type="checkbox" value="1" name="filetype_docs" id="docs" checked="" />
                           <label class="custom-control-label" for="docs">Documents</label>
                         </div>
                       </div>
                       <div class="col">
                         <div class="form-check">
                           <input class="form-check-input mattype " type="checkbox" value="2" name="filetype_images" id="imgs" checked="" />
                           <label class="custom-control-label" for="imgs">Images/Videos</label>
                         </div>
                       </div>
                       <div class="col">
                         <div class="form-check">
                           <input class="form-check-input mattype" type="checkbox" value="3" id="archives" name="filetype_archives" checked="" />
                           <label class="custom-control-label" for="archives">Archives</label>
                         </div>
                       </div>
                     </div>
                   </div>
                   <!-- End Check Box row 2-->

                   <div class="row mt-3">
                     <div class="col-lg-6 col-sm-12 text-right">
                       <button type="submit" class="btn bg-primary">Search</button>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-3 text-center d-flex justify-content-start align-items-start d-none d-lg-block">
                                <div class="w-100" style="min-height:50vh;overflow-x:hidden;">
                                    {!! rightAdvertise() !!}
                                </div>
                            </div>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </main>

 @livewire('modal.select-way-modal') 
 @livewire('modal.add-specialization-modal') 
 @livewire('modal.add-module-modal')  