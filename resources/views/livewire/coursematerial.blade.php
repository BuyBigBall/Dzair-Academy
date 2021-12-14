<main>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <h4 class="title">Course Upload</h4>
                            </div>
                            <div class="col-md-8 col-sm-6" style='background:#C2E2CE; min-height:60px;'>
                                ADS SPOT EXAMPLE
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <form wire:submit.prevent="savecourse" methos="post">
                            <input type='hidden' wire:model="edit_id" name='edit_id' id='hId' />
                            <div class="row">
                                <div class="col-md-9 col-sm-12">
                                    <!-- Search Box row -->
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <label class="sm-hide">{{ __('pages.traning')}}</label>
                                                <select class="form-control" wire:model="training" name='training'>
                                                    <option>{{ __('pages.seltraining')}}</option>
                                                    @foreach($training_options as $val)
                                                    <option value="{{ $val['id'] }}">{{ $val[lang()] }}</option>
                                                    @endforeach
                                                </select>
                                                @error('training') <span class="error">{{ $message }}</span> @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label class="sm-hide">{{ __('pages.Faculty')}}</label>
                                                <select class="form-control" wire:model="faculty" name='faculty'>
                                                    <option>{{ __('pages.selfaculty')}}</option>
                                                    @foreach($faculty_options as $val)
                                                    <option value="{{ $val['id'] }}">{{ $val[lang()] }}</option>
                                                    @endforeach
                                                </select>
                                                @error('faculty') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label class="sm-hide">{{ __('pages.Specialization')}}</label>
                                                <select class="form-control" wire:model="specialization"
                                                    name='specialization'>
                                                    <option>{{ __('pages.selspecia')}}</option>
                                                    @foreach($specialization_options as $val)
                                                    <option value="{{ $val['id'] }}">{{ $val[lang()] }}</option>
                                                    @endforeach
                                                </select>
                                                @error('specialization') <span class="error">{{ $message }}</span>
                                                @enderror
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
                                                @error('level') <span class="error">{{ $message }}</span> @enderror
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
                                                @error('course') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Search Box row -->

                                    <!-- Check Box row -->
                                    <div class="row col-md-10 col-sm-6  px-3 pb-3">
                                        <div class="col-md-3 col-sm-6 ">
                                            <div class="form-check">
                                                <input class="form-check-input crstype all" type="checkbox" value=""
                                                    id="course_all" checked="" />
                                                <label class="custom-control-label" for="course_all">all
                                                    categories</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-2 ">
                                            <div class="form-check">
                                                <input class="form-check-input crstype" type="checkbox" value=""
                                                    wire:model="cate_course" name="cate_course" id="courses"
                                                    checked="" />
                                                <label class="custom-control-label" for="courses">courses</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-2 ">
                                            <div class="form-check">
                                                <input class="form-check-input  crstype" type="checkbox" value=""
                                                    wire:model="cate_exercise" name="cate_exercise" id="exercises"
                                                    checked="" />
                                                <label class="custom-control-label" for="exercises">Exercises</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-2 ">
                                            <div class="form-check">
                                                <input class="form-check-input  crstype" type="checkbox" value=""
                                                    wire:model="cate_exam" name="cate_exam" id="exams" checked="" />
                                                <label class="custom-control-label" for="exams">Exams</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Check Box row -->

                                    <!-- Title TextBox row -->
                                    <div class="row">
                                        <div class="col-md-9 col-sm-12">
                                            <div class="form-group d-sm-flex align-items-center">
                                                <label
                                                    class="custom-control-label me-3 w-25">{{ __('pages.Title')}}</label>
                                                <input class="form-control" wire:model="title" name='title'
                                                    Placeholder="{{ __('pages.SearchPlaceholder')}}" />

                                            </div>
                                        </div>
                                        <div class="col-md-9 col-sm-12">
                                            <div class="form-group d-sm-flex align-items-center">
                                                @error('title') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Title TextBox row -->


                                    <div class="row mt-3">
                                        <div class="col-md-9 col-sm-12">
                                            <div class="form-group d-sm-flex align-items-center">
                                                <label class="custom-control-label me-3 w-25"
                                                    for="description">Description: </label>
                                                <textarea class="form-control" id="description" wire:model="description"
                                                    name="description" rows="3"></textarea>
                                                @error('description') <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-9 col-sm-12">
                                            <div class="form-group d-sm-flex align-items-center">
                                                <label for="formFile"
                                                    class="custom-control-label me-3 w-25">File:</label>
                                                <input class="form-control" type="file" wire:model="file" name="file"
                                                    id="formFile">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group d-sm-flex align-items-center">
                                                @error('file') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mt-3">
                                        <div class="col-md-9 col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" wire:model="protection"
                                                    name="protection" value="" id="encrption">
                                                <label class="custom-control-label" for="encrption">Password protection
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-9">
                                            <button type="submit"
                                                class="btn bg-primary btn-lg">Upload</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 d-none d-md-block" style='background:#C2E2CE;min-height:50vh;'>
                                    ADS SPOT EXAMPLE
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row mt-4">
            <div class="col-md-12 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="title">Search Result</h4>
                    </div>
                    <div class="card-body p-3">
                    </div>
                </div>
            </div>

        </div> -->
    </div>
</main>
