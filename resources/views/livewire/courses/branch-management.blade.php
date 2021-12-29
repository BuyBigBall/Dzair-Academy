<main>
<div class="container-fluid py-4 body-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">
                            {{ $list_title }} @if(!empty( $list_of)) of @endif <strong>{{$list_of}}</strong>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <!-- Search Box row -->
                    <div class="row p-3"> 
                      <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                          <label class="sm-hide">{{ translate('Traning')}}</label>
                          <select class="form-control"   wire:model="training" name='training'>
                            <option value=''>{{ translate('Select Training')}}</option>
                              @foreach($training_options as $val)
                              <option value="{{ $val['id'] }}">{{ $val[lang()] }}</option>
                              @endforeach
                            </select>

                          </select>
                        </div>

                      </div>
                      <div class="col-md-2 col-sm-6">
                        <div class="form-group">
                          <label class="sm-hide">{{ translate('Faculty')}}</label>
                          <select class="form-control"  wire:model="faculty" name='faculty'>
                                <option value=''>{{ translate('Select Faculty')}}</option>
                              @foreach($faculty_options as $val)
                              <option value="{{ $val['id'] }}">{{ $val[lang()] }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-6">
                        <div class="form-group">
                          <label class="sm-hide">{{ translate('Specialization')}}</label>
                          <select class="form-control" wire:model="specialization" name='specialization'>
                                <option value=''>{{ translate('Select specialization')}}</option>
                              @foreach($specialization_options as $val)
                              <option value="{{ $val['id'] }}">{{ $val[lang()] }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                          <label class="sm-hide">{{ translate('Module')}}</label>
                          <select class="form-control" wire:model="module" name='module'>
                                <option value=''>{{ translate('Select Module')}}</option>
                              @foreach($course_options as $val)
                              <option value="{{ $val['id'] }}">{{ $val[lang()]  }}</option>
                              @endforeach
                          </select>                        
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-6 d-flex align-items-end justify-content-center">
                        <div class="form-group">
                            @if($path_level>=3)
                            <a href="{{ route('course-material') }}" 
                                class="btn bg-gradient-primary btn-sm mb-0" 
                                wire:click.prevent="$emit('ShowBranchModal', '{{$path_level}}', '{{$training}}', '{{$faculty}}', '{{$specialization}}', '{{$module}}', 0)"
                                type="button">&nbsp; {{ $path_level==1 ? translate('New Training') : ( $path_level==2 ? translate('New Faculty') : ( $path_level==3 ? translate('New Specialization') : ( $path_level==4 ? translate('New Module') : translate('New Course') ) ) ) }}</a>
                            @endif
                        </div>
                      </div>
                    </div>
                    <!-- End Search Box row -->
                    <!-- <div class="row p-1 ps-3"> <h5><p>{{ $list_title }} @if(!empty( $list_of)) of @endif <strong>{{$list_of}}</strong></p></h5></div> -->
                    <input type='hidden' id='path_level' name='path_level' value='' wire:model="path_level" />
                    <div class="table-responsive p-0" style='min-height:60vh'>
                        <table class="align-items-center mb-0" id='course-items-table' width="99%">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                        {{translate('ID')}}
                                    </th>
                                    @if( !empty($list_items[0]['symbol']))
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                      {{translate('Symbol')}}
                                    </th>
                                    @endif
                                    @if( !empty($list_items[0]['level']))
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                      {{translate('Level')}}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                      {{translate('Title')}}
                                    </th>
                                    @endif
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                      {{translate('English')}}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      {{translate('Franch')}}
                                    </th>
                                    <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      {{translate('Arabic')}}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="min-width:80px;"
                                        colspan=2>
                                        {{ translate('Action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list_items as $row)
                                <tr>
                                    <td class="text-center p-2">
                                        <p class="text-xs font-weight-bold mb-0">{{$row['id']}}</p>
                                    </td>
                                    @if(!empty($row['symbol']))
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$row['symbol']}}</p>
                                    </td>
                                    @endif
                                    @if(!empty($row['level']))
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$row['level']}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$row['strkey']}}</p>
                                    </td>
                                    @endif
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$row['en']}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$row['fr']}}</p>
                                    </td>
                                    <td class="text-right">
                                        <p class="text-xs font-weight-bold mb-0">{{$row['ar']}}</p>
                                    </td>
                                    <td class="text-center">
                                      @if( !!empty($row['level']))
                                        @if($user_role=='admin' || $user_role=='staff')
                                        <a href="#" class="mx-1" data-bs-toggle="tooltip"
                                            wire:click.prevent="$emit('ShowBranchModal', '{{$path_level}}', '{{$training}}', '{{$faculty}}', '{{$specialization}}', '{{$module}}', '{{$row['id']}}')"
                                            data-bs-original-title="{{ $const_path_name }}">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </a>
                                        @endif

                                        @if( $user_role=='admin' || $path_level>=3)
                                        <span onclick="ConfirmFunction('{{translate('Are you sure to delete?')}}', deleteCourse, '{{$row['id']}}')"
                                            data-bs-toggle="tooltip" data-bs-original-title="{{ translate('delete') }}"
                                            title="{{ translate('delete') }}"
                                          >
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                        @endif
                                      @else
                                        <a href="#" class="mx-1" 
                                          onclick="ConfirmFunction('{{translate('Are you sure to edit this course?')}}', editCourse, '{{$row['id']}}')"
                                            data-bs-toggle="tooltip"
                                            title="{{translate('edit this course')}}"
                                            data-bs-original-title="{{translate('edit this course')}}">
                                            <i class="fa fa-edit text-secondary"></i>
                                        </a>
                                      @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</main>

<script>
    function editCourse(edit_id)
    {
        window.location.href = "{{route('translate-course')}}" + "?id=" + edit_id;
    }

    function deleteCourse(del_id)
    {
        window.livewire.emit('deleteCourse', del_id);
    }
</script>

@livewire('modal.branch-modal')
