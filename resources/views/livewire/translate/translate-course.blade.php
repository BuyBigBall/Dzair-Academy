<main class="body-content">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" integrity="sha512-l7qZAq1JcXdHei6h2z8h8sMe3NbMrmowhOl+QkP3UhifPpCW2MC4M0i26Y8wYpbz1xD9t61MLT9L1N773dzlOA==" crossorigin="anonymous" />
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body pt-3">
                <form wire:submit.prevent="search" action="#" method="POST" role="form text-left">
                    @csrf
                    <!-- <div class="row">
                        <div class="col-md-12 col-sm-6"> -->
                            
                            <!-- Search Box row -->
                            <div class="row"> 
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                <label class="sm-hide">{{ translate('Traning')}}</label>
                                <select class="form-control"   wire:model="training" name='training'>
                                    <option value=''>{{ translate('Select Traaining')}}</option>
                                    @foreach($training_options as $val)
                                    <option value="{{ $val['id'] }}">{{ lang_item( $val ) }}</option>
                                    @endforeach
                                </select>
                                </div>

                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                                <div class="form-group">
                                <label class="sm-hide">{{ translate('Faculty')}}</label>
                                <select class="form-control"  wire:model="faculty" name='faculty'>
                                    <option value=''>{{ translate('Select Faculty')}}</option>
                                    @foreach($faculty_options as $val)
                                    <option value="{{ $val['id'] }}">{{ lang_item( $val ) }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                                <div class="form-group">
                                <label class="sm-hide">{{ translate('Specialization')}}</label>
                                <select class="form-control" wire:model="specialization" name='specialization'>
                                    <option value=''>{{ translate('Select Specialization')}}</option>
                                    @foreach($specialization_options as $val)
                                    <option value="{{ $val['id'] }}">{{ lang_item( $val ) }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                                <div class="form-group">
                                <label class="sm-hide">{{ translate('Level')}}</label>
                                <select class="form-control" wire:model="level" name='level'>
                                    <option value=''>{{ translate('Select Level')}}</option>
                                    @foreach($level_options as $val)
                                    <option value="{{ $val}}">{{ $val }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                <label class="sm-hide">{{ translate('Module')}}</label>
                                <select class="form-control" wire:model="module" name='module'>
                                    <option value=''>{{ translate('Select Module')}}</option>
                                    @foreach($module_options as $val)
                                    <option value="{{ $val['id'] }}">{{ lang_item( $val )   }}</option>
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
                                <div class="col-md-4 col-sm-6 d-flex justify-content-end align-items-end">
                                    <button type="submit" class="btn bg-gradient-success  btn-lg w-80">Search</button>
                                </div>
                            </div>
                            <!-- End TextBox Box row -->
                        <!-- </div>
                        
                    </div> -->
                    </form>
                        
                    <hr class="my-2" />
                    <div class="table-responsive row">

                        <!-- #################################### -->
                        <div class="w-100 px-0 text-right d-flex justify-content-center align-items-start" >
                            <table class="align-items-center mb-0 w-100" 
                                id='all-words-table' style="display:table;min-height:42vh;">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ translate('ID')}}
                                        </th>
                                        <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-2">
                                            english
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            français
                                        </th>
                                        <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-2">
                                            عربي
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            style="width:80px;"
                                            >{{ translate('Action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pagination as $row)
                                    <tr>
                                        <td class="text-center">
                                            <div> <p class="text-xs font-weight-bold mb-0"> {{$row->idx}}</p></div>
                                        </td>
                                        <td class="text-left" style='width:25%'>
                                            <div class='cell'>
                                                <p class="text-xs font-weight-bold mb-0">{{!empty($row->en) ? $row->en : $row->strkey}}</p>
                                            </div>
                                        </td>
                                        <td class="text-center" style='width:25%'>
                                            <div class='cell'>
                                                <p class="text-xs font-weight-bold mb-0">
                                                {{$row->fr}}</p></div>
                                        </td>
                                        <td class="text-right" style='width:25%'>
                                            <div class='cell'>
                                                <p class="text-xs font-weight-bold mb-0">
                                            {{$row->ar}}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="text-center text-xs ">
                                            <a  href='#'
                                                class="mx-1 ms-2" data-bs-toggle="tooltip"
                                                data-bs-original-title="translate this course"
                                                data-id='{{$row->idx}}'
                                                wire:click.prevent="$emit('ShowMaterialModal', '{{$row->idx}}')"
                                                >
                                                <i class="fa fa-edit text-secondary"></i>
                                            </a>
                                            @if(Auth::user()->role=='admin')
                                            <a href="#" class="mx-1 me-2" data-bs-toggle="tooltip"
                                                data-bs-original-title="delete this words"
                                                data-id='{{$row->strkey}}'
                                                onclick="ConfirmFunction('{{ translate('Are you sure to delete this translate?')}}', deleteTranslateCourse, '{{$row->idx}}')"
                                                >
                                                <i class="fa fa-trash text-secondary"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr><td colspan='20'>&nbsp;</td></tr>
                                </tbody>
                            </table>    
                           
                        </div>
                        <!-- #################################### -->
                    </div>
                    <hr class="my-2" />
                    <div class="d-flex justify-content-between align-items-center">
                        @include('livewire.pagination')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Translate Material Modal -->
@livewire('modal.translatematerial-modal')
<script>
    function deleteTranslateCourse(del_id)
    {
        window.livewire.emit('deleteTranslateCourse', del_id);
    }
    @if($edit_id)
    $(document).ready(function () {
            window.livewire.emit('ShowMaterialModal', '{{$edit_id}}');
        });
    @endif
</script>
</main>
